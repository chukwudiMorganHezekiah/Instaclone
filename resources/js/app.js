
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

Vue.component('example-component', require('./components/ExampleComponent.vue'));

//profile first page
Vue.component('profilefirstpage', require('./components/pages/profilefirstpage.vue'));

//when a user is logined in

Vue.component('profile', require('./components/logedin/profile.vue'));


//follow component

Vue.component('follow', require('./components/follow.vue'));

//homepage

Vue.component('home', require('./components/home.vue'));

Vue.component('buttoner', require('./components/button.vue'));

// direcives


Vue.directive('rainbow',{
    bind(el,binding,vnode,){
        el.style.color="#"+Math.random().toString().slice(2,8);
    }
});


Vue.directive('title',{

        bind(el,binding,vnode,){
            el.style.textTransform="uppercase"
        }


});


//creating a bus

export const bus=new Vue();

const app = new Vue({
    el: '#app'
});
