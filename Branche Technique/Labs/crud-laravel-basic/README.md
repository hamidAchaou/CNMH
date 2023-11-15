<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Gestion des Competences

Gestion des Competences is a Laravel-based Competence Management system designed to help you manage and organize competences efficiently.

This repository is divided into two branches:

- `main` branch: Contains the basic functionality for competence management.
- `advanced` branch: Enhances the basic features with more advanced capabilities and features.

## Features

### Basic Branch

The `main` branch provides the following fundamental features:

- **Competence Listing:** View a list of competences.
- **Create, Edit, and Delete:** Easily manage competences.
- **Search Functionality:** Search for competences by name, code, or other attributes.
- **Basic Validation:** Ensure data integrity with basic validation rules.
- **Pagination:** Navigate through a paginated list of competences.

### Advanced Branch

- **design patterns:** create new folder Repositories.
- **Interface Class:** create Interface Class.
- **Create Repository class** Create CompetencesRepositories class implements interface class.

## Getting Started

To install and run the advanced version of Gestion des Competences, please follow these steps:

1. Clone the repository:

```bash
   git clone https://github.com/yourusername/gestion-des-competences.git
```
2. Clone the repository:
```bash
   composer install

```
3. Configure your environment by creating a .env file and setting up your database connection.:

```bash
   cp .env.example .env
```
4. generate key:
```bash
   php artisan key:generate


```
5. Migrate and seed the database with user accounts and competence data:

```bash
   php artisan migrate --seed
```
6. Start the development server::
```bash
   php artisan serve
```

7. Access the application in your browser at http://localhost:8000.

### for advanced code clone Branche advanced. 