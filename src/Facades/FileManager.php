<?php

namespace Webplusmultimedia\FileManager\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Webplusmultimedia\FileManager\FileManager
 */
class FileManager extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Webplusmultimedia\FileManager\FileManager::class;
    }
}
