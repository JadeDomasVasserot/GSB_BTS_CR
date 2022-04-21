import axios from 'axios'
import moment from 'moment';
import Vue from 'vue';
Vue.prototype.moment = moment;
moment.updateLocale('fr');
export default {
  name: 'listepraticien',
    data() {
      return{
        praticiens: axios.get('http://127.0.0.1:8000/api/praticiens').then(rep => this.praticiens = rep.data) 
      }
    },
  };