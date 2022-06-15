/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
require('./bootstrap');

import {createApp} from 'vue';
import {createWebHistory} from "vue-router";
window.VueRouter = require('vue-router');
// -------------------------------------------------------------------------------
// layout
import MainComponent from "./components/layout/MainComponent";
import LoginComponent from "./components/LoginComponent";
// -------------------------------------------------------------------------------
// ДЛЯ СТУДЕНТА
import MainStudentComponent from "./components/students/MainStudentComponent";
import AttestationComponent from "./components/students/AttestationComponent";
import DebtComponent from "./components/students/DebtComponent";
import ScheduleComponent from "./components/students/ScheduleComponent";
// -------------------------------------------------------------------------------
// ДЛЯ РОДИТЕЛЕЙ
import MainParentsComponent from "./components/parents/MainParentsComponent";
// -------------------------------------------------------------------------------
// ДЛЯ ПРЕПОДА
import MainTeachersComponent from "./components/teachers/MainTeachersComponent";
// -------------------------------------------------------------------------------
import ChatComponent from "./components/ChatComponent";
import FormNewsComponent from "./components/FormNewsComponent";
// -------------------------------------------------------------------------------
// Для админа
import StudentComponent from "./components/admin/StudentComponent";
import TeacherComponent from "./components/admin/TeacherComponent";
import ParentComponent from "./components/admin/ParentComponent";
import MakeUserComponent from "./components/admin/MakeUserComponent";
import MakeGroupComponent from "./components/admin/MakeGroupComponent";



const router = VueRouter.createRouter({
    history: createWebHistory(),
    routes: [
        // --------------------------------
        // ДЛЯ СТУДЕНТОВ
        {
            path: '/student',
            name: 'student',
            component: MainStudentComponent
        },
        {
            path: '/schedule',
            name: 'schedule',
            component: ScheduleComponent
        },
        {
            path: '/attestation',
            name: 'attestation',
            component: AttestationComponent
        },
        {
            path: '/debt',
            name: 'debt',
            component: DebtComponent
        },
        // --------------------------------
        // ДЛЯ РОДИТЕЛЕЙ
        {
            path: '/parent',
            name: 'parent',
            component: MainParentsComponent
        },
        // --------------------------------
        // ДЛЯ ПРЕПОДОВ
        {
            path: '/teacher',
            name: 'teacher',
            component: MainTeachersComponent
        },
        // --------------------------------
        // ДЛЯ АДМИНА
        {
            path: '/admin/students',
            name: 'all-students',
            component: StudentComponent
        },
        {
            path: '/admin/teachers',
            name: 'all-teachers',
            component: TeacherComponent
        },
        {
            path: '/admin/parents',
            name: 'all-parents',
            component: ParentComponent
        },
        {
          path: '/admin/make/user',
          name: 'adminMake',
          component: MakeUserComponent
        },
        {
            path: '/admin/make/group',
            name: 'admin.make.group',
            component: MakeGroupComponent
        },
        // --------------------------------
        {
            path: '/chat',
            name: 'chat',
            component: ChatComponent
        },

        {
            path: '/news/create',
            name: 'form-news',
            component: FormNewsComponent
        },
        {
            path: '/',
            name: 'login',
            component: LoginComponent
        }
    ]
});
const app = createApp(MainComponent);
app.use(router);
app.mount('#app');