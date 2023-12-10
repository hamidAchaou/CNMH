# lab-authorization-standard

## Travail à faire


- Améliorer l'athourisation de [`lab-authorization-basic`](https://github.com/hamidAchaou/CNMH/tree/main/Branche%20Technique/Labs/lab-authorization-basic)

### Critères de validation
- Attribution d'un rôle et de permissions à chaque utilisateur.
- Éviter l'utilisation de Gate ou de policies.
- Utiliser un seeder pour ajouter les rôles et les permissions

#### Packages

- spatie/laravel-permission

##### Référence 

- [spatie package](https://spatie.be/docs/laravel-permission/v6/introduction)
- [callAction](https://hotexamples.com/examples/illuminate.routing/Controller/callAction/php-controller-callaction-method-examples.html)

###### Commands

1. Install the Spatie package:

    ```bash
    composer require spatie/laravel-permission
    ```

2. Publish the configuration file and generate permission tables:

    ```bash
    php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"
    ```

3. Run migrations to update the database schema:

    ```bash
    php artisan migrate
    ```

4. Seed the database with initial data:

    ```bash
    php artisan db:seed
    ```
