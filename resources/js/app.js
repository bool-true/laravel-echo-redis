/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');


import Echo from "laravel-echo"
window.Echo = new Echo({
    broadcaster: 'socket.io',
    host: window.location.hostname + ':6002'
});

window.Echo.channel('push')
.listen('.push.message', (e) => {
    alert(e.message);
    console.log(e);
});

const app = new Vue({
    el: '#app',
});
