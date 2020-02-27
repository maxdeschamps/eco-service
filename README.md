# Eco-Service
Projet E-commerce G4 - ING1 - Symfony

## Installation
- Mettez-vous dans le dossier htdocs de XAMPP (ou www de Wampp)
- `git clone https://github.com/maxdeschamps/eco-service.git`
- `cd eco-service`
- `composer install && npm install`
- Lancez xampp/wampp/uwampp/ou quelque soit votre connerie...
- Lancez vos serveurs Apache et MySql
- `php bin/console doctrine:database:create`
- `php bin/console doctrine:migrations:migrate`
- `npm run dev`

## Lancement du site
- `php bin/console server:run`
- Allez sur cette url : 127.0.0.1:8000/
- C'est bon !

## Webpack, CSS et JavaScript
- Ajoutez vos fichiers SCSS ou JS dans ./assets/css/ ou ./assets/js/
- Pensez à respecter l'arborescence ! Les styles/scripts qui sont communs à plusieurs ou toutes les pages vont dans bases/global.extension, ceux qui ne concernent qu'une page vont dans pages/nom-de-page.extension
- Si vous êtes amené à rajouter une page, pensez à la mettre aussi dans le app.scss (pour les styles) ou app.js (pour les scripts) !
- Quand vous avez terminé vos modifications de style, enregistrez le app.scss en version minifiée
  Exemple : Pour Atom, allez dans le menu Packages > SASS Autocompile > Output style > Compressed (la valeur doit être cochée). Tous vos fichiers scss seront enregistrés dans le format scss, et aussi dans le format min.css
- `npm run dev`
- Si vous êtes amené à faire plusieurs modifications du style, lancez plutôt $ npm run watch (la compilation du code se fait automatiquement dès que vous modifiez un fichier)

## Fixtures
- Dans le dossier Migration dans src/migrations supprimer les migrations
- `php bin/console doctrine:database:drop --force` -> supprime la bdd
- `php bin/console doctrine:database:create` -> créé la bdd
- `php bin/console doctrine:schema:create` -> génère le shema actuelle de la bdd, plus besoin des migrations
- `php bin/console doctrine:fixtures:load` -> lance les fixtures afin de populer les tables de notre bdd

## DOMPDF
 - composer require dompdf/dompdf
