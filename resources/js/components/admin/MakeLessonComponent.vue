<template>
    <SideBarComponent></SideBarComponent>
  <div>
      <div>
          <h1>Создание предметов</h1>
      </div>
      <div>
          <form @submit.prevent="send">
              <div class="mb-3">
                  <label for="file" class="form-label">Выберите Excel файл</label>
                  <input type="file" ref="lesson" v-on:change="handleFileUpload" class="form-control" id="file" aria-describedby="inputGroupFileAddon02">
              </div>
              <button class="btn btn-primary" type="submit">Отправить</button>
          </form>
      </div>
      <div class="mt-3">
          <div>
              <h2>Список предметов</h2>
          </div>
          <div>
              <ul class="list-group">
                  <li class="w-50 list-group-item d-flex flex-row align-items-center justify-content-between"
                      v-for="(lesson, id) in lessons" >
                      <p>Код премета: {{ lesson.code }}</p>
                      <p>Название премета {{ lesson.name }}</p>
                  </li>
              </ul>
          </div>
      </div>
  </div>
</template>

<script>
import SideBarComponent from "../layout/SideBarComponent";
export default {
  name: "MakeLessonComponent",
    components: {SideBarComponent},

    data(){
    return{
      file: '',
        lessons: []
    }
  },
    mounted() {
      axios.get('/api/lessons').then(lessons => {
          this.lessons = lessons.data.lessons
          console.log(this.lessons);
      });
    },
    methods:{
    handleFileUpload(){
      this.file = this.$refs.lesson.files[0];
      console.log(this.file);
      //this.$refs.lesson.reset()
      // this.$nextTick(() => {
      //
      //   //this.$refs.file.reset()
      // })
    },
    send(){
      let excel = new FormData();
      excel.append('file',this.file);
      axios.post('/api/excel/lesson',excel,{
        headers: {
          'Content-Type': 'multipart/form-data',
        }
      }).then(response =>{
        console.log(response);
          axios.get('/api/lessons').then(lessons => {
              this.lessons = lessons.data.lessons
              console.log(this.lessons);
          });
      }).catch(response =>{
        console.log(response);
      });
    }
  }
}
</script>

<style scoped>

</style>
