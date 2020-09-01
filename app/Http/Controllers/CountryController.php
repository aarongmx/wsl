<?php

namespace App\Http\Controllers;

use App\Country;

class CountryController extends ApiController
{
    public function __invoke()
    {
        return $this->successResponse(Country::all());
    }
}
