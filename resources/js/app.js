require('./bootstrap');
import Vue from 'vue'
import Vuetify from 'vuetify';
import App from './components/App.vue';
window.Vue = require('vue').default;

Vue.use(Vuetify);
const app = new Vue({
    el: '#app',
    vuetify: new Vuetify(),
    render: h => h(App)
 });