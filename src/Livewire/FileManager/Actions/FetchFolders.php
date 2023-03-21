<?php

declare(strict_types=1);

namespace Webplusmultimedia\FileManager\Livewire\FileManager\Actions;

use Illuminate\Support\Facades\Storage;
use Webplusmultimedia\FileManager\Livewire\FileManager\DTOs\FolderDTO;

class FetchFolders
{
    public function handle(null|string $parent = null): array
    {
        $root = config('filemanager.root').'/'.$parent;
        if ($folders = Storage::disk('public')->directories($root)) {
            return $this->allFolders($folders);
        }

        return [];
    }

    private function allFolders(array $folders): array
    {
        $result = [];
        foreach ($folders as $folder) {
            $result[] = FolderDTO::createFromFolderName($folder);
        }

        return $result;
    }
}
