import axios from 'axios'
import moment from 'moment';
import Vue from 'vue';
Vue.prototype.moment = moment;
moment.updateLocale('fr');
export default {
    name: 'indexpraticien',
    data() {
      return{
        praticiens: axios.get('http://127.0.0.1:8000/api/praticiens').then(rep => this.praticiens = rep.data),
        praticienChoix: "",
        choixPratiAPI: "",
      }
    },
    methods: {
      isPraticienChoisi(){
        return this.choixPraticien != null;
      },
      choixPraticien(){
          this.choixPratiAPI = axios.get('http://127.0.0.1:8000/api/praticiens/'+ this.praticienChoix)
          .then(rep => this.choixPratiAPI = rep.data);
      },
    }
  };