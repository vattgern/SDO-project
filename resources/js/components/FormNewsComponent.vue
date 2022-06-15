<template>
  <div class="container">
    <form method="post" id="form" @submit.prevent="getData">
      <input type="hidden" id="token" name="_token" :value="csrf">
      <div class="form-group">
        <label for="title">Название новости</label>
        <input type="text" name="title" class="form-control" id="title" v-model="form.title">
      </div>
      <div class="form-group mt-2 mb-2">
        <label for="body">Содержимое поста</label>
        <textarea name="body" id="body" class="form-control" cols="30" rows="10" v-model="form.body"></textarea>
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-outline-primary">Добавить пост</button>
      </div>
    </form>
  </div>
</template>

<script>
export default {
  name: "FormNewsComponent",
  data(){
    return{
      form: {
        title: '',
        body: '',
        csrf: document.head.querySelector('meta[name="csrf-token"]').content,
      }
    }
  },
  methods:{
    getData(){
      axios.post('',this.form)
        .then(response => {console.log(response)});
    }
  }
}
</script>

<style scoped>

</style>