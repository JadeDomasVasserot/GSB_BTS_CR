<template>
  <div>
    <div name="bas" class="container bg-light">
      <form
        name="formRAPPORT_VISITE"
        method="post"
        action="/rapportvisite/new"
      >
        <h1>Rapport de visite</h1>
        <div class="row">
          <div class="col">
            <div class="input-group mb-3">
              <div>
                <label class="col-form-label">DATE VISITE :</label>
                <input
                  type="date"
                  size="10"
                  name="RAP_DATEVISITE"
                  class="form-control"
                  required
                />
              </div>
            </div>
          </div>
          <div class="col">
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
                <div v-if="isPraticienChoisi()">
                <label class="col-form-label">COEFFICIENT :</label>
                <p>
                  {{choixPratiAPI.coefnotoriete}}
                </p>
                </div>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="input-group mb-3">
              <label class="col-form-label">REMPLACANT :</label>
              <div class="input-group mb-3">
                <input
                  type="checkbox"
                  id="remplacantId"
                  v-model="isSelectRemplaçant"
                />
              </div>
              <div class="input-group mb-3">
                <select
                  name="PRA_REMPLACANT"
                  :disabled="isSelectRemplaçant==''"
                  class="form-select"
                  v-model="selectRemplaçant"
                >
                  <option
                    v-for="praticien in praticiens['hydra:member']"
                    :key="praticien.idpraticien"
                    :value="praticien.idpraticien"
                  >{{ praticien.nom }} - {{ praticien.prenom }}</option>
                </select>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <div class="input-group mb-3">
              <div>
                <label class="col-form-label">MOTIF :</label>
                <select
                  name="RAP_MOTIF"
                  class="form-select"
                   v-model="motifSelect"
                >
                  <option
                    v-for="motif in motifs['hydra:member']"
                    :key="motif.motiflib"
                    :value="motif.motiflib"
                  >
                    {{ motif.motiflib }}
                  </option>
                </select>

                <input
                  type="text"
                  name="RAP_MOTIFAUTRE"
                  class="form-control"
                  :disabled="motifSelect !=='Autre'"
                />
              </div>
            </div>
          </div>
          <div class="col">
            <div class="input-group mb-6">
              <div>
                <label class="col-form-label">BILAN :</label
                ><textarea
                  rows="5"
                  cols="50"
                  name="RAP_BILAN"
                  class="form-control"
                ></textarea>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <label class="col-form-label">
            <h3>Eléments présentés</h3>
          </label>
          <div class="col">
            <div>
              <label class="col-form-label"> PRODUIT 1 : </label
              ><select name="PROD1" class="form-select">
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
          <div class="col">
            <div>
              <label class="col-form-label"> PRODUIT 2 : </label
              ><select name="PROD2" class="form-select">
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
          <label class="col-form-label">DOCUMENTATION OFFERTE :</label>
          <div>
            <input
              name="RAP_DOC"
              type="checkbox"
              class="form-check-input"
              checked="false"
            />
          </div>
        </div>
        <div>
          <label class="col-form-label"><h3>Echantillons</h3></label>
        </div>
        <div class="input-group mb-3">
          <div class="col-form-label" id="lignes">
            <label class="col-form-label">Produit : </label>
            <div>
              <select name="PRA_ECH1" class="form-select">
                <option
                  v-for="medicament in medicaments['hydra:member']"
                  :key="medicament.idmedicament"
                  :value="medicament.idmedicament"
                >
                  {{ medicament.nomcommercial }}
                </option>
              </select>
              <input
                type="number"
                name="PRA_QTE1"
                size="2"
                class="form-control"
              />
              <input type="button" id="but1" value="+" @click="ajoutLigne(1)" />
            </div>
          </div>
        </div>
        <label class="col-form-label"></label>
        <div>
          <input type="reset" value="annuler" class="btn btn-danger" /><input
            type="submit"
            class="btn btn-primary"
          />
        </div>
      </form>
    </div>
  </div>
</template>

<script src="../js/Cr.js"></script>
<style scoped></style>
