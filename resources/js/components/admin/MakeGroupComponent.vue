<template>
    <SideBarComponent></SideBarComponent>
    <div>
        <div class="w-100 d-flex flex-row justify-content-between">
            <h1>Создание группы</h1>
            <div>
                <select v-model="form" class="form-select" aria-label="Default select example">
                    <option value="one" >Один</option>
                    <option value="many" selected>Много</option>
                </select>
            </div>
        </div>
        <div v-show="form === 'one'">
            <form @submit.prevent="sendOne">
                <div class="mb-3">
                    <label for="name" class="form-label">Введите название группы</label>
                    <input type="text" v-model="formOne.name" class="form-control" id="name" placeholder="АА-00">
                </div>
                <div class="mb-3">
                    <label for="code" class="form-label">Введите код группы</label>
                    <input type="text" v-model="formOne.code" class="form-control" id="code" placeholder="">
                </div>
                <button class="btn btn-primary" type="submit">Создать</button>
            </form>
        </div>
        <div v-show="form === 'many'">
            <form @submit.prevent="sendMany">
                <div class="mb-3">
                    <label for="code" class="form-label">Выберите Excel файл</label>
                    <input type="file" ref="group" v-on:change="handleFileUpload" class="form-control" id="file" aria-describedby="inputGroupFileAddon02">
                </div>
                <button class="btn btn-primary" type="submit">Создать</button>
            </form>
        </div>
    </div>
</template>

<script>
import SideBarComponent from "../layout/SideBarComponent";
export default {
  name: "MakeGroupComponent",
    components: {SideBarComponent},

    data(){
    return{
      form: 'many',
      formOne: {
        name: '',
        code: ''
      },
      file: ''
    }
  },
  methods:{
    handleFileUpload(){
      this.file = this.$refs.group.files[0];
      console.log(this.file);
      //this.$refs.group.reset()
      // this.$nextTick(() => {
      //
      //   //this.$refs.file.reset()
      // })
    },
    sendOne(){
      axios.post('http://127.0.0.1:8000/api/new/group',{
        name: this.formOne.name,
        code: this.formOne.code
      }).then(response => {
        console.log(response);
        this.formOne.name = ''
        this.formOne.code = ''
      }).catch(response =>{
        console.log(response);
      });
    },
    sendMany(){
      let excel = new FormData();
      excel.append('file',this.file);
      axios.post('http://127.0.0.1:8000/api/excel/groups',excel,{
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
