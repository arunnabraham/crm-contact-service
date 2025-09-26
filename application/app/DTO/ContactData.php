<?php

namespace App\DTO;

use App\Contracts\ContactDataInterface;

class ContactData implements ContactDataInterface
{
    public function __construct(
        protected string $name,
        protected string $email,
        protected ?string $phone = null,
        protected ?string $source = null,
        protected ?string $company = null,
        protected ?string $position = null,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            $data['name'] ?? '',
            $data['email'] ?? '',
            $data['phone'] ?? null,
            $data['source'] ?? null,
            $data['company'] ?? null,
            $data['position'] ?? null,
        );
    }

    public function getName(): string { return $this->name; }
    public function getEmail(): string { return $this->email; }
    public function getPhone(): ?string { return $this->phone; }
    public function getSource(): ?string { return $this->source; }

    public function toArray(): array
    {
        return [
            'name'     => $this->name,
            'email'    => $this->email,
            'phone'    => $this->phone,
            'source'   => $this->source,
            'company'  => $this->company,
            'position' => $this->position,
        ];
    }
}
