# Nom du Projet : ColisFroid App

- Site de gestion de colis
***

## Environnement de développement

### Pré-requis :

* PHP 7.4
* Composer
* Symfony CLI
* Nodejs et NPM

Vous pouvez vérifier les pré-requis avec la commande suivante (de la CLI Symfony) :

```
symphony check-requirements
```

### Lancer environnement de développement

```
composer install
npm install
npm run build
symfony serve -d
```

## Lancer des tests

```
php bin/phpunit --testdox
```