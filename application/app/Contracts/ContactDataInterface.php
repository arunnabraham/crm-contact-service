<?php
declare(strict_types=1);

namespace App\Contracts;

interface ContactDataInterface
{
    public function getName(): string;
    public function getEmail(): string;
    public function getPhone(): ?string;
    public function getSource(): ?string;
    public function toArray(): array;
}
