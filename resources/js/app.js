require('./bootstrap');

import 'owl.carousel';
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';

window.Vue = require('vue');

Vue.use(VueSweetalert2);

Vue.config.ignoredElements = ['trix-editor', 'trix-toolbar'];

Vue.component('delete-recipe', require('./components/DeleteRecipe.vue').default);
Vue.component('like-button', require('./components/LikeButton.vue').default);

// console.log(Vue.prototype); // Para ver si se intalo Sweetalert y otras cosas
const app = new Vue({
    el: '#app',
});

/*** Caruosel con owl-carousel ***/

jQuery(document).ready(function() {
	jQuery('.owl-carousel').owlCarousel({
		margin: 10,
		loop: true,
		autoplay: true,
		autoplayHoverPause:true,
		responsive: {
			0: {
				items : 1
			},
			600: {
				items : 2
			},
			1000: {
				items : 3
			},
		}
	});
});