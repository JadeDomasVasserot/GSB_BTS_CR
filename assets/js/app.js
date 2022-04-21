// assets/js/app.js
import Vue from 'vue';
import Home from './components/Home.vue'
import Sommaire from './components/Sommaire.vue'
import Erreur404 from './components/Erreur404.vue'
import Cr from './components/Cr.vue'


/**
* Create a fresh Vue Application instance
*/
new Vue({
  el: '#app',
  components: {
    'home': Home,
    'sommaire': Sommaire,
    'erreur404': Erreur404,
    'cr': Cr
  }
});