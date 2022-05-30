import axios from 'axios'
export default {
    name: "cr",
    data() {
      return {
        medicaments : axios.get('https://127.0.0.1:8000/api/medicaments').then(rep => this.medicaments = rep.data),
        motifs :  axios.get('https://127.0.0.1:8000/api/motifs').then(rep => this.motifs = rep.data),
        praticiens: axios.get('https://127.0.0.1:8000/api/praticiens').then(rep => this.praticiens = rep.data),
        praticienChoix: "",
        choixPratiAPI: "",
        isSelectRemplaçant: false,
        selectRemplaçant: "",
        motifSelect: "",
        produitSelected: "NULL",
    };
    },
    methods: {
        isPraticienChoisi(){
           return this.choixPraticien != null;
        },
        choixPraticien(){
            this.choixPratiAPI = axios.get('https://127.0.0.1:8000/api/praticiens/'+ this.praticienChoix).then(rep => this.choixPratiAPI = rep.data)
        },
        isCheck(pSelect, pVal){
            if (pSelect==pVal) 
			{ 
                this.check = true;
            }
			else { 
                this.check = false;
            }
        },
        isDisabled(pSelection) {
            console.log(pSelection)
            //active l'objet pObjet du formulaire si la valeur sélectionnée (pSelection) est égale à la valeur attendue (pValeur)
            if (pSelection==true) 
            { 
            return false;
            }
            else { 
            return true;
            }
        },
        ajoutLigne( pNumero){
        
            document.getElementById("but"+pNumero).setAttribute("hidden","true");	
            pNumero++;										//incrémente le numéro de ligne
            var laDiv=document.getElementById("lignes");	//récupére l'objet DOM qui contient les données
            var titre = document.createElement("label") ;	//crée un label
            titre.setAttribute("class","col-form-label");
            laDiv.appendChild(titre) ;						//l'ajoute à la DIV
            var liste = document.createElement("select");	//ajoute une liste pour proposer les produits
            laDiv.appendChild(liste) ;
            liste.setAttribute("name","PRA_ECH"+pNumero) ;
            liste.setAttribute("class","form-select");
            //remplit la liste avec les valeurs de la premiére liste construite en PHP é partir de la base
            liste.innerHTML=formRAPPORT_VISITE.elements["PRA_ECH1"].innerHTML;
            var qte = document.createElement("input");
            laDiv.appendChild(qte);
            qte.setAttribute("name","PRA_QTE"+pNumero);
            qte.setAttribute("size","2"); 
            qte.setAttribute("class","form-control");
            qte.setAttribute("type","number");
            var bouton = document.createElement("input");
            laDiv.appendChild(bouton);
            //ajoute une gestion évenementielle en faisant évoluer le numéro de la ligne
            bouton.setAttribute("v-on:click","ajoutLigne("+ pNumero +");");
            bouton.setAttribute("type","button");
            bouton.setAttribute("value","+");
            bouton.setAttribute("id","but"+ pNumero);				
        }
    },
    computed:{

    }
  };