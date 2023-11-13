<?php

use Illuminate\Support\Facades\Facade;
use Illuminate\Support\ServiceProvider;

return [

    /*
    |--------------------------------------------------------------------------
    | Nom de l'application
    |--------------------------------------------------------------------------
    |
    | Cette valeur est le nom de votre application. Elle est utilisée lorsque
    | le framework doit placer le nom de l'application dans une notification
    | ou tout autre endroit requis par l'application ou ses packages.
    |
    */

    'name' => env('APP_NAME', 'Laravel'),

    /*
    |--------------------------------------------------------------------------
    | Environnement de l'application
    |--------------------------------------------------------------------------
    |
    | Cette valeur détermine l'"environnement" dans lequel votre application
    | s'exécute actuellement. Cela peut déterminer la manière dont vous préférez
    | configurer les différents services utilisés par l'application. Définissez cela dans votre fichier ".env".
    |
    */

    'env' => env('APP_ENV', 'production'),

    /*
    |--------------------------------------------------------------------------
    | Mode de débogage de l'application
    |--------------------------------------------------------------------------
    |
    | Lorsque votre application est en mode débogage, des messages d'erreur détaillés avec
    | des traces de la pile seront affichés pour chaque erreur survenue dans votre
    | application. S'il est désactivé, une simple page d'erreur générique sera affichée.
    |
    */

    'debug' => (bool) env('APP_DEBUG', false),

    /*
    |--------------------------------------------------------------------------
    | URL de l'application
    |--------------------------------------------------------------------------
    |
    | Cette URL est utilisée par la console pour générer correctement les URL lors de l'utilisation
    | de l'outil de ligne de commande Artisan. Vous devriez définir cela à la racine
    | de votre application afin qu'il soit utilisé lors de l'exécution des tâches Artisan.
    |
    */

    'url' => env('APP_URL', 'http://localhost'),

    'asset_url' => env('ASSET_URL'),

    /*
    |--------------------------------------------------------------------------
    | Fuseau horaire de l'application
    |--------------------------------------------------------------------------
    |
    | Ici, vous pouvez spécifier le fuseau horaire par défaut pour votre application, qui
    | sera utilisé par les fonctions de date et d'heure de PHP. Nous avons pris
    | l'initiative de définir cela sur une valeur par défaut sensée.
    |
    */

    'timezone' => 'UTC',

    /*
    |--------------------------------------------------------------------------
    | Configuration de la langue par défaut de l'application
    |--------------------------------------------------------------------------
    |
    | La langue de l'application détermine la langue par défaut qui sera utilisée
    | par le fournisseur de services de traduction. Vous êtes libre de définir cette valeur
    | sur l'une des langues qui seront prises en charge par l'application.
    |
    */

    'locale' => 'fr',
    'languages' => [
        'fr' => 'french',
        'en' => 'English'
    ],

    /*
    |--------------------------------------------------------------------------
    | Langue de secours de l'application
    |--------------------------------------------------------------------------
    |
    | La langue de secours détermine la langue à utiliser lorsque celle en cours
    | n'est pas disponible. Vous pouvez changer la valeur pour correspondre à l'un des
    | dossiers de langues fournis par votre application.
    |
    */

    'fallback_locale' => 'fr',

    /*
    |--------------------------------------------------------------------------
    | Langue Faker
    |--------------------------------------------------------------------------
    |
    | Cette langue sera utilisée par la bibliothèque Faker PHP lors de la génération de données
    | factices pour vos graines de base de données. Par exemple, cela sera utilisé pour obtenir
    | des numéros de téléphone localisés, des informations d'adresse et plus encore.
    |
    */

    'faker_locale' => 'fr_FR',

    /*
    |--------------------------------------------------------------------------
    | Clé d'encryption
    |--------------------------------------------------------------------------
    |
    | Cette clé est utilisée par le service de chiffrement Illuminate et doit être définie
    | sur une chaîne aléatoire de 32 caractères, sinon ces chaînes chiffrées
    | ne seront pas sécurisées. Merci de faire cela avant de déployer une application !
    |
    */

    'key' => env('APP_KEY'),

    'cipher' => 'AES-256-CBC',

    /*
    |--------------------------------------------------------------------------
    | Pilote du mode de maintenance
    |--------------------------------------------------------------------------
    |
    | Ces options de configuration déterminent le pilote utilisé pour déterminer et
    | gérer le statut de "mode de maintenance" de Laravel. Le pilote "cache" permettra
    | de contrôler le mode de maintenance sur plusieurs machines.
    |
    | Pilotes pris en charge : "file", "cache"
    |
    */

    'maintenance' => [
        'driver' => 'file',
        // 'store' => 'redis',
    ],

    /*
    |--------------------------------------------------------------------------
    | Fournisseurs de services préchargés
    |--------------------------------------------------------------------------
    |
    | Les fournisseurs de services énumérés ici seront automatiquement chargés lors de la
    | demande vers votre application. N'hésitez pas à ajouter vos propres services à
    | cette liste pour accorder des fonctionnalités étendues à vos applications.
    |
    */

    'providers' => ServiceProvider::defaultProviders()->merge([
        /*
         * Fournisseurs de services de packages...
         */

        /*
         * Fournisseurs de services d'application...
         */
        App\Providers\AppServiceProvider::class,
        App\Providers\AuthServiceProvider::class,
        // App\Providers\BroadcastServiceProvider::class,
        App\Providers\EventServiceProvider::class,
        App\Providers\RouteServiceProvider::class,
    ])->toArray(),

    /*
    |--------------------------------------------------------------------------
    | Aliases de classe
    |--------------------------------------------------------------------------
    |
    | Cet tableau d'alias de classe sera enregistré lorsque cette application
    | est démarrée. Cependant, n'hésitez pas à enregistrer autant que vous le souhaitez
    | car les alias sont chargés "à la demande" afin de ne pas nuire aux performances.
    |
    */

    'aliases' => Facade::defaultAliases()->merge([
        // 'Example' => App\Facades\Example::class,
    ])->toArray(),

];
