<template>
  <header v-if="show" class="header" id="header">
    <div class="header__toggle">
      <i class='bx bx-menu' id="header-toggle"></i>
    </div>

    <div class="d-flex justify-content-center align-items-center">
      <p style="margin-top: 15px;">
        {{ user.key }} {{ user.name }}
      </p>
    </div>
  </header>
  <div v-if="show" class="l-navbar" id="nav-bar">
    <nav class="nav">
      <div>
        <router-link v-if="role==='student'" class="nav__logo" :to="{name: 'student'}">
          <i class='bx bxl-vuejs'></i>
          <span class="nav__logo-name">АКВТ</span>
        </router-link>
        <router-link v-if="role==='parent'" class="nav__logo" :to="{name: 'parent'}">
          <i class='bx bxl-vuejs'></i>
          <span class="nav__logo-name">АКВТ</span>
        </router-link>
        <router-link v-if="role==='admin'" class="nav__logo" :to="{name: 'admin'}">
          <i class='bx bxl-vuejs'></i>
          <span class="nav__logo-name">АКВТ</span>
        </router-link>
        <div class="nav__list">
          <router-link v-if="role==='student'" class="nav__link active" id="news" :to="{name: 'student'}">
            <i class='bx bx-news'></i>
            <span class="nav__name">Главная</span>
          </router-link>
          <router-link v-if="role==='parent'" class="nav__link active" id="news-parent" :to="{name: 'parent'}">
            <i class='bx bx-news'></i>
            <span class="nav__name">Главная</span>
          </router-link>
          <router-link v-if="role==='teacher'" class="nav__link active" id="news-teacher" :to="{name: 'teacher'}">
            <i class='bx bx-news'></i>
            <span class="nav__name">Главная</span>
          </router-link>
          <router-link v-if="role==='parent' || role === 'student'" class="nav__link " id="attestation" :to="{name: 'attestation'}">
            <i class='bx bx-book-content'></i>
            <span class="nav__name">Аттестация</span>
          </router-link>
          <router-link v-if="role==='parent' || role === 'student'" class="nav__link" id="schedule" :to="{name: 'schedule'}">
            <i class='bx bxs-calendar'></i>
            <span class="nav__name">Расписание</span>
          </router-link>
          <router-link v-if="role==='parent' || role === 'student'" class="nav__link " id="debt" :to="{name: 'debt'}">
            <i class='bx bx-bookmark nav__icon' ></i>
            <span class="nav__name">Задолжности</span>
          </router-link>
<!--          <router-link class="nav__link " id="chat" :to="{name: 'chat'}">-->
<!--            <i class='bx bx-message-square-dots'></i>-->
<!--            <span class="nav__name">Месенджер</span>-->
<!--          </router-link>-->
          <router-link v-if=" role==='admin' " class="nav__link " id="makeAdmin" :to="{name: 'adminMake'}">
            <i class='bx bx-user nav__icon'></i>
            <span class="nav__name">Создать по одному</span>
          </router-link>
          <router-link v-if=" role==='admin' " class="nav__link " id="makeGroup" :to="{name: 'admin.make.group'}">
            <i class='bx bxs-group'></i>
            <span class="nav__name">Создать группы</span>
          </router-link>
          <router-link v-if=" role==='admin' " class="nav__link " id="makeTimetable" :to="{name: 'admin.make.timetable'}">
            <i class='bx bx-table' ></i>
            <span class="nav__name">Создать расписание</span>
          </router-link>
          <router-link v-if=" role==='admin' " class="nav__link " id="makeLesson" :to="{name: 'admin.make.lesson'}">
            <i class='bx bx-book-alt'></i>
            <span class="nav__name">Создать предмет</span>
          </router-link>
          <div class="nav__link" v-if="role === 'admin'">
            <button id="btn-drop" type="button" class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
              <i class='bx bx-group' style="margin-right: 30px;"></i>
              <span class="nav__name">Пользователи</span>
            </button>
            <ul class="dropdown-menu" id="dropdown-list">
              <li>
                <router-link class="nav__link " id="makeManyStudent" :to="{name: 'all-students'}">
                  <i class='bx bx-group'></i>
                  <span class="nav__name">Cтуденты</span>
                </router-link>
              </li>
              <li>
                <router-link class="nav__link " id="makeManyParents" :to="{name: 'all-parents'}">
                  <i class='bx bx-group'></i>
                  <span class="nav__name">Родители</span>
                </router-link>
              </li>
              <li>
                <router-link class="nav__link " id="makeManyTeachers" :to="{name: 'all-teachers'}">
                  <i class='bx bx-group'></i>
                  <span class="nav__name">Преподаватели</span>
                </router-link>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <a href="#" @click.prevent="logout" class="nav__link">
        <i class='bx bx-log-out nav__icon' ></i>
        <span class="nav__name">Выйти</span>
      </a>
    </nav>
  </div>
</template>

<script>
import api from "../../api";
export default {
  name: "SideBarComponent",
  data(){
    return{
      role: window.localStorage.getItem('role'),
      user: {
        name: '',
        key: ''
      },
        show: false
    }
  },
  methods: {
    logout(){
      api.post('http://127.0.0.1:8000/api/logout').then(response=>{
        localStorage.clear();
        sessionStorage.clear();
        this.$router.push({name: 'login'});
      });
    },
      forceRender(){
        this.show = false;
        this.$nextTick(() => {
            this.show = false;
        });
      }
  },
  mounted() {
    if(localStorage.getItem('token')){
      axios.get('/api/me').then(response => {
        console.log(response);
        this.user.key = response.data.key;
        this.user.name = response.data.middle_name + ' ' + response.data.name + ' '+ response.data.last_name;
      })
        this.show = true;
      console.log(this.show);
    }
  }
}
</script>

<style scoped>
#dropdown-list{
  background-color: #4723D9;
}
#btn-drop{
  background: transparent;
  color: white;
  outline:none;
  border:none;
}
</style>
