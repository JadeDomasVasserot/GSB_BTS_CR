<template>
  <div>
    <table class="table table-light table-hover text-center">
      <thead>
        <tr>
          <th scope="col">Id du médicament</th>
          <th scope="col">Nom commercial</th>
          <th scope="col">Composition</th>
          <th scope="col">Effets indésirables</th>
          <th scope="col">Contre-indications</th>
          <th scope="col">Prix de l'échantillon</th>
          <th scope="col">Famille</th>
        </tr>
      </thead>
      <tbody>
        <tr
          v-for="medicament in medicaments['hydra:member']"
          :key="medicament.idmedicament"
          :value="medicament.idmedicament"
        >
          <th>{{medicament.idmedicament}}</th>
          <td>{{medicament.nomcommercial}}</td>
          <td>{{medicament.composition}}</td>
          <td>{{medicament.effetsindesirables}}</td>
          <td>{{medicament.contreindications}}</td>
          <td>{{medicament.prixechantillon}}</td>
          <td>{{medicament.idfamille.famlib}}</td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script src="../js/ListeMedicament.js"></script>

<style scoped></style>
