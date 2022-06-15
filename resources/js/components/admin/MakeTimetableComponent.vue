<template>
  <div>
    <h1>Создание расписания</h1>
  </div>
  <div class="alert alert-warning d-flex align-items-center" role="alert">
    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Warning:"><use xlink:href="#exclamation-triangle-fill"/></svg>
    <div>
      Прежде чем регистрировать расписание убедитесь в созданных группах, предметах, учителях, аудиториях.
    </div>
  </div>
  <div>
    <form @submit.prevent="send">
      <div class="mb-3">
        <label for="file" class="form-label">Выберите Excel файл</label>
        <input type="file" ref="timetable" v-on:change="handleFileUpload" class="form-control" id="file" aria-describedby="inputGroupFileAddon02">
      </div>
      <button class="btn btn-primary" type="submit">Создать</button>
    </form>
  </div>
</template>

<script>
export default {
  name: "MakeTimetableComponent",
  data(){
    return{
      file: ''
    }
  },
  methods:{
    handleFileUpload(){
      this.file = this.$refs.timetable.files[0];
      console.log(this.file);
      //this.$refs.group.reset()
      // this.$nextTick(() => {
      //
      //   //this.$refs.file.reset()
      // })
    },
    send(){
      let fd = new FormData();
      fd.append('file',this.file);
      axios.post('/api/excel/timetable',fd,{
        headers: {
          'Content-Type': 'multipart/form-data',
        }
      }).then(res => {
        console.log(res);
      });
    }
  }
}
</script>

<style scoped>

</style>