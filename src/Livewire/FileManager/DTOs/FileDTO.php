<?php

declare(strict_types=1);

namespace Webplusmultimedia\FileManager\Livewire\FileManager\DTOs;

use Illuminate\Support\Facades\Storage;

class FileDTO
{
    public function __construct(
        public readonly string $name,
        public readonly string $filename,
        public readonly string $url,
        public readonly int    $size,
    )
    {
    }

    public static function createFromFile(string $file): FileDTO
    {
        $fileInfos = pathinfo($file);
        $extension = isset($fileInfos['extension']) ? $fileInfos['extension'] : NULL;
        $filename = $fileInfos['filename'] . '.' . $extension;

        return new self(name: $fileInfos['filename'], filename: $filename, url: Storage::disk('public')->url($file), size: Storage::disk('public')->size($file));
    }
}
