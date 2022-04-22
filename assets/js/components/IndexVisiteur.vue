<template>
  <div class="container bg-light">
    <h2>Choisissez un visiteur</h2>
    <div class="input-group mb-3">
      <div>
        <label class="col-form-label">Visiteur :</label>
        <select
          name="PRA_NUM"
          class="form-select"
          v-model="visiteurChoix"
          @click="choixVisiteur()"
          required
        >
          <option
            v-for="visiteur in visiteurs['hydra:member']"
            :key="visiteur.id"
            :value="visiteur.id"
          >
            {{ visiteur.nom }} - {{ visiteur.prenom }}
          </option>
        </select>
      </div>
    </div>
    <div class="container mt-5" v-if="isVisiteurChoisi()">
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
                    <h4>{{choixVisiteurAPI.id}}  {{ choixVisiteurAPI.prenom }} {{ choixVisiteurAPI.nom }}</h4>
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
                    {{ choixVisiteurAPI.nom }}
                  </div>
                </div>
                <hr />
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Prénom</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    {{ choixVisiteurAPI.prenom }}
                  </div>
                </div>
                <hr />
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Adresse</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    {{ choixVisiteurAPI.adresse }}
                  </div>
                </div>
                <hr />
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Code Postal</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    {{ choixVisiteurAPI.cp }}
                  </div>
                </div>
                <hr />
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Ville</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    {{ choixVisiteurAPI.ville }}
                  </div>
                </div>
                <hr />
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Date d'embauche</h6>
                  </div>
                  <div
                    class="col-sm-9 text-secondary"
                    v-if="choixVisiteurAPI.dateembauche"
                  >
                    {{
                      moment(choixVisiteurAPI.dateembauche).format("DD/MM/YYYY")
                    }}
                  </div>
                </div>
                <hr />
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Secteur</h6>
                  </div>
                  <div class="col-sm-9 text-secondary" v-if="choixVisiteurAPI.idsecteur">
                    {{ choixVisiteurAPI.idsecteur.seclib }}
                  </div>
                </div>
                <hr />
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Laboratoire</h6>
                  </div>
                  <div
                    class="col-sm-9 text-secondary"
                    v-if="choixVisiteurAPI.idlaboratoire"
                  >
                    {{ choixVisiteurAPI.idlaboratoire.labolib }} 
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

<script src="../js/IndexVisiteur.js"></script>

<style scoped></style>
