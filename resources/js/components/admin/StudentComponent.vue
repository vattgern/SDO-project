<template>
    <SideBarComponent></SideBarComponent>
    <section id="students" class="w-100" style="height: 100vh; overflow-y: scroll;">
        <div class="w-100 d-flex flex-row justify-content-between">
            <button type="button" class="btn btn-outline-primary" @click="isOpenForm = true;" >Добавить студента</button>
            <select class="p-2" style="cursor: pointer" id="group" >
<!--              v-on:change="initValue"-->
                <!-- В value можем запихнуть id из БД группы и так будет легко сортировать -->
                <option value="all" selected>Группа</option>
                <option value="1">РП-32</option>
                <option value="2">ПБ-32</option>
                <option value="3">РП-31</option>
                <option value="4">ПБ-31</option>
            </select>
        </div>
        <!--    Список студентов    -->
        <div class="w-100 container mt-4">
          <ul class="list-group">
<!--            <li class="list-group-item d-flex flex-row align-items-center justify-content-between">-->
<!--              <div>-->
<!--                <h5>Лиджиев Александр Олегович</h5>-->
<!--                <p>Группа: РП-32</p>-->
<!--                <p>Номер зачетной книжки: 0000</p>-->
<!--              </div>-->
<!--              <div>-->
<!--                <p>Почта: address</p>-->
<!--                <p>Телефон: 89886858415</p>-->
<!--              </div>-->
<!--              <div class="d-flex flex-column gap-4">-->
<!--                <button type="button" class="btn btn-secondary">Изменить пароль</button>-->
<!--                <button type="button" class="btn btn-warning">Редактировать</button>-->
<!--                <button type="button" class="btn btn-danger">Удалить</button>-->
<!--              </div>-->
<!--            </li>-->
            <li class="list-group-item d-flex flex-row align-items-center justify-content-between"
                v-for="(student, id) in students" >
              <div>
                <h5>{{ student.middle_name }} {{ student.name }} {{ student.last_name }}</h5>
                <p>Группа: {{ student.group.name }}</p>
                <p>Номер зачетной книжки: {{ student.student_cart }}</p>
              </div>
              <div>
                <p>Почта: {{ student.email }}</p>
                <p>Телефон: {{ student.phone }}</p>
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
                    <form class="modal-content" @submit.prevent="sendStudents">
                        <div class="modal-header">
                            <h5 class="modal-title">Добавить студента</h5>
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
import SideBarComponent from "../layout/SideBarComponent";
export default {
    name: "StudentComponent",
    components: {SideBarComponent},

    data(){
        return {
            isOpenForm: false,
            selectGroup: 'all',
            file: '',
            students: []
        }
    },
    methods:{
        handleFileUpload(){
          this.file = this.$refs.file.files[0];
          //this.$refs.file.reset();
        },
        sendStudents(){
          console.log(this);
          let formdata = new FormData();
          formdata.append('file',this.file);
          axios.post('http://127.0.0.1:8000/api/excel/students',formdata,{
            headers: {
              'Content-Type': 'multipart/form-data'
            }
          }).then(response =>{
            console.log('Ура');
            console.log(response);
              axios.get('/api/students/{offset}').then(students => {

                  this.students = students.data;
                  console.log(this.students);
              });

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
      axios.get('/api/students/{offset}').then(students => {

        this.students = students.data;
        console.log(this.students);
      });
    }
}
</script>

<style scoped>
#students::-webkit-scrollbar{
    background: transparent;
}
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
