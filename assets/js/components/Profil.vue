<template>
  <div class="container mt-5">
    <div class="main-body ">
      <div class="row gutters-sm">
        <div class="col-md-4 mb-3">
          <div class="card">
            <div class="card-body">
              <div class="d-flex flex-column align-items-center text-center">
                <img
                  src="https://bootdey.com/img/Content/avatar/avatar7.png"
                  alt="Admin"
                  class="rounded-circle"
                  width="150"
                />
                <div class="mt-3">
                  <h4>{{currentUserId.prenom}} {{currentUserId.nom}}</h4>
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
                  <h6 class="mb-0">Nom de famille </h6>
                </div>
                <div class="col-sm-9 text-secondary">{{currentUserId.nom}}</div>
              </div>
              <hr />
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Prénom</h6>
                </div>
                <div class="col-sm-9 text-secondary">{{currentUserId.prenom}}</div>
              </div>
              <hr />
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Login</h6>
                </div>
                <div class="col-sm-9 text-secondary">{{currentUserId.login}}</div>
              </div>
              <hr />
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Adresse</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                 {{currentUserId.adresse}}
                </div>
              </div>
              <hr />
               <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Code Postal</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                 {{currentUserId.cp}}
                </div>
              </div>
              <hr />
               <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Ville</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                 {{currentUserId.ville}}
                </div>
              </div>
              <hr />
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Date d'embauche</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                 {{currentUserId.dateEmbauche}}
                </div>
              </div>
              <hr />
               <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Laboratoire</h6>
                </div>
                <div class="col-sm-9 text-secondary">
          {{currentUserId.labo}}
                </div>
              </div>
              <hr />
               <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Secteur</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                   {{currentUserId.secteur}}
                </div>
              </div>
              <hr />
              <!-- <div class="row">
                <div class="col-sm-12">
                  <a
                    class="btn btn-info"
                    target="__blank"
                    href="/visiteur/editProfil"
                    >Modifier</a
                  >
                </div>
              </div> -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script src="../js/Profil.js"></script>

<style scoped></style>
