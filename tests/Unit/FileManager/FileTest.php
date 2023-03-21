<?php

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use function Pest\Livewire\livewire;
use Webplusmultimedia\FileManager\Livewire\FileManager\Uploader;

beforeEach(function () {
    Storage::fake('public');
    $this->file = UploadedFile::fake()->image('avatar.png');
    $this->file2 = UploadedFile::fake()->image('avatar2.png');
});

it('should return list of images on get files', function () {
    livewire(Uploader::class)
        ->set('photos', [$this->file, $this->file2])
        ->call('saveFiles')
        ->assertOk();
    livewire(Uploader::class)
        ->set('photos', [$this->file, $this->file2])
        ->call('getFiles')
        ->assertOk();
    Storage::disk('public')->assertExists('medias/avatar.png');
    Storage::disk('public')->assertExists('medias/avatar2.png');
});

it('should return list of images on saving files', function () {
    livewire(Uploader::class)
        ->set('photos', [$this->file, $this->file2])
        ->call('saveFiles')
        ->assertOk();

    Storage::disk('public')->assertExists('medias/avatar.png');
    Storage::disk('public')->assertExists('medias/avatar2.png');
});

it('should return no files on delete a file', function () {
    livewire(Uploader::class)
        ->set('photos', [$this->file, $this->file2])
        ->call('saveFiles')
        ->assertOk();
    livewire(Uploader::class)
        ->call('deleteFile', 'avatar.png')
        ->assertOk();

    Storage::disk('public')->assertMissing('medias/avatar.png');
    Storage::disk('public')->assertExists('medias/avatar2.png');
});
