import axios from 'axios'
import moment from 'moment';
import Vue from 'vue';
Vue.prototype.moment = moment;
moment.updateLocale('fr');
export default {
    name: 'indexmedicament',
    data() {
      return{
        medicaments: axios.get('http://127.0.0.1:8000/api/medicaments').then(rep => this.medicaments = rep.data),
        medicamentChoix: "",
        choixMedicAPI: "",
      }
    },
    methods: {
      isMedicamentChoisi(){
        return this.choixMedicament != null;
      },
      choixMedicament(){
          this.choixMedicAPI = axios.get('http://127.0.0.1:8000/api/medicaments/'+ this.medicamentChoix)
          .then(rep => this.choixMedicAPI = rep.data);
      },
    }
  };