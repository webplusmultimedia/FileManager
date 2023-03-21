<?php

namespace Webplusmultimedia\FileManager;

use Livewire\Livewire;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Webplusmultimedia\FileManager\Livewire\FileManager\Uploader;

class FileManagerServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('filemanager')
            ->hasConfigFile()
            ->hasAssets()
            ->hasViews();
    }
    public function packageBooted()
    {
         Livewire::component('filemanager',Uploader::class);
    }
}
