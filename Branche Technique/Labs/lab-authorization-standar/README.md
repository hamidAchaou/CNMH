# Lab authorisation basic

## Travail à faire

- Ajouter l'authentification pour [`Lab-Laravel-crud-basic`](https://github.com/Jalil-Betroji/lab-crud.git) .
- Additionner l'autorisation pour [`Lab-Laravel-crud-basic`](https://github.com/Jalil-Betroji/lab-crud.git) .

### Critères de validation

- Intégrer l'authentification via Laravel Auth.
- Appliquer la fonction callAction.
- Utiliser Gate pour les autorisations.
- Éviter l'utilisation des policies

#### Référence
- [Authentififcation](https://laravel.com/docs/10.x/authentication)
- [authorization référence 1](https://laravel.com/docs/10.x/authorization)
- [authorization référence 2](https://jhadiary.wordpress.com/2020/03/14/laravel-call-a-routine-or-function-before-each-route-action-is-called/ )

##### Command used in the application

1. Clone the Repository:

```bash
git clone https://github.com/Jalil-Betroji/lab-crud.git
```

2. Update Composer Dependencies:

```bash
composer update 
```

3. Create Environment File:

```bash
cp .env.example .env
```

4. Run Migrations:

```bash
php artisan migrate
```

5. Seed Database:

```bash
php artisan db:seed
```

6. Launch the Application::

```bash 
php artisan serve
```
