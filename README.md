# laravel-pay-here

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

ApiChef PayHere provides an expressive, fluent interface to PayHere’s billing services.

## Installation

You can install the package via composer:

```bash
composer require apichef/laravel-pay-here
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --provider="ApiChef\PayHere\PayHereServiceProvider" --tag="migrations"
php artisan migrate
```

You can publish the config file with:
```bash
php artisan vendor:publish --provider="ApiChef\PayHere\PayHereServiceProvider" --tag="config"
```

This is the contents of the published config file:

```php
return [
    /*
    |--------------------------------------------------------------------------
    | Base Url
    |--------------------------------------------------------------------------
    |
    | This is where you can configure PayHere base url, based the application
    | environment. On production, the value should set to https://payhere.lk/    
    |
    */
    
    'base_url' => env('PAY_HERE_BASE_URL', 'https://sandbox.payhere.lk/'),
    
    /*
    |--------------------------------------------------------------------------
    | Merchant Credentials
    |--------------------------------------------------------------------------
    |
    | Merchant ID is issued per account by PayHere, You can copy it from your
    | PayHere settings page in the Domains & Credentials tab.
    |
    | To obtain a merchant secret, you need to add a domain to allowed
    | domains/apps.
    |
    | https://payhere.lk/api-&-mobile-sdk/payhere-checkout#prerequisites
    |
    */
    
    'merchant_credentials' => [
       'id' => env('PAY_HERE_MERCHANT_ID'),
       'secret' => env('PAY_HERE_MERCHANT_SECRET'),
    ],
    
    /*
    |--------------------------------------------------------------------------
    | Business App Credentials
    |--------------------------------------------------------------------------
    |
    | You must create a business application to call PayHere services. Visit
    | the link bellow and follow the instruction to obtain business app id
    | and a secret.
    |
    | NOTE: Tick the permission 'Payment Retrieval API'
    |
    | https://payhere.lk/api-&-mobile-sdk/payhere-retrieval#1-create-a-business-app
    |
    */
    
    'business_app_credentials' => [
       'id' => env('PAY_HERE_BUSINESS_APP_ID'),
       'secret' => env('PAY_HERE_BUSINESS_APP_SECRET'),
    ],
    
    /*
    |--------------------------------------------------------------------------
    | Response Route Names
    |--------------------------------------------------------------------------
    |
    | This is where you can config which route to redirect on checkout
    | success or canceled.
    |
    | PayHere package will call the route with payment id, so you can bind the
    | payment model to the route.
    |
    | e.g.
    | Route::get('payment-success/{payment}', 'PaymentController@success')
    |   ->name('payment_success');
    |
    | Route::get('payment_canceled/{payment}', 'PaymentController@cancel')
    |   ->name('payment_canceled');
    |
    | NOTE: Updating the payment status is being handled by the PayHere package,
    | you will have to perform the necessary changes to your data, such as
    | updating the inventory, enrolling to the sold item.
    |
    */
    
    'routes_name' => [
       'payment_success' => 'payment_success',
       'payment_canceled' => 'payment_canceled',
    ],
    
    /*
    |--------------------------------------------------------------------------
    | PayHere Database Connection
    |--------------------------------------------------------------------------
    |
    | This is the database connection you want PayHere to use while storing &
    | reading your payment data. By default PayHere assumes you use your
    | default connection. However, you can change that to anything you want.
    |
    */
    
    'database_connection' => env('DB_CONNECTION'),
    
    /*
    |--------------------------------------------------------------------------
    | PayHere Middleware
    |--------------------------------------------------------------------------
    |
    | This is the middleware group that PayHere payment notification webhook
    | and redirect on success/canceled routes uses.
    |
    */
    
    'middleware' => env('PAY_HERE_MIDDLEWARE', []),
];
```

## Usage

``` php
soon. still alpha
```

## Testing

``` bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover any security related issues, please email milroy@outlook.com instead of using the issue tracker.

## Credits

- [Milroy E. Fraser](https://github.com/milroyfraser)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/apichef/laravel-pay-here.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/apichef/laravel-pay-here/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/apichef/laravel-pay-here.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/apichef/laravel-pay-here.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/apichef/laravel-pay-here.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/apichef/laravel-pay-here
[link-travis]: https://travis-ci.org/apichef/laravel-pay-here
[link-scrutinizer]: https://scrutinizer-ci.com/g/apichef/laravel-pay-here/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/apichef/laravel-pay-here
[link-downloads]: https://packagist.org/packages/apichef/laravel-pay-here
[link-author]: https://github.com/milroyfraser
[link-contributors]: ../../contributors
