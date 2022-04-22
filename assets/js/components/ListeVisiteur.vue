<template>
  <div>
    <table class="table table-light table-hover text-center">
      <thead>
        <tr>
          <th scope="col">Id du visiteur</th>
          <th scope="col">Nom</th>
          <th scope="col">Prénom</th>
          <th scope="col">Adresse</th>
          <th scope="col">CodePostal</th>
          <th scope="col">Ville</th>
          <th scope="col">Date d'embauche</th>
          <th scope="col">Laboratoire</th>
          <th scope="col">Secteur</th>
        </tr>
      </thead>
      <tbody>
        <tr
          v-for="visiteur in visiteurs['hydra:member']"
          :key="visiteur.id"
          :value="visiteur.id"
        >
          <th>{{visiteur.id}}</th>
          <td>{{visiteur.nom}}</td>
          <td>{{visiteur.prenom}}</td>
          <td>{{visiteur.adresse}}</td>
          <td>{{visiteur.cp}}</td>
          <td>{{visiteur.ville}}</td>
          <td v-if="visiteur.dateembauche">  {{ moment(visiteur.dateembauche).format("DD/MM/YYYY") }}</td>
          <td>{{visiteur.idlaboratoire.labolib}}</td>
          <td>{{visiteur.idsecteur.seclib}}</td>

        </tr>
      </tbody>
    </table>
  </div>
</template>

<script src="../js/ListeVisiteur.js"></script>

<style scoped></style>
