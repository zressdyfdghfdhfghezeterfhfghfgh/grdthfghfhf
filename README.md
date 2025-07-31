# Car Rental SaaS (Skeleton)

Ce dépôt contient une structure minimale pour démarrer un projet de gestion d'agences de location de voitures. Les fichiers sont écrits en PHP procédural avec MySQL et Bootstrap 5.

## Dossiers
- `admin` : interface de gestion sécurisée (connexion, dashboard).
- `public` : site vitrine listant les voitures disponibles.
- `includes` : connexion base de données et fonctions communes.
- `sql` : script de création des tables et données de test.

## Installation rapide
1. Créez une base `car_rental` dans MySQL et exécutez `sql/schema.sql`.
2. Modifiez `includes/db.php` selon vos identifiants MySQL.
3. Rendez-vous sur `/admin/login.php` pour vous connecter. Utilisez `admin@platform.com` / `password` (hash déjà fourni).

Cette base peut être étendue pour couvrir toutes les fonctionnalités décrites dans la demande initiale.
