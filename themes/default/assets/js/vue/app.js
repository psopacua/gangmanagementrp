import numFormat from 'vue-filter-number-format';
import draggable from 'vuedraggable';

require('./bootstrap');


window.Vue = require('vue');

/**
 * Initiate components
 */
Vue.component('BvnerHome',            require('./components/Home'));
Vue.component('VloggerVideos',        require('./components/VloggerVideos'));
Vue.component('VideoComponent',       require('./components/VideoComponent'));
Vue.component('BvnerFavoritesChange', require('./components/favorites/change'));
Vue.component('Draggable',            draggable);
/**
 * Filters
 */
Vue.filter('numFormat', numFormat);

/**
 * Bootstrap Vue.js
 */
const app = new Vue({
    el: '#all-output'
});