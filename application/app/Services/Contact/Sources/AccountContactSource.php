<?php

namespace App\Services\Contact\Sources;

use App\Contracts\ContactDataInterface;
use App\Contracts\ContactSourceInterface;
use App\Models\Contact;

class AccountContactSource implements ContactSourceInterface
{
    public function create(ContactDataInterface $data)
    {
        return Contact::create([
            'name'     => $data->getName(),
            'email'    => $data->getEmail(),
            'phone'    => $data->getPhone(),
            'source'   => $data->getSource() ?? 'account',
            'company'  => $data->toArray()['company'] ?? null,
            'position' => $data->toArray()['position'] ?? null,
        ]);
    }
}
