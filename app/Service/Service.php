<?php

namespace App\Service;

use Illuminate\Support\Collection;

abstract class Service
{
    protected string $apiUrl;

    public function __construct($apiUrl)
    {
        $this->apiUrl = $apiUrl;
    }

    abstract public function fetch(array $queryParams = []): Collection;
}
