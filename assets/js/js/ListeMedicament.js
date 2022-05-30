import axios from 'axios'
import moment from 'moment';
import Vue from 'vue';
Vue.prototype.moment = moment;
moment.updateLocale('fr');
export default {
  name: 'listemedicament',
    data() {
      return{
        medicaments: axios.get('https://127.0.0.1:8000/api/medicaments').then(rep => this.medicaments = rep.data) 
      }
    },
  };