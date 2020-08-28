<?php

namespace App\Http\Controllers;

use App\Country;

class CountryController extends Controller
{
    public function __invoke()
    {
        return Country::paginate();
    }
}
