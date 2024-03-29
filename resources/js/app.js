/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import Vue from 'vue';
window.Vue = require('vue');

import VueRouter from 'vue-router';

Vue.use(VueRouter);


let routes=[
	{
		path:'/dashboard',
		component: require('./components/dashboard.vue').default
	},
	{
		path:'/software',
		component: require('./components/software.vue').default
	},
	{
		path:'/school',
		component: require('./components/school.vue').default
	},
	{
		path:'/initial_feedback',
		component: require('./components/initial_feedback.vue').default
	},
	

]

//register section of routes

const router=new VueRouter({
	// mode:'history',
	routes
});


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

//Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */


//v-form script git bata
import { Form, HasError, AlertError } from 'vform'

//v -component tei git bata
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)

// mathi ko git "GLOBAL" garna

window.Form= Form

const app = new Vue({
    el: '#app',
    // id:'header',
    router,
    // or router:router but same name so mathi ko matra vaye pugxa
});
