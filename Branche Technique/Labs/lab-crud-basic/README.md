# Lab laravel basic

## Travail à faire

- Créer les CRUD pour les tâches, et afichage des projet implémenter la recherche , ajouter la pagination et inclure la table des projets.

### Critères de validation 

- Créer le CRUD des tâches
- afficher les tâches pour chaque projet
- afficher les projet
- Inclure la recherche en utilisant AJAX
- Ajouter la pagination
- Ajouter la base de données incluant la table des projets dans les seeders

#### Référence 

[Laravel Tutorial](https://grafikart.fr/formations/laravel)

##### Process Workflow 

1. Start by installing Laravel through the terminal with this command:

```bash
composer create-project laravel/laravel=10 lab-crud-basic

```
2. Next, create the .env file using the command:

```bash
cp .env.example .env
```
3. Add the database name to the .env file.

4. Proceed to create the tables by running these commands:

```bash

php artisan make:migration Projects

php artisan make:migration Tasks

```
5. Once the column names for the tables are set, migrate them to the database:

```bash
php artisan migrate

```

6. Populate the database with project information by creating a seeder and executing:

```bash
php artisan db:seed
```

7. With the tasks table and seeder set, generate models for `tasks` and `projects`:

```bash
php artisan make:model Project

php artisan make:model Task
```
8. Create controllers to manage data from the database:

```bash
php artisan make:controller ProjectsController 

php artisan make:controller TasksController 

```
9. Design and create the necessary view pages within the resource directory and update your routes.

10. To view your project's progress locally, run this command:

```bash 
php artisan serve

```
