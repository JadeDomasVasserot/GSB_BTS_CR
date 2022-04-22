import axios from 'axios'
import moment from 'moment';
import Vue from 'vue';
Vue.prototype.moment = moment;
moment.updateLocale('fr');
export default {
    name: 'indexvisiteur',
    data() {
      return{
        visiteurs: axios.get('http://127.0.0.1:8000/api/visiteurs').then(rep => this.visiteurs = rep.data),
        visiteurChoix: "",
        choixVisiteurAPI: "",
      }
    },
    methods: {
      isVisiteurChoisi(){
        return this.choixVisiteur != null;
      },
      choixVisiteur(){
          this.choixVisiteurAPI = axios.get('http://127.0.0.1:8000/api/visiteurs/'+ this.visiteurChoix)
          .then(rep => this.choixVisiteurAPI = rep.data);
      },
    }
  };