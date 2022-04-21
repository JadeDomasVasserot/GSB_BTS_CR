<template>
  <div>
    <div class="p-3 border bg-light">
        <h1 class ="link-primary">CONNEXION</h1>
    </div>
    <div class="container mt-5">
        <form method="POST" action="/connexion">
          <div class="mb-3">
            <label for="inputUser" class="form-label">Nom d'utilisateur*</label>
            <input
              type="inputUser"
              name="inputUser"
              class="form-control"
              id="inputUser"
              required
              v-on:keyup.enter="searchWithEnter()"
              v-model="user"
            />
          <div v-if="isEmptyUser()">
            Merci de rentrer un utilisateur
          </div>
          </div>
          <div class="mb-3">
            <label for="inputPassword" class="form-label">Mot de passe*</label>
            <input
              type="password"
              class="form-control"
              id="inputPassword"
              name="inputPassword"
              v-on:keyup.enter="searchWithEnter()"
              v-model="password"
              required
            />
          </div>
          <div v-if="isEmptyPassword()">
            Merci de rentrer un mot de passe
          </div>
          <button :disabled="isEmptyPassword()||isEmptyUser()" id="buttonSubmit" type="submit" class="btn btn-primary mt-2">Connexion</button>
        </form>
    </div>
  </div>
</template>

<script src="../js/Home.js">
</script>

<style scoped>

</style>
