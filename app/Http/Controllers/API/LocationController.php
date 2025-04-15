<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Country;
use App\Models\State;
use Illuminate\Support\Facades\Cache;

class LocationController extends Controller
{
    public function countries()
    {
        $countries = Cache::rememberForever('countries_list', function () {
            return Country::select('id', 'name')->orderBy('name')->get();
        });

        return response()->json($countries);
    }

    public function states($countryId)
    {
        $cacheKey = "states_by_country_{$countryId}";
        $states = Cache::rememberForever($cacheKey, function () use ($countryId) {
            return State::where('country_id', $countryId)->select('id', 'name')->orderBy('name')->get();
        });

        return response()->json($states);
    }

    public function cities($stateId)
    {
        $cacheKey = "cities_by_state_{$stateId}";
        $cities = Cache::rememberForever($cacheKey, function () use ($stateId) {
            return City::where('state_id', $stateId)->select('id', 'name')->orderBy('name')->get();
        });

        return response()->json($cities);
    }
}
