<?php

declare(strict_types=1);

namespace Webplusmultimedia\FileManager\Livewire\FileManager\DTOs;

class FolderDTO
{
    public function __construct(
        public readonly string $id,
        public readonly string $name,
        public readonly null|string $parent = null,
        public readonly bool $open = true
    ) {
    }

    public static function createFromFolderName(?string $folder): FolderDTO
    {
        $root = config('filemanager.root');
        $pathInfo = pathinfo($folder);
        $dirname = isset($pathInfo['dirname'])?$pathInfo['dirname']:null;
        $parent = ($root === $dirname or $dirname === '.') ? null : $dirname;

        return new self(
            id: str($folder)->remove($root.'/')->value(),
            name: $pathInfo['filename'],
            parent: $parent ? str($parent)->remove($root.'/')->value() : null
        );
    }

    public function toArray(): array
    {
        return array($this);
    }
}
