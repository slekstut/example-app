require('./bootstrap');
import Vue from 'vue'
import Vuetify from 'vuetify';
import App from './components/App.vue';
import VueRouter from 'vue-router';
import VueAxios from 'vue-axios';
import axios from 'axios';
import {routes} from './routes';
window.Vue = require('vue').default;
Vue.use(VueRouter);
Vue.use(VueAxios, axios);
Vue.use(Vuetify);

const router = new VueRouter({
    mode: 'history',
    routes: routes
});

const app = new Vue({
    el: '#app',
    vuetify: new Vuetify(),
    router: router,
    render: h => h(App)
 });