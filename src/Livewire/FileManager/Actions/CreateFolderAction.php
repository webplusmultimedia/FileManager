<?php

declare(strict_types=1);

namespace Webplusmultimedia\FileManager\Livewire\FileManager\Actions;

use Illuminate\Support\Facades\Storage;
use Webplusmultimedia\FileManager\Livewire\FileManager\DTOs\FolderDTO;

class CreateFolderAction extends HasResponseMessageAction
{
    public function handle(string $name, null|string $parent): array
    {
        $dir = $parent ? $parent.'/'.$name : $name;
        $root = config('filemanager.root').'/'.$dir;

        if (! Storage::disk('public')->exists($root)) {
            Storage::disk('public')->makeDirectory($root);

            return $this->message(__("Le répertoire {$name} a été crée"))->success(FolderDTO::createFromFolderName($dir)->toArray());
        }

        return $this->message(__("Le répertoire {$name} existe ({$root})"))->error();
    }
}
