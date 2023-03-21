<?php

declare(strict_types=1);

namespace Webplusmultimedia\FileManager\Livewire\FileManager;

use Livewire\Component;
use Livewire\TemporaryUploadedFile;
use Livewire\WithFileUploads;
use Webplusmultimedia\FileManager\Livewire\FileManager\Actions\CreateFolderAction;
use Webplusmultimedia\FileManager\Livewire\FileManager\Actions\DeleteFile;
use Webplusmultimedia\FileManager\Livewire\FileManager\Actions\DeleteFolder;
use Webplusmultimedia\FileManager\Livewire\FileManager\Actions\FetchFiles;
use Webplusmultimedia\FileManager\Livewire\FileManager\Actions\FetchFolders;
use Webplusmultimedia\FileManager\Livewire\FileManager\Actions\SaveFiles;

class Uploader extends Component
{
    use WithFileUploads;
    /**
     * @var array<int,TemporaryUploadedFile> $photos
     */
    public  $photos;

    protected array $rules = [
        'photos.*' => 'file|mimes:pdf,docx,doc,xlsx,xls,jpg,png|max:4096',
    ];

    /**
     * @param TemporaryUploadedFile $value
     *
     * @return void
     */
    public function updatedPhotos($value): void
    {
        $this->validateOnly('photos');
    }

    public function getFolders(string $parent): array
    {
        return (new FetchFolders())->handle($parent);
    }

    public function createFolder(string $name, null|string $parent = null): array
    {
        return (new CreateFolderAction())->handle($name, $parent);
    }

    public function deleteFolder(string $folder): array
    {
        return (new DeleteFolder())->handle($folder);
    }

    public function getFiles(null|string $folder = null): array
    {
        return (new FetchFiles())->handle($folder);
    }

    public function saveFiles(null|string $folder): array
    {
        $this->validate();

        return (new SaveFiles())->handle($this->photos, $folder);
    }

    public function deleteFile(string $file): array
    {
        return (new DeleteFile())->handle($file);
    }

    public function render(FetchFolders $fetch): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('filemanager::components.livewire.file-manager.uploader', ['folders' => $fetch->handle()]);
    }
}
