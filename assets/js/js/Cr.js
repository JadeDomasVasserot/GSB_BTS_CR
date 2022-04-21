import axios from 'Axios'
export default {
    name: "cr",
    data() {
      return {
        medicaments : axios.get('http://127.0.0.1:8000/api/medicaments.json')
        .then(response => {
            this.medicaments = response.data['hydra:member'];
            console.log(medicaments.nomcommercial);
        })
      };
    },
    methods: {
        test(){
            console.log(this.medicaments);
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
        ajoutLigne( pNumero){//ajoute une ligne de produits/qté à la div "lignes"     
                //masque le bouton en cours
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