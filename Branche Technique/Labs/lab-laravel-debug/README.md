# Lab debug laravel

## Reference 
- https://dev.to/snakepy/how-to-debug-laravel-apps-with-laravel-apps-with-xdebuger-in-vs-code-8cp

## Travail a faire

Calcule la somme de deux nombres et faire debug de function de la somme 

## Critère de validation

- Installation xdebug
- Utilisation vscode
- Créer un controller CalculeController et appliquer la logique de calcule

## Installation

- Install XDebug sur vscode

```bash
# Config php.ini

[XDEBUG]
zend_extension="C:\php-8.2.24\ext\php_xdebug.dll"
xdebug.mode=debug
xdebug.client_host = 127.0.0.1
xdebug.client_port = 9003

xdebug.start_with_request = yes
```

- Creer launch.json file 

```bash

{
    // Use IntelliSense to learn about possible attributes.
    // Hover to view descriptions of existing attributes.
    // For more information, visit: https://go.microsoft.com/fwlink/?linkid=830387
    "version": "0.2.0",
    "configurations": [
        {
            "name": "Launch built-in server and debug",
            "type": "php",
            "request": "launch",
            "runtimeArgs": [
                "-S",
                "localhost:8000",
                "-t",
                "."
            ],
            "port": 9003,
            "serverReadyAction": {
                "action": "openExternally"
            }
        },
        {
            "name": "Debug current script in console",
            "type": "php",
            "request": "launch",
            "program": "${file}",
            "cwd": "${fileDirname}",
            "externalConsole": false,
            "port": 9003
        },
        {
            "name": "Listen for Xdebug",
            "type": "php",
            "request": "launch",
            "port": 9003
        }
    ]
}
```
## Commande

```bash
composer create-project laravel/laravel calcule
```

```bash
php artisan make:controller CalculeController
```

```bash
php artisan serve
```
