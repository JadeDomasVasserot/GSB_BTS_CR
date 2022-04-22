import axios from "axios";
import moment from 'moment';
import Vue from 'vue';
Vue.prototype.moment = moment;
moment.updateLocale('fr');
export default {
    name: 'profil',
    data() {
      return {
        currentUserSession: axios.get('http://127.0.0.1:8000/visiteur/session').then(rep => this.currentUserSession = rep.data),
        user:'',
      };
    },
    methods: {
      isSession(){
        if(this.currentUserSession != null){
        
        this.user =  axios.get("http://127.0.0.1:8000/api/visiteurs/"+this.currentUserSession.id).then(rep => this.user = rep.data)
        }
      }
    }, 
      
    computed:{

    }
  };