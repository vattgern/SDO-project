<template>
    <section class="w-100">
        <div class="w-100 d-flex flex-row justify-content-between">
            <button type="button" class="btn btn-outline-primary" @click="isOpenForm = true;" >Добавить преподавателя</button>
            <select class="p-2" style="cursor: pointer" id="group" v-on:change="initValue">
                <!-- В value можем запихнуть id из БД группы и так будет легко сортировать -->
                <option value="all" selected>Предмет</option>
                <option value="1">ПИРИП</option>
                <option value="2">ТРПО</option>
                <option value="3">ИРПО</option>
                <option value="4">ПП</option>
            </select>
        </div>
        <!--    Список преподавателей    -->
        <div class="w-100 container mt-4">
            <ul class="list-group">
              <li class="list-group-item d-flex flex-row align-items-center justify-content-between"
                  v-for="(teacher, id) in teachers" >
                <div>
                  <h5>{{ teacher.middle_name }} {{ teacher.name }} {{ teacher.last_name }}</h5>
                </div>
                <div>
                  <p>Почта: {{ teacher.email }}</p>
                  <p>Телефон: {{ teacher.phone }}</p>
                </div>
                <div class="d-flex flex-column gap-4">
                  <button type="button" class="btn btn-secondary">Изменить пароль</button>
                  <button type="button" class="btn btn-warning">Редактировать</button>
                  <button type="button" class="btn btn-danger">Удалить</button>
                </div>
              </li>
            </ul>
        </div>
        <!--    Модальное окно    -->
        <Transition name="addStudent">
            <div class="container position-absolute" v-show="isOpenForm" style="top: 30%; left: 0; right: 0; bottom: 0;">
                <div class="modal-dialog" role="document">
                    <form class="modal-content" @submit.prevent="send">
                        <div class="modal-header">
                            <h5 class="modal-title">Добавить преподавателя</h5>
                            <button type="reset" class="close" @click="isOpenForm = false">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Upload</span>
                                </div>
                                <div class="custom-file d-flex align-items-center">
                                    <input ref="file" v-on:change="handleFileUpload" type="file" class="custom-file-input m-1"
                                           aria-describedby="inputGroupFileAddon01" >
                                    <label class="custom-file-label h-100 d-flex align-items-center justify-content-center p-lg-1" >Choose file</label>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="reset" class="btn btn-secondary" @click="isOpenForm = false">Закрыть</button>
                            <button type="submit" class="btn btn-primary">Отправить</button>
                        </div>
                    </form>
                </div>
            </div>
        </Transition>
    </section>
</template>

<script>
export default {
    name: "TeacherComponent",
    data(){
        return {
          isOpenForm: false,
          selectGroup: 'all',
          file: '',
          teachers: []
        }
    },
    methods:{
      handleFileUpload(){
        this.file = this.$refs.file.files[0];
        this.$refs.file.reset();
      },
      send(){
        console.log(this);
        let formdata = new FormData();
        formdata.append('file',this.file);
        axios.post('http://127.0.0.1:8000/api/excel/teachers',formdata,{
          headers: {
            'Content-Type': 'multipart/form-data'
          }
        }).then(response =>{
          console.log('Ура');
          console.log(response);
        }).catch(response =>{
          console.log(response);
        })
      },
        initValue(){
            this.selectGroup = document.getElementById("group").value;
            this.filterGroup();
        },
        filterGroup(){
            let listGroups = document.querySelectorAll(".list-group-item");
            listGroups.forEach((list)=>{
                if(this.selectGroup === 'all') {
                    list.classList.remove('d-none')
                } else if(list.value !== this.selectGroup){
                    list.classList.add('d-none')
                } else {
                    list.classList.remove('d-none')
                }
            });
        }
    },
  mounted() {
      axios.get('/api/teachers/0').then(teachers => {
        if(teachers.data.length > 0){
          this.teachers = teachers.data;
          console.log(this.teachers);
        }
      });
  }
}
</script>

<style scoped>
.addStudent-enter-active {
    animation: bounce-in .5s;
}
.addStudent-leave-active {
    animation: bounce-in .5s reverse;
}
@keyframes bounce-in {
    0% {
        transform: scale(0);
    }
    50% {
        transform: scale(1.25);
    }
    100% {
        transform: scale(1);
    }
}
</style>
