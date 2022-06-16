<template>
    <SideBarComponent></SideBarComponent>
    <div>
        <div class="w-100">
            <h1>Создание пользователя</h1>
        </div>
        <form class="w-100" @submit.prevent="formClick">
            <div class="mb-3">
                <label for="fullName" class="form-label">ФИО</label>
                <input type="text" class="form-control" id="fullName" v-model='fullName'>
                <div id="fullNameHelper" class="form-text">Фамилия Имя Отчество</div>
            </div>
            <div class="mb-3">
                <label for="loginUser" class="form-label">Логин</label>
                <input type="text" class="form-control" id="loginUser" v-model="form.login">
                <div id="loginUserHelper" class="form-text">Придумайте себе ник</div>
            </div>
            <div class="mb-3">
                <label for="phoneUser" class="form-label">Номер</label>
                <input type="tel" class="form-control" id="phoneUser" v-model="form.phone">
                <div id="phoneUserHelper" class="form-text">*-***-***-**-**</div>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Пароль</label>
                <input type="password" class="form-control" id="password" v-model="form.password">
                <div id="passwordHelper" class="form-text">Придумайте пароль</div>
            </div>
            <!--  -------------------------------------------------------------------  -->
            <!--  Основное  -->
            <div class="d-flex flex-row gap-2 mb-3">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="typeUser" id="student" value="student" checked v-model="form.typeUser">
                    <label class="form-check-label" for="student">
                        Студент
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="typeUser" id="teacher" value="teacher" v-model="form.typeUser">
                    <label class="form-check-label" for="teacher">
                        Преподаватель
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="typeUser" id="parent" value="parent" v-model="form.typeUser">
                    <label class="form-check-label" for="parent">
                        Родитель
                    </label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Зарегистрировать</button>
        </form>
        <!--  -------------------------------------------------------------------  -->
        <!--  Для студентов  -->
        <div style="margin-top: 5%;" class="d-flex flex-row gap-2 mb-3" v-if="form.typeUser === 'student'" >
            <div class="">
                <label for="cardStudent" class="form-label">Номер студенческого</label>
                <input type="text" class="form-control" id="cardStudent" v-model="form.studentCard">
                <div id="cardStudentHelper" class="form-text">*-*-*-*</div>
            </div>
            <div class="">
                <label for="groupName" class="form-label">Название группы</label>
                <input type="text" class="form-control" id="groupName" v-model="form.groupStudent">
                <div id="groupNameHelper" class="form-text">АА-00</div>
            </div>
        </div>
        <!--  -------------------------------------------------------------------  -->
        <!--  -------------------------------------------------------------------  -->
        <!--  Для родителей  -->
        <form style="margin-top: 5%;" @submit.prevent="addChild" class="d-flex flex-row gap-2 mb-3" v-if="form.typeUser === 'parent'">
            <div class="w-25">
                <label for="enterStudent" class="form-label">Номер зачетки ребенка</label>
                <input type="text" class="form-control" id="enterStudent" v-model='form.parentChildCard'>
                <button type="submit" class="mt-3 mb-5 btn btn-primary">Добавить</button>
            </div>
            <div id="childs" class="w-75 row m-3">
                <div class="m-1 w-25 d-flex justify-content-center border"
                     style="height: 50px;"
                     v-for="(card,index) in form.parentChild">
                    Номер: {{ card['student_cart'] }}
                    <button @click='deleteChild(index)'>X</button>
                </div>
            </div>
        </form>
        <!--  -------------------------------------------------------------------  -->
        <!--  -------------------------------------------------------------------  -->
        <!--  Для преподавателя  -->
        <form style="margin-top: 5%;" @submit.prevent="addLesson" class="d-flex flex-row gap-2 mb-3" v-if="form.typeUser === 'teacher'">
            <div class="w-50">
                <label for="nameLesson" class="form-label">Название предмета</label>
                <input type="text" class="form-control" id="nameLesson" v-model='form.lessonInput'>
                <button type="submit" class="mt-3 mb-5 btn btn-primary">Добавить</button>
            </div>
            <div id="lessons" class="w-75 row m-3">
                <div class="m-1 w-50 d-flex justify-content-center border"
                     style="height: 50px;"
                     v-for="(lesson,index) in form.lessonArr">
                    Предмет: {{ lesson['name'] }}
                    <button @click='deleteLesson(index)'>X</button>
                </div>
            </div>
        </form>
        <!--  -------------------------------------------------------------------  -->
    </div>
</template>

<script>
import SideBarComponent from "../layout/SideBarComponent";
export default {
  name: "MakeUserComponent",
  data(){
    return {
      fullName: '',
      form: {
        fullName: {
          name: '',
          surname: '',
          lastName: ''
        },
        login: '',
        phone: '',
        password: '',
        typeUser: 'student',
        studentCard: '',
        groupStudent: '',
        parentChildCard: '',
        parentChild: [],
        lessonInput: '',
        lessonArr: [],
      },
      formValidation:{
        fullName: {
          isRight: false,
          messages: {
            wrongPhone: 'Вы неверно введи ФИО',
            success: 'Все верно'
          }
        },
        phone:{
          isRight: false,
          messages:{
            wrongPhone: 'Неправильно набран номер',
            success: 'Все верно'
          }
        },
        isLoginRight: false,
        isPasswordRight: false,
        isCardRight: false,
        isGroupRight:false,
      },
    }
  },
    components: {
      SideBarComponent
    },
  methods:{
    resetForm(){
      this.form.password = '';
      this.form.phone = '';
      this.fullName = '';
      this.form.login = '';
      if(this.form.typeUser === 'student'){
        this.form.studentCard = '';
        this.form.groupStudent = '';
      } else if(this.form.typeUser === 'teacher'){
        this.form.lessonArr = [];
        this.form.lessonInput = '';
      } else if (this.form.typeUser === 'parent'){
        this.form.parentChild = [];
        this.form.parentChildCard = '';
      }
    },

    // -----------------
    // для преподавателей
    addLesson(){
      this.form.lessonArr.push({
        'name': this.form.lessonInput
      });
      console.log(this.form.lessonArr);
      this.form.lessonInput = '';
      this.updateLessons();
    },
    updateLessons(){
      let arr = [];
      for(let i = 0; i < this.form.lessonArr.length;i++){
        if(this.form.lessonArr[i]['name'] !== ''){
          arr.push(this.form.lessonArr[i]);
        }
      }
      this.form.lessonArr = arr;
    },
    deleteLesson(index){
      this.form.lessonArr.splice(index,1);
      console.log(this.form.lessonArr);
      this.updateLessons();
    },
    // -----------------
    // -----------------
    // для родителя
    addChild(){
      this.form.parentChild.push({
        'student_cart': this.form.parentChildCard
      });
      console.log(this.form.parentChild);
      this.form.parentChildCard = '';
      this.updateChild();
    },
    updateChild(){
      let arr = [];
      for(let i = 0; i < this.form.parentChild.length;i++){
        if(this.form.parentChild[i]['student_cart'] !== ''){
          arr.push(this.form.parentChild[i]);
        }
      }
      this.form.parentChild = arr;
    },
    deleteChild(card){
      this.form.parentChild.splice(card,1);
      console.log(this.form.parentChild);
      this.updateChild();
    },
    // -----------------
    // -----------------
    // для студента
    formClick(){
      console.dir(this.form);
      this.phoneMessage();
      this.fullNameMessage();
      this.loginMessage()
      this.passwordMessage();
      if(this.form.typeUser === 'student'){
        this.studentMessage();
        this.groupMessage();
        if(this.formValidation.fullName.isRight && this.formValidation.phone.isRight &&
            this.formValidation.isLoginRight && this.formValidation.isPasswordRight
            && this.formValidation.isCardRight && this.formValidation.isGroupRight){
          this.sendStudent();
          this.resetForm();
        } else{
          console.log('Студент не прошел проверку');
        }
      } else if(this.form.typeUser === 'parent'){
        if(this.formValidation.fullName.isRight && this.formValidation.phone.isRight &&
            this.formValidation.isLoginRight && this.formValidation.isPasswordRight){
          this.sendParent();
          this.resetForm();
        } else{
          console.log('Родитель заполнен не правильно');
        }
      } else if(this.form.typeUser === 'teacher'){
        if(this.formValidation.fullName.isRight && this.formValidation.phone.isRight &&
            this.formValidation.isLoginRight && this.formValidation.isPasswordRight){
          this.sendTeacher();
          this.resetForm();
        } else{
          console.log('Преподаватель заполнен не правильно');
        }
      } else {
        console.log('Вы не прошли проверку')
      }
    },
    phoneMessage(){
      this.formValidation.phone.isRight = /89[0-9]{2}[0-9]{7}/.test(this.form.phone);
      if(!this.formValidation.phone.isRight){
        document.querySelector('#phoneUserHelper').textContent = this.formValidation.phone.messages.wrongPhone
        document.querySelector('#phoneUserHelper').classList.add('text-danger');
      } else{
        document.querySelector('#phoneUserHelper').textContent = this.formValidation.phone.messages.success
        document.querySelector('#phoneUserHelper').classList.add('text-success');
      }
    },
    fullNameMessage(){
      let name = this.fullName.split(' ');
      if(name.length === 3){
        this.form.fullName.surname = name[0];
        this.form.fullName.name = name[1];
        this.form.fullName.lastName = name[2];

        this.formValidation.fullName.isRight = true;

        document.querySelector('#fullNameHelper').textContent = this.formValidation.fullName.messages.success
        document.querySelector('#fullNameHelper').classList.add('text-success');
      } else {
        document.querySelector('#fullNameHelper').textContent = this.formValidation.fullName.messages.wrongPhone;
        document.querySelector('#fullNameHelper').classList.add('text-danger');
      }
    },
    loginMessage(){
      if(this.form.login.trim().length === 0){
        document.querySelector('#loginUserHelper').textContent = 'Вы не ввели логин';
        document.querySelector('#loginUserHelper').classList.add('text-danger');
      } else{
        document.querySelector('#loginUserHelper').textContent = 'Все верно';
        document.querySelector('#loginUserHelper').classList.add('text-success');
        this.formValidation.isLoginRight = true;
      }
    },
    passwordMessage(){
      if(this.form.password.length > 8){
        document.querySelector('#passwordHelper').textContent = 'Все верно';
        document.querySelector('#passwordHelper').classList.add('text-success');

        this.formValidation.isPasswordRight = true;
      } else{
        document.querySelector('#passwordHelper').textContent = 'Кол-во символов должно быть больше 8';
        document.querySelector('#passwordHelper').classList.add('text-danger');

        this.formValidation.isPasswordRight = false;
      }
    },
    studentMessage(){
      if(this.form.studentCard.trim().length === 4){
        this.formValidation.isCardRight = true;
        document.querySelector('#cardStudentHelper').textContent = 'Все верно';
        document.querySelector('#cardStudentHelper').classList.add('text-success');
        document.querySelector('#cardStudentHelper').classList.remove('text-danger');
      } else{
        this.formValidation.isCardRight = false;
        document.querySelector('#cardStudentHelper').textContent = 'Вы верно ввели номер студенческого';
        document.querySelector('#cardStudentHelper').classList.add('text-danger');
        document.querySelector('#cardStudentHelper').classList.remove('text-success');
      }
    },
    groupMessage(){
      if(this.form.groupStudent.trim().length === 5){
        this.formValidation.isGroupRight = true;
      }
    },
    // -----------------
    sendStudent(){
      axios.post('http://127.0.0.1:8000/api/one/student',{
        'name': this.form.fullName.name,
        'middle_name': this.form.fullName.surname,
        'last_name': this.form.fullName.lastName,
        'login': this.form.login,
        'phone': this.form.phone,
        'password': this.form.password,
        'student_cart': this.form.studentCard,
        'group': this.form.groupStudent,
      }).then(response =>{
        console.log(response);
      }).catch(response =>{
        console.log(response);
      })
    },
    sendParent(){
      console.log(this.form);
      axios.post('http://127.0.0.1:8000/api/one/parent',{
        'name': this.form.fullName.name,
        'middle_name': this.form.fullName.surname,
        'last_name': this.form.fullName.lastName,
        'login': this.form.login,
        'phone': this.form.phone,
        'password': this.form.password,
        'students': this.form.parentChild
      }).then(response =>{
        console.log(response);
      }).catch(response =>{
        console.log(response);
      })
    },
    sendTeacher(){
      console.log(this.form);
      axios.post('http://127.0.0.1:8000/api/one/teacher',{
        'name': this.form.fullName.name,
        'middle_name': this.form.fullName.surname,
        'last_name': this.form.fullName.lastName,
        'login': this.form.login,
        'phone': this.form.phone,
        'password': this.form.password,
        'lessons': this.form.lessonArr
      }).then(response =>{
        console.log(response);
      }).catch(response =>{
        console.log(response);
      })
    }
  },
}
</script>

<style scoped>

</style>
