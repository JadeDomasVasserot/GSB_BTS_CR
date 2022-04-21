https://www.cloudways.com/blog/symfony-vuejs-app/
# Intégrer VueJS dans Symfony 5
https://gist.github.com/emicheldev/971c4340132e4291773216b583788ff4#file-vuejs-and-symfony5-md
### Installation de Symfony

     symfony new vue-symfony

Déplacez vous sur le dossier et installer le serveur web.

```cmd
  cd vue-symfony
  composer require server -- dev
  ```
Créez votre contrôleur:

    php bin/console make:controller ControllerName
Mettez dans le contrôleur une méthode :

```php
  /**
* @Route("/", name="home")
 */
  public function home()
  {
	  return $this->render('home.html.twig');

 }
 ```
Ajoutez votre `fichier.html.twig` dans dossier Template.
Mettez ce contenu de base.

```twig
 {% extends 'base.html.twig' %}

 {% block body %}

	 <h3>My Symfony 4 sample project</h3>

 {% endblock %}
 ```

# Installation de Vue et ses dépendances

 ### Installer Encore
 

     composer require symfony/webpack-encore-bundle
     yarn install

À l'aide de yarn, installez Vue et ses dépendances 😉.

    npm install --dev vue vue-loader vue-template-compiler

Activé VueJs dans le **_webpack.config.js_** c'est grâce à **M** webpack.config.js que la magie  va s'opérer, 😥 faut pas avoir peur, je suis là pour te guider.

```cmd
var Encore = require('@symfony/webpack-encore'); 
Encore.setOutputPath('public/build/')
   .setPublicPath('/build')
   .cleanupOutputBeforeBuild()
   .enableSourceMaps(!Encore.isProduction())
   .addEntry('js/app', './assets/js/app.js')
   // .addStyleEntry('css/app', './assets/css/app.scss')
   // .enableSassLoader()
   // .autoProvidejQuery()


   // Enable Vue loader
   .enableVueLoader()
;

module.exports = Encore.getWebpackConfig();
```

Webpack **Encore** attend un point d'entrée.  
Avant d'aller plus loin 🙏 jettez un oeil  à webpack encore; voici le [lien](https://symfony.com/doc/current/frontend.html#webpack-encore)  👨‍🦳, il y a beaucoup à découvrir.
Créez un sous-répertoire nommé `js` dans le dossier `assets`, puis ajoutez-y un fichier `app.js`.

```js
// assets/js/app.js
import Vue from 'vue';

import Example from './components/Example'

/**
* Create a fresh Vue Application instance
*/
new Vue({
  el: '#app',
  components: {Example}
});
```


### Créer le composant Vue

Créez un dossier que vous allez appeler **components** comme sous dossier de **js** et ajouter le fichier **Example.vue**.
Voici ce qu'on a : **assets/js/components/Example.vue**

```js
<template>
   <div>
       <p>This is an example of a new components in VueJs</p>
   </div>
</template>

<script>
   export default {
       name: "example"
   }
</script>

<style scoped>

</style>
```
c'est cool 😎 les amis, nous allons bientôt terminer.
Compilons : 

     yarn encore dev-server --hot 

Rendez-vous 🏃‍♂️ sur le Template de base de twig pour ajouter notre `app.js` 

```twig
  <div id="app">
       {% block body %}{% endblock %}
   </div>

   {% block javascripts %}
       {{ encore_entry_script_tags('app') }}
   {% endblock %}
   ```

Ne vous iniquitez 😰 pas je vais vous expliquer 😉:
Le `id="app"` te permet de manipuler le DOM, et c'est quoi le DOM 😟 désolé mon ami va demander à Google.

### Affichons le contenu de notre  composant Vue
Rendons nous sur la page **home.html.twig** qui est dans le dossier template(**templates/index.html.twig**), ajoutons juste le composant **Example** 😎

On aura: 

   ```twig
   
{% extends 'base.html.twig' %}
{% block body %}

   <div class="text-center">
       <h3>My Symfony 4 sample project</h3>

       <div class="jumbotron text-center">
           <example></example>
       </div>
   </div>

{% endblock %}
  
  ```
Youpi !! 🎉🎉👏 tu as réussi à intégrer VueJs à Symfony 