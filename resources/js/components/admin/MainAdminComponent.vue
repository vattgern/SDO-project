<template>
    <SideBarComponent></SideBarComponent>
<div>
  <div>
    <h1>Добавдение аудиторий</h1>
  </div>
  <div>
    <form @submit.prevent="sendClass">
      <div class="mb-3">
        <label for="class" class="form-label">Номер аудитории</label>
        <input type="text" v-model="numberClass" class="form-control" id="class">
      </div>
      <button type="submit" class="btn btn-primary">Добавить</button>
    </form>
  </div>
</div>
</template>

<script>
import SideBarComponent from "../layout/SideBarComponent";
export default {
      name: "MainAdminComponent",
    components: {SideBarComponent},

    data(){
        return{
          numberClass: ''
        }
        },
    mounted() {

    },
    methods:{
        sendClass(){
          axios.post('/api/new/class',{
            'number': this.numberClass
          }).then(res => {
            this.numberClass = '';
          });
        }
  }
}
</script>

<style scoped>

</style>
