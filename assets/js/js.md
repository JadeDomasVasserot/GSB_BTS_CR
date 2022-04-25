Ce dossier contient le Vue JS associé à ce projet.

On utilise le package Encore

On doit ajouter pour chaque composant la référence dans le app.js

Description de chaque component : 

Pour le CSS, on a utilisé Bootstrap

    Sommaire
Le sommaire est un composant vue permettant d'afficher la NavBarre de notre application web.
Il est composé d'une liste avec les balises ul et li 

    Erreur404
Erreur404 s'affiche lorsque la page n'existe pas où qu'il y a une erreur avec le serveur

    Home
Home est le composant avec le formulaire de connexion, c'est notre page d'accueil lorsqu'on
démarre l'application.
    Explication des méthodes : 
searchWithEnter permet à l'utilisateur de valider avec la touche entrée
isEmptyUser et isEmptyPassword permettent de vérifier que l'utilisateur ait bien rentré ses logins/password et gère l'état du bouton pour le mettre disabled ou non

    Index Medicament/Praticien/Visiteur
Les pages index permettent à l'utilisateur de chosir un médicament/praticien ou visiteur afin d'obtenir ses informations.
Il y a donc un select pour choisir don items et grâce au Vus JS et à Axios où va récupérer les informations de l'item choisi.
    Explication des méthodes :
On fait un appel axios pour récupérer la liste de l'item en question (avec API Plateform).
On affiche l'ensemble grâce à un v-for avec un keys et une value pour chaque items qui sera l'id.
La personne clique sur le son choix qu'il souhaite dans le select avec v-model une variable afin de récupérer la valeur chosisie.
ce qui va lancer la méthode choixPraticien() qui fait l'appel axios afin de récupérer les informations de l'item choisi.
Puis on affiche les information en vérifiant que l'item a bien été choisi avec la méthode isPraticienChoisi()
Avec le vue JS j'affiche les informations.
Pour praticien et visiteur j'utilise le package Moment afin de formater la date.

    Liste Medicament/Praticien/Visiteur
Ces pages affichent la liste complète de l'item.
Sous forme d'un tableau.
Je fais un appel axios pour récupérer l'ensemble des données de l'item
Avec le vue JS j'affiche les informations grâce à un v-for
Pour praticien et visiteur j'utilise le package Moment afin de formater la date.

    Profil
Permet de voir les informations relatives à l'utilisateur connecté.
Pour cela je fais un appel axios afin de récupérer les informations de l'utilisateur connecté via rapportvisite/visiteur/session.
Je récupère l'id et si l'utilisateur appuie sur voir les infos cela lance la méthode isSession avec en paramètre l'id de l'utilisateur.
Puis, je récupère les informations du visiteur avec un appel axios
Je les affiche ensuite avec vue JS et en utilisant aussi moment pour formater la date d'embauche.

    ShowCr
Permet de voir ses comptes rendus grâce à un v-for
Pour cela je fais un appel axios afin de récupérer les comptes rendus de l'utilisateur via 
/rapportvisite/show/list
cela affiche sous forme d'un tableau les informations. Et on peut voir le détail de produit grâce à un boutton qui fait appel à la méthode voirInfos avec en paramère l'id du rapport cliqué (axios à rapportvisite/voirProduit/{id}).
Si le tableau n'est pas = à 0 ça affiche sinon il affiche un message d'erreur qui dit qu'il n'y a pas de produis associés à ce rapport.
On utilise moment pour voir la date de la visite formatée
    Cr
Permet d'afficher le formulaire qui a pour action la route /rapportvisite/new de mon controller.
Pour ce formualaire, on doit afficher des listes (sous forme de select afin de voir l'ensemble des médicaments, motifs et de praticens). 
Je fais donc des appels axios pour ces items. Je les affiche avec un vfor de Vue JS.

Il faut mettre une value également au option qui sera l'id de l'item.
vmodel me permettra de récupérer les valeurs choisies et de les mettre dans une variable pour voir le choix du praticien, du motif et du produit selectionné.
Ces variables me permettent de gérer l'affichage des v-if
- Voir si remplaçant a été coché afin de disabled ou non le select du remplaçant.
- Voir si un praticien a été choisi afin d'afficher son coefficient de notoriété en dessous
- Voir si le motifs choisi est == à "Autre" pour disabled ou non l'input text
- Voir si le produit échantillon = AUCUN pour ne pas afficher (grâce à v-if) la quantité et le bouton +



