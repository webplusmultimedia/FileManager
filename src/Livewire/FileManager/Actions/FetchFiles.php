<?php

 declare(strict_types=1);

namespace Webplusmultimedia\FileManager\Livewire\FileManager\Actions;

 use Illuminate\Support\Facades\Storage;
 use Webplusmultimedia\FileManager\Livewire\FileManager\DTOs\FileDTO;

 class FetchFiles
 {
     public function handle(null|string $folder): array
     {
         $root = config('filemanager.root').'/'.$folder;
         if ($files = Storage::disk('public')->files($root)) {
             return $this->transform($files);
         }

         return [];
     }

     private function transform(array $files): array
     {
         $results = [];
         foreach ($files as $file) {
             $results[] = FileDTO::createFromFile($file);
         }

         return  $results;
     }
 }
