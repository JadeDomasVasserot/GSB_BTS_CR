export default {
    name: 'home',
    data() {
      return {
        user:'',
        password:'',
  
      };
    },
    methods: {
      isEmptyUser(){
        return this.user === "";
      },
      isEmptyPassword(){
        return this.password === "";
      },
      searchWithEnter() {
      document.getElementById("buttonSubmit").click();
      },
    },
  };