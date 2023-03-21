<?php

declare(strict_types=1);

namespace Webplusmultimedia\FileManager\Livewire\FileManager\Actions;

use Illuminate\Support\Facades\Storage;

class DeleteFile extends HasResponseMessageAction
{
    public function handle(string $file): array
    {
        $root = config('filemanager.root').'/'.$file;
        if (Storage::disk('public')->exists($root)) {
            Storage::disk('public')->delete($root);

            return $this->message(__("L'image {$file} a été supprimé"))->success();
        }

        return $this->message(__("L'image {$file} n'a pas  été supprimé"))->error();
    }
}
