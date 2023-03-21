<?php

namespace Webplusmultimedia\FileManager\Tests;

use Illuminate\Database\Eloquent\Factories\Factory;
use Livewire\LivewireServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;
use Webplusmultimedia\FileManager\FileManagerServiceProvider;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        /*Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'Webplusmultimedia\\FileManager\\Database\\Factories\\'.class_basename($modelName).'Factory'
        );*/
    }

    protected function getPackageProviders($app): array
    {
        return [
            LivewireServiceProvider::class,
            FileManagerServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app): void
    {
        config()->set('database.default', 'testing');

        /*
        $migration = include __DIR__.'/../database/migrations/create_filemanager_table.php.stub';
        $migration->up();
        */
    }
}
