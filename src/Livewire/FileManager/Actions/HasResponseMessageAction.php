<?php

declare(strict_types=1);

namespace Webplusmultimedia\FileManager\Livewire\FileManager\Actions;

abstract class HasResponseMessageAction
{
    protected bool $error = false;

    protected string $message = '';

    protected function message(string $message): static
    {
        $this->message = $message;

        return $this;
    }

    protected function success(null|array $value = null): array
    {
        $this->error = false;
        $result = ['error' => $this->error, 'message' => $this->message];
        if ($value) {
            $result['result'] = $value;
        }

        return $result;
    }

    protected function error(null|array $value = null): array
    {
        $this->error = true;
        $result = ['error' => $this->error, 'message' => $this->message];
        if ($value) {
            $result['result'] = $value;
        }

        return $result;
    }
}
