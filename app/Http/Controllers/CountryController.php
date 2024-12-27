<?php

namespace App\Http\Controllers;

use App\Service\CountryService;
use Illuminate\Support\Facades\Cache;
use Inertia\{
    Inertia,
    Response
};

class CountryController extends Controller
{

    const CACHE_KEY = 'countries';
    const CACHE_TTL = 60 * 60 * 24;

    public function __construct(
        protected CountryService $countryService = new CountryService('https://restcountries.com/v3.1/all')
    )
    {
    }

    public function index(): Response
    {
        $countries = Cache::remember(
            self::CACHE_KEY,
            self::CACHE_TTL,
            function () {
                return $this->countryService->fetch([
                    'fields' => 'name,flags'
                ]);
            }
        );

        return Inertia::render('Countries', [
            'countries' => $countries
        ]);
    }
}
