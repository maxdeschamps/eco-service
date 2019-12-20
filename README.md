# Eco-Service
Projet E-commerce G4 - ING1 - symfony

## Installation
- cloner le projet dans le dossier htdocs de XAMPP
- $ cd eco-service
- $ composer install && npm install
- lancer xampp/wampp/uwampp/ou quelque soit votre connerie...
- lancer vos serveurs apache et mysql
- $ php bin/console doctrine:database:create
- $ php bin/console doctrine:schema:update --force
- $ npm run dev

## Lancement du site
- $ php bin/console server:run
- Aller sur cette url : 127.0.0.1:8000/
- C'est bon !
