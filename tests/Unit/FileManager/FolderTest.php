<?php

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use function Pest\Livewire\livewire;
use Webplusmultimedia\FileManager\Livewire\FileManager\Uploader;

beforeEach(function () {
    Storage::fake('public');
    $this->folder = 'folder 1';
    $this->folder2 = 'folder 2';
    $this->file = UploadedFile::fake()->image('avatar.png');
    $this->file2 = UploadedFile::fake()->image('avatar2.png');
    $folder2 = $this->folder.'/'.$this->folder2;
    livewire(Uploader::class)
        ->call('createFolder', $this->folder);
    livewire(Uploader::class)
        ->call('createFolder', $this->folder2, $this->folder);
    livewire(Uploader::class)
        ->call('createFolder', $this->folder, $folder2);
});

it('should return list of folders on get folders', function () {
    $folder2 = $this->folder.'/'.$this->folder2;
    livewire(Uploader::class)
        ->call('getFolders', $folder2)
        ->assertOk()
        ->assertJsonFragment([
            'id' => 'folder 1/folder 2/folder 1',
            'name' => 'folder 1',
            'parent' => 'folder 1/folder 2',
            'open' => true,
        ]);
    livewire(Uploader::class)
        ->call('getFolders', $this->folder)
        ->assertOk()
        ->assertJsonFragment([
            'id' => 'folder 1/folder 2',
            'name' => 'folder 2',
            'parent' => 'folder 1',
            'open' => true,
        ]);
});

it('should return the folder on creating', function () {
    livewire(Uploader::class)
        ->call('createFolder', 'folder 3', $this->folder)
        ->assertOk()
        ->assertJsonFragment([
            'id' => 'folder 1/folder 3',
            'name' => 'folder 3',
            'parent' => 'folder 1',
            'open' => true,
        ]);
});

it('should return no folder on creating on an inexistant folder parent', function () {
    livewire(Uploader::class)
        ->call('createFolder', 'folder 3', 'xxxxx')
        ->assertOk()
        ->assertJsonMissingPath('result');
});

it('should return no folder on delete all folders', function () {
    $folder2 = $this->folder.'/'.$this->folder2;
    livewire(Uploader::class)
        ->call('deleteFolder', 'folder 1/folder 2/folder 1')
        ->assertOk();
    livewire(Uploader::class)
        ->call('getFolders', $folder2)
        ->assertOk()
        ->assertJsonMissingPath('result');
});
