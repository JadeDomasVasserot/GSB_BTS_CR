// assets/js/app.js
import Vue from 'vue';
import Home from './components/Home.vue'
import Sommaire from './components/Sommaire.vue'
import Erreur404 from './components/Erreur404.vue'
import Cr from './components/Cr.vue'
import Profil from './components/Profil.vue'
import IndexPraticien from './components/IndexPraticien.vue'
import ListePraticien from './components/ListePraticien.vue'
import IndexMedicament from './components/IndexMedicament.vue'
import ListeMedicament from './components/ListeMedicament.vue'

/**
* Create a fresh Vue Application instance
*/
new Vue({
  el: '#app',
  components: {
    'home': Home,
    'sommaire': Sommaire,
    'erreur404': Erreur404,
    'cr': Cr,
    'profil': Profil,
    'indexpraticien': IndexPraticien,
    'listepraticien': ListePraticien,
    'indexmedicament': IndexMedicament,
    'listemedicament': ListeMedicament,
  }
});