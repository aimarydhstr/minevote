require('./bootstrap');
window.Vue = require('vue');

import VueRouter from 'vue-router';
Vue.use(VueRouter);

import VueAxios from 'vue-axios';
import axios from 'axios';

import App from './views/App.vue';
import Index from './views/Index.vue';
import Login from './views/Login.vue';
import Register from './views/Register.vue';

Vue.use(VueAxios, axios);

const routes = [
	{
		name: 'home',
		path: '/admin',
		component: Index
	},
	{
		name: 'login',
		path: '/login',
		component: Login
	},
	{
		name: 'register',
		path: '/register',
		component: Register
	},
];

const router = new VueRouter({
	mode: 'history',
	routes: routes
});

const app = new Vue(Vue.util.extend({ router }, App)).$mount('#app');
