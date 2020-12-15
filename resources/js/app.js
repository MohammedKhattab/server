import './bootstrap';
import Vue from 'vue';
import Swal from "sweetalert2";

window.Swal = Swal;

const files = require.context('./', true, /\.vue$/i)
files.keys().map(
    key => Vue.component(key.split('/').pop().split('.')[0], files(key).default)
)

new Vue({
    el: '#app',
});
