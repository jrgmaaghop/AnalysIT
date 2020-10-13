import Vue from 'vue'
import VueRouter from 'vue-router'
Vue.use(VueRouter)

import vuetify from '../js/plugins/vuetify'

import store from "./store";
import routes from './router';

Vue.component('navigation', require('./components/navigation.vue').default);
const app = new Vue({
    el: '#app',
    store,vuetify,
    router: new VueRouter(routes),
});
