import axios from 'axios'
import moment from 'moment';
import Vue from 'vue';
Vue.prototype.moment = moment;
moment.updateLocale('fr');
export default {
    name: 'showcr',
    data() {
      return{
        rapports: axios.get('http://127.0.0.1:8000/rapportvisite/show/list').then(rep => this.rapports = rep.data),
        infoProduct: false,
        medicaments:'',
      }
    },
    methods:{
      voirInfos(id){
        this.medicaments =  axios.get('http://127.0.0.1:8000/rapportvisite/voirProduits/'+id).then(rep => this.medicaments = rep.data),

        this.infoProduct = true;
      }
    }
  };