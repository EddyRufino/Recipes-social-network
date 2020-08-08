require('./bootstrap');

import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';

window.Vue = require('vue');

Vue.use(VueSweetalert2);

Vue.config.ignoredElements = ['trix-editor', 'trix-toolbar'];

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('delete-recipe', require('./components/DeleteRecipe.vue').default);
Vue.component('like-button', require('./components/LikeButton.vue').default);

// console.log(Vue.prototype); // Para ver si se intalo Sweetalert y otras cosas
const app = new Vue({
    el: '#app',
});

//  JQUERY
// $('.like-btn').on('click', function() {
//    $(this).toggleClass('like-active');
// });