<template>
  <div>
    <table class="table table-light table-hover text-center">
      <thead>
        <tr>
          <th scope="col">Id du praticien</th>
          <th scope="col">Nom</th>
          <th scope="col">Prénom</th>
          <th scope="col">Adresse</th>
          <th scope="col">CodePostal</th>
          <th scope="col">Ville</th>
          <th scope="col">Date d'embauche</th>
          <th scope="col">Coefficient de notoriété</th>
          <th scope="col">Lieu de l'exercice</th>
        </tr>
      </thead>
      <tbody>
        <tr
          v-for="praticien in praticiens['hydra:member']"
          :key="praticien.idpraticien"
          :value="praticien.idpraticien"
        >
          <th>{{praticien.idpraticien}}</th>
          <td>{{praticien.nom}}</td>
          <td>{{praticien.prenom}}</td>
          <td>{{praticien.adresse}}</td>
          <td>{{praticien.cp}}</td>
          <td>{{praticien.ville}}</td>
          <td v-if="praticien.dateembauche">  {{ moment(praticien.dateembauche).format("DD/MM/YYYY") }}</td>
          <td>{{praticien.coefnotoriete}}</td>
          <td>{{praticien.lieuexercice.lieuexercice}}</td>

        </tr>
      </tbody>
    </table>
  </div>
</template>

<script src="../js/ListePraticien.js"></script>

<style scoped></style>
