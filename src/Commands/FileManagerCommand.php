<?php

namespace Webplusmultimedia\FileManager\Commands;

use Illuminate\Console\Command;

class FileManagerCommand extends Command
{
    public $signature = 'filemanager';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
