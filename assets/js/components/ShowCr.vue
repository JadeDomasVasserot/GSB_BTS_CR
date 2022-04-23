<template>
  <div>
 <div>
   <h1 class="mt-3">Voir ses rapports de visite</h1>
    <table class="table table-light table-hover text-center mt-3">
      <thead>
        <tr>
          <th scope="col">Date de la visite</th>
          <th scope="col">Praticien</th>
          <th scope="col">Est remplaçant ?</th>
           <th scope="col">Praticien Remplaçant</th>
          <th scope="col">Bilan</th>
          <th scope="col">Motif</th>
          <th scope="col">Produits</th>
        </tr>
      </thead>
      <tbody>
        <tr
          v-for="rapport in rapports[0]"
          :key="rapport.id"
          :value="rapport.id"
        >
          <td v-if="rapport.dateVisite">{{moment(rapport.dateVisite.date).format("DD/MM/YYYY") }}</td>
          <td>{{rapport.prenomPraticien}} {{rapport.nomPraticien}}</td>
          <td>{{rapport.estRemplacant}}</td>
           <td>{{rapport.prenomRemplacant}} {{rapport.nomRemplacant}}</td>
          <td>{{rapport.bilan}}</td>
          <td>{{rapport.idMotif}}</td>
          <td><button class="btn btn-info" @click="voirInfos(rapport.id)">Voir infos</button></td>
        </tr>
      </tbody>
    </table>
        <table class="table table-light table-hover text-center mt-3" v-if="infoProduct == true">
          <h1 v-if="medicaments ==0">Pas de produit asssocié à pour ce rapport</h1>
      <thead>
        <tr>
          <th scope="col">Nom du médicament</th>
          <th scope="col">Est un échantillon ?</th>
          <th scope="col">Est présenté ?</th>
          <th scope="col">Quantité</th>
          <th scope="col">Id du rapport sélectionné</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="medica in medicaments[0]"
          :key="medica.id"
          :value="medica.id">
          <th>{{medica.nomMedica}}</th>
          <td>{{medica.estEchantillon}}</td>
            <td>{{medica.estPresente}}</td>
          <td>{{medica.quantite}}</td>
          <td>{{medica.idRapport}}</td>
          <td></td>
        </tr>
      </tbody>
    </table>
  </div>
  </div>
</template>

<script src="../js/ShowCr.js">
</script>

<style scoped>
</style>
