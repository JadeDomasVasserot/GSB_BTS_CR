Composer install
Yarn install
Npm install

Lance le vue JS 
yarn encore dev-server --hot 

Lance le symfony
symfony serve:start

BDD à entité 
php bin/console doctrine:mapping:import "App\Entity" annotation --path=src/Entity
Génerer getters/setters 
php bin/console make:entity --regenerate App

make controlleur
symfony console make:controller ConferenceController

Prérequis : 
Composer, GitHub, Git, Synmfony, PhpStorm ou Visual Studio Code

Création du projet : 
composer create-project symfony/website-skeleton +nom projet
symfony

Démarrer/Arrêter le serveur :
symfony serveur:start / symfony serveur:stop

Changer la version de PHP : 
echo 7.4.24 > .php-version

Mettre sur GitHub : 
git init 
git remote add origin +url
git status
git add
git commin -m "Initial commit"
git push origin main

On a ensuite utilisé GitDeskop

Création de la base de donnée : 
php bin/console doctrine:database:create 
(on avait  créé la BDD et changé la route de la base de donnée vers la notre au préalable)

Faire la création des entités à partir de la base de données:
php bin/console doctrine:mapping:import "App\Entity" annotation --path=src/Entity

Création des Getters et Setters: 
php bin/console make:entity --regenerate App

Génération des controllers : 
php bin/console make:controller

Récupérer toutes les routes du projet : 
php bin/console debug:router

Création du crud pour chaque entité : 
php bin/console make:crud (puis on sélectionne ensuite l'entité)

Installation des différents packages manquant : 
composer require symfony/finder (pour le vendor par exemple).