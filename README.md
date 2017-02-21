## Installation

1. Require the package using composer:

    ```
    composer require jeroennoten/laravel-menu
    ```

2. Add the service provider to the `providers` in `config/app.php`:

    ```php
    JeroenNoten\LaravelMenu\ServiceProvider::class,
    ```

## Usage

```
@include('menu::links')
```
```
@include('menu::list_items')
```