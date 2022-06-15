<template>
  <section class="h-100 d-flex justify-content-center align-items-center">
    <form @submit.prevent="send" >
      <div>
        <h1>Авторизуйтесь</h1>
      </div>
      <div class="mb-3">
        <label for="login" class="form-label">Введите логин</label>
        <input type="text" v-model="login" class="form-control" id="login" placeholder="login">
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Введите пароль</label>
        <input type="password" v-model="password" class="form-control" id="password" placeholder="*********">
      </div>
      <button type="submit" class="w-100 btn btn-outline-primary">Войти</button>
    </form>
  </section>
</template>

<script>
import MainComponent from "./layout/MainComponent";
export default {
  name: "LoginComponent",
  data(){
    return {
      login: '',
      password: '',
    }
  },
  methods:{
    send(){
      // console.log(this);
      axios.get('/sanctum/csrf-cookie').then(response => {

        console.log(response);

        axios.post('http://127.0.0.1:8000/api/login',{

          'login': this.login,
          'password': this.password

        }).then(response => {

          console.log('авторизован');
          console.log(response);

          window.localStorage.setItem('token',response.data.token);
          window.localStorage.setItem('role',response.data.role);
          window.sessionStorage.setItem('role',response.data.role);

          let role = window.localStorage.getItem('role');
          if( role === 'student'){
            this.$router.push({name: 'student'});
          } else if(role === 'parent'){
            this.$router.push({ name: 'parent' });
          } else if(role === 'teacher'){
            this.$router.push({ name: 'teacher' });
          }

        }).catch(response =>{

          console.log('Чтото нето');
          //console.log(response);

        });
      });
    }
  }
}
</script>

<style scoped>

</style>