<?php

declare(strict_types=1);

namespace Webplusmultimedia\FileManager\Livewire\FileManager\Actions;

use Illuminate\Support\Facades\Storage;

class DeleteFolder extends HasResponseMessageAction
{
    public function handle(string $folder): array
    {
        $root = config('filemanager.root').'/'.$folder;
        if (Storage::disk('public')->exists($root) and empty(Storage::disk('public')->files($root)) and empty(Storage::disk('public')->directories($root))) {
            Storage::disk('public')->deleteDirectory($root);

            return $this->message("le répertoire {$folder} a été supprimé")->success();
        }

        return $this->message("Impossible de supprimer le répertoire {$folder}.<br>Ce répertoire n'est pas vide")->error();
    }
}
