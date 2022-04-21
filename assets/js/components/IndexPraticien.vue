<template>
  <div class="container bg-light">
    <h2>Choisissez un praticien</h2>
    <div class="input-group mb-3">
      <div>
        <label class="col-form-label">PRATICIEN :</label>
        <select
          name="PRA_NUM"
          class="form-select"
          v-model="praticienChoix"
          @click="choixPraticien()"
          required
        >
          <option
            v-for="praticien in praticiens['hydra:member']"
            :key="praticien.idpraticien"
            :value="praticien.idpraticien"
          >
            {{ praticien.nom }} - {{ praticien.prenom }}
          </option>
        </select>
      </div>
    </div>
    <div class="container mt-5" v-if="isPraticienChoisi()">
      <div class="main-body">
        <div class="row gutters-sm">
          <div class="col-md-4 mb-3">
            <div class="card">
              <div class="card-body">
                <div class="d-flex flex-column align-items-center text-center">
                  <img
                    src="../../../doc/imgAvatar.jpg"
                    alt="Admin"
                    class="rounded-circle"
                    width="150"
                  />
                  <div class="mt-3">
                    <h4>{{ choixPratiAPI.prenom }} {{ choixPratiAPI.nom }}</h4>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-8">
            <div class="card mb-3">
              <div class="card-body">
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Nom de famille</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    {{ choixPratiAPI.nom }}
                  </div>
                </div>
                <hr />
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Prénom</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    {{ choixPratiAPI.prenom }}
                  </div>
                </div>
                <hr />
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Adresse</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    {{ choixPratiAPI.adresse }}
                  </div>
                </div>
                <hr />
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Code Postal</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    {{ choixPratiAPI.cp }}
                  </div>
                </div>
                <hr />
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Ville</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    {{ choixPratiAPI.ville }}
                  </div>
                </div>
                <hr />
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Date d'embauche</h6>
                  </div>
                  <div
                    class="col-sm-9 text-secondary"
                    v-if="choixPratiAPI.dateembauche"
                  >
                    {{
                      moment(choixPratiAPI.dateembauche).format("DD/MM/YYYY")
                    }}
                  </div>
                </div>
                <hr />
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Coefficient de notoriété</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    {{ choixPratiAPI.coefnotoriete }}
                  </div>
                </div>
                <hr />
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Lieu d'Exercice</h6>
                  </div>
                  <div
                    class="col-sm-9 text-secondary"
                    v-if="choixPratiAPI.lieuexercice"
                  >
                    {{ choixPratiAPI.lieuexercice.lieuexercice }}
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script src="../js/IndexPraticien.js"></script>

<style scoped></style>
