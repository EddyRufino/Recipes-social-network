require('./bootstrap');

window.Vue = require('vue');

Vue.config.ignoredElements = ['trix-editor', 'trix-toolbar'];

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

const app = new Vue({
    el: '#app',
});
