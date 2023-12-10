# Authentification dans Laravel avec UI et AdminLTE

## Travail a faire
Ce référentiel démontre la configuration de l'authentification dans Laravel en utilisant l'interface utilisateur (UI) avec le thème AdminLTE.

## Package admin LTE
- Laravel ui adminlte
 - [Documentation](https://infyom.com/open-source/laravel-ui-adminlte/docs)

## Critères de validation
- utilisant adminlte ui

## Pour commencer

1. **Cloner le dépôt**

    ```bash
    git clone https://github.com/hamidAchaou/CNMH.git
    ```

2. **Installer les dépendances**

    ```bash
    composer install
    npm install
    ```

3. **Configurer les variables d'environnement**

    - Renommez `.env.example` en `.env`
    - Configurez vos identifiants de base de données dans le fichier `.env`

4. **Générer la clé de l'application**

    ```bash
    php artisan key:generate
    ```

5. **Exécuter les migrations**

    ```bash
    php artisan migrate
    ```

## Installation

- create new project laravel :
  ```bash
  composer create-project laravel/laravel laravel-starter
  ```

- Run Migrate Data :
  ```bash
  php artisan migrate
  ```
- Installez Laravel UI et le préréglage AdminLTE :
  ```bash
  composer require infyomlabs/laravel-ui-adminlte
  ```
  
- Ensuite, utilisez la commande artisan UI pour générer les vues d'authentification avec le thème AdminLTE :
  ```bash
  php artisan ui adminlte --auth
  ```
  
- Installation des dépendances Frontend :
  ```bash
  npm install
  npm run dev ou npm run build
  ```

- Démarrage du serveur:
  ```bash
  php artisan serve
  ```