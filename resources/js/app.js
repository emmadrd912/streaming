/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
const theMovieDb = require('./TMDB');
require('./bootstrap');
require('./index');


// window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// const app = new Vue({
//     el: '#app',
// });
//

function successCB(data) {
  // console.log(data);
  let stored = JSON.parse(data);
  console.log(stored.results[0].id);
};

function errorCB(data) {
          console.log("Error callback: " + data);
    };

const film = theMovieDb.search.getMovie({"query":"Fight Club"}, successCB, errorCB);
console.log(film);

$('#video').submit(function(e){
    e.preventDefault();

    var form_input = $('#video').serializeArray(); // creates an array of objects

    // Add _token object
    form_input.push({
        name: '_token',
        value: '{{csrf_token()}}'
    });

    // Add hash object
    form_input.push({
        name: 'hash',
        value: 9999
    });

    $.ajax({
        url : 'video',
        type: "post",
        data: $.param(form_input), // back to a string!
        success : function (data) {
            //
        },
        // and so on
    })
});
