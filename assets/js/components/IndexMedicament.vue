<template>
  <div class="container bg-light">
    <h2>Choisissez un médicament</h2>
    <div class="input-group mb-3">
      <div>
        <label class="col-form-label">Médicament :</label>
        <select
          name="Medicament"
          class="form-select"
          v-model="medicamentChoix"
          @click="choixMedicament()"
          required
        >
          <option
            v-for="medicament in medicaments['hydra:member']"
            :key="medicament.idmedicament"
            :value="medicament.idmedicament"
          >
            {{ medicament.nomcommercial }}
          </option>
        </select>
      </div>
    </div>
    <div class="container mt-5" v-if="isMedicamentChoisi()">
      <div class="main-body">
        <div class="row gutters-sm">
          <div class="col-md-4 mb-3">
            <div class="card">
              <div class="card-body">
                <div class="d-flex flex-column align-items-center text-center">
                  <img
                    src="../../../doc/medoc.jpg"
                    alt="Admin"
                    class="rounded-circle"
                    width="150"
                  />
                  <div class="mt-3">
                    <h4>{{ choixMedicAPI.nomcommercial }}</h4>
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
                    <h6 class="mb-0">Nom Commercial</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    {{ choixMedicAPI.nomcommercial }}
                  </div>
                </div>
                <hr />
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Composition</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    {{ choixMedicAPI.composition }}
                  </div>
                </div>
                <hr />
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Effets indésirables</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    {{ choixMedicAPI.effetsindesirables }}
                  </div>
                </div>
                <hr />
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Contre-indications</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    {{ choixMedicAPI.contreindications }}
                  </div>
                </div>
                <hr />
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Prix de l'échantillon</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    {{ choixMedicAPI.prixechantillon }} €
                  </div>
                </div>
                <hr />
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Famille</h6>
                  </div>
                  <div
                    class="col-sm-9 text-secondary"
                  >
                    {{ choixMedicAPI.idfamille.idfamille }}
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

<script src="../js/IndexMedicament.js"></script>

<style scoped></style>
