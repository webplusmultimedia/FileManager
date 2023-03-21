# Manage files with this file manager made with alpinejs and livewire and tailwindcss

[![Latest Version on Packagist](https://img.shields.io/packagist/v/webplusmultimedia/filemanager.svg?style=flat-square)](https://packagist.org/packages/webplusmultimedia/filemanager)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/webplusmultimedia/filemanager/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/webplusmultimedia/filemanager/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/webplusmultimedia/filemanager/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/webplusmultimedia/filemanager/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/webplusmultimedia/filemanager.svg?style=flat-square)](https://packagist.org/packages/webplusmultimedia/filemanager)

Want to manage your files and directories in a file manager?

This one is for you. Here is the file manager made with alpineJs, Livewire and Tailwind CSS for Laravel.

This is a simple one, just adding files and directories to a root directory(default is medias) in your public storage path. You can change it in the filemanager config file.

[![img.png](https://i.postimg.cc/XvQ1M2gt/img.png)](https://postimg.cc/v1xtftkv)

## Installation

You can install the package via composer:

```bash
composer require webplusmultimedia/filemanager
```

You can publish the config file and change the root :

```bash
php artisan vendor:publish --tag="filemanager-config"
```

This is the contents of the published config file:

```php
return [
    'root' => 'medias',
];
```

Optionally, you can publish the views using, but not recommend cause failing at an future update

```bash
php artisan vendor:publish --tag="filemanager-views"
```

## Usage
For simple use in a blade view :
```html
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" aria->
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 ">
                <h1 class="text-2xl uppercase font-bold mb-6">{{ __("Téléversement de fichiers") }}</h1>
                <!-- the livewire component -->
                <livewire:filemanager/>
            </div>
        </div>
    </div>
</div>
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Webplusm Multimedia](https://github.com/webplusmultimedia)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
