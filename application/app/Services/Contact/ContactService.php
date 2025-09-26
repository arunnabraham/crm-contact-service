<?php
// app/Services/Contact/ContactService.php

namespace App\Services\Contact;

use App\Contracts\ContactDataInterface;
use App\Contracts\ContactSourceInterface;
use InvalidArgumentException;

class ContactService
{
    /** @var array<string, ContactSourceInterface> */
    protected array $sources = [];

    public function registerSource(string $key, ContactSourceInterface $source): void
    {
        $this->sources[$key] = $source;
    }

    public function createFromSource(string $sourceKey, ContactDataInterface $data): ContactSourceInterface
    {
        if (!isset($this->sources[$sourceKey])) {
            throw new InvalidArgumentException("Unsupported source: {$sourceKey}");
        }
        return $this->sources[$sourceKey]->create($data);
    }
}

