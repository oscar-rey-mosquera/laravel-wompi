<p align="center">
  <img src="https://comunidad.apphive.io/uploads/default/original/2X/4/4e6b2a93f2962dcf06f8683c105cfdd64d3d18b3.png" alt="Logo Laravel Cashier Stripe" width="200px">
</p>

<p align="center">
<a href="https://packagist.org/packages/oscar-rey/laravel-wompi"><img src="https://img.shields.io/packagist/dt/oscar-rey/laravel-wompi" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/oscar-rey/laravel-wompi"><img src="https://img.shields.io/packagist/v/oscar-rey/laravel-wompi" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/oscar-rey/laravel-wompi"><img src="https://img.shields.io/packagist/l/oscar-rey/laravel-wompi" alt="License"></a>
 <a href="https://github.com/oscar-rey-mosquera/laravel-wompi/actions/workflows/test.yml"><img src="https://github.com/oscar-rey-mosquera/laravel-wompi/actions/workflows/test.yml/badge.svg" alt="Test"></a>
</p>

## 馃捇 Instalaci贸n

Para instalar utiliza [composer](https://getcomposer.org/).

```.bash  
composer require oscar-rey/laravel-wompi
```

## 馃敡 Configuraci贸n

```bash
//.env
WOMPI_PUBLIC_KEY=public_key
WOMPI_PRIVATE_KEY=private_key
WOMPI_PRIVATE_EVENT_KEY=private_event
```

## Usa el middleware en tu ruta de webhooks

```php
use LaravelWompi\Http\Middleware\CheckWompiWebHookMiddleware;
 
Route::post('/bancolombia/wompi/webhook', function () {
    //
})->middleware(CheckWompiWebHookMiddleware::class);
```

## Documentaci贸n

Este paquete es una envoltura del paquete wompi-php para laravel por ende la documentaci贸n es totalmente compatible con el uso de este [Wompi-php-documentaci贸n](https://github.com/oscar-rey-mosquera/wompi-php).

## Contribuci贸n

Puedes contribuir agregando nuevas funcionalidades, actualizaciones,聽 refactorizaci贸n de c贸digo y notificando errores, con antelaci贸n se agradece.

## License

[MIT license](LICENSE).
