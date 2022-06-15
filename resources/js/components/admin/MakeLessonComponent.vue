<template>
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
</template>

<script>
export default {
  name: "MakeLessonComponent",
  data(){
    return{
      file: ''
    }
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
      }).catch(response =>{
        console.log(response);
      });
    }
  }
}
</script>

<style scoped>

</style>