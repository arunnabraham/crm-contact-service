<?php
declare(strict_types=1);

namespace App\Contracts;

interface ContactSourceInterface
{
    public function create(ContactDataInterface $data);
}
