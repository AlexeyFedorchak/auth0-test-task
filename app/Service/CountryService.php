<?php

namespace App\Service;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;

class CountryService extends Service
{
    public function __construct(string $apiUrl)
    {
        parent::__construct($apiUrl);
    }

    public function fetch(array $queryParams = []): Collection
    {
        try {
            $response = Http::get($this->apiUrl, $queryParams);
            if ($response->successful()) {
                return collect($response->json())->map(function ($country) {
                    return [
                        'name' => $country['name']['common'] ?? 'Unknown',
                        'flag' => $country['flags']['png'] ?? null
                    ];
                });
            }
        } catch (\Exception $e) {
            return collect([]);
        }
        return collect([]);
    }
}
