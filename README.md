## Installation

1. Require the package using composer:

    ```
    composer require jeroennoten/laravel-menu
    ```

2. Add the service provider to the `providers` in `config/app.php`:

    ```php
    JeroenNoten\LaravelMenu\ServiceProvider::class,
    ```
    
3. Publish the migrations:

    ```
    php artisan vendor:publish --tag=menu-migrations
    ```
## Usage

```
@include('menu::links')
```
```
@include('menu::list_items')
```