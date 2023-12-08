# lab crud standard

- Ce dépôt présente un projet Laravel standard pour la gestion des tâches.

#### Référence. 

[Laravel Tutorial](https://grafikart.fr/formations/laravel)

## Travail à faire
Complétez le travail sur le lab CRUD Laravel de base en utilisant le design pattern Repository, implémentez la recherche, ajoutez la pagination et incluez la table des projets ainsi que l'ajout CRUD pour les projets.

### Critères de validation 

- Compléter le travail sur  [`lab crud laravel basic`](https://github.com/hamidAchaou/CNMH/tree/main/Branche%20Technique/Labs/lab-crud-basic)
- Opérations CRUD pour les tâches et les projets
- Pagination
- Recherche (AJAX)
- Design Pattern Repository
- Filtrer les tâches par projet
- Données d'exemple (jeux de test)

##### Process Workflow 

1. Commencez par cloner le lab CRUD de base avec cette commande :

```bash
git clone https://github.com/hamidAchaou/CNMH.git

```
2. Ensuite, accédez au lab-crud-standar :

```bash
cd "Branche Technique" 
cd "Labs" 
cd "lab-crud-standar"
```
3. Ensuite, créez le fichier .env en utilisant la commande :

```bash
cp .env.example .env
```
4. Ajoutez le nom de la base de données dans le fichier .env.

5. Générez une clé en utilisant cette commande.
```bash
php artisan key:generate
```

6. Migrez les tables vers la base de données :

```bash
php artisan migrate

```

7. Remplissez la base de données avec des informations de projet en créant un seeder et en exécutant :

```bash
php artisan db:seed
```


6. Pour voir l'avancement de votre projet localement, exécutez cette commande :

```bash 
php artisan serve

```
