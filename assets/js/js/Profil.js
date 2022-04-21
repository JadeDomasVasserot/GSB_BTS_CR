import axios from "axios";

export default {
    name: 'profil',
    data() {
      return {
        currentUserId: axios.get('http://127.0.0.1:8000/visiteur/session').then(rep => this.currentUserId = rep.data)
      };
    },
    methods: {
      
    },
    computed:{
      user(){
        
        
      },
    }
  };