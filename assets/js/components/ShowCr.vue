<template>
  <div>
 <div>
   <h1 class="mt-3">Voir ses rapports de visite</h1>
    <table class="table table-light table-hover text-center mt-3">
      <thead>
        <tr>
          <th scope="col">Id du rapport</th>
          <th scope="col">Date de la visite</th>
          <th scope="col">Praticien</th>
          <th scope="col">Est remplaçant ?</th>
          <th scope="col">Bilan</th>
          <th scope="col">Motif</th>
          <th scope="col">Produits</th>
          <th scope="col">Echantillons</th>
        </tr>
      </thead>
      <tbody>
        <tr
          v-for="rapport in rapports[0]"
          :key="rapport.id"
          :value="rapport.id"
        >
          <th>{{rapport.id}}</th>
          <td v-if="rapport.dateVisite">{{moment(rapport.dateVisite.date).format("DD/MM/YYYY") }}</td>
          <td>{{rapport.idPraticien}}</td>
          <td>{{rapport.estRemplacant}}</td>
          <td>{{rapport.bilan}}</td>
          <td>{{rapport.idMotif}}</td>
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
