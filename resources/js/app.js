
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('app', require('./components/App'));

// @todo Custom added, remove and check laravel docs. Source: https://vuejsdevelopers.com/2018/02/05/vue-laravel-crud/
import App from './components/App.vue';

const app = new Vue({
    el: '#app',

    // @todo Custom added, remove and check laravel docs. Source: https://vuejsdevelopers.com/2018/02/05/vue-laravel-crud/
    components: {
        App
    },
    render: h => h(App)
});
