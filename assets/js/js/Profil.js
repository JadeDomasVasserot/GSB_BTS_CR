import axios from "axios";
import moment from 'moment';
import Vue from 'vue';
Vue.prototype.moment = moment;
moment.updateLocale('fr');
export default {
    name: 'profil',
    data() {
      return {
        currentUserSession: axios.get('https://127.0.0.1:8000/visiteur/session').then(rep => this.currentUserSession = rep.data),
        user:'',
        info: false,
      };
    },
    methods: {
      isSession(id){
        this.user =  axios.get("https://127.0.0.1:8000/api/visiteurs/"+id).then(rep => this.user = rep.data)
        this.info = true;
      }
    }, 
      
    computed:{

    }
  };