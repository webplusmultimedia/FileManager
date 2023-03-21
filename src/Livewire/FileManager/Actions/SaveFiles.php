<?php

declare(strict_types=1);

namespace Webplusmultimedia\FileManager\Livewire\FileManager\Actions;

use Illuminate\Http\UploadedFile;
use Livewire\TemporaryUploadedFile;
use Webplusmultimedia\FileManager\Livewire\FileManager\DTOs\FileDTO;

class SaveFiles extends HasResponseMessageAction
{
    /**
     * @param  TemporaryUploadedFile[]  $files
     * @param  string  $folder
     */
    public function handle(array $files, null|string $folder): array
    {
        $results = [];
        $root = config('filemanager.root').'/'.$folder;
        foreach ($files as $file) {
            $path = $file->storeAs($root, $file->getClientOriginalName(), 'public');
            if($path) {
                $results[] = FileDTO::createFromFile($path);
            }
            $file->delete();
        }

        return $this->message(__('Les images ont été importées'))->success(['files' => $results]);
    }
}
