import axios from 'axios'
import moment from 'moment';
import Vue from 'vue';
Vue.prototype.moment = moment;
moment.updateLocale('fr');
export default {
  name: 'listevisiteur',
    data() {
      return{
        visiteurs: axios.get('https://127.0.0.1:8000/api/visiteurs').then(rep => this.visiteurs = rep.data) 
      }
    },
  };