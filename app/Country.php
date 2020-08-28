<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = [
        'name',
        'alpha_2',
        'alpha_3',
        'country_code'
    ];

    public function ports() {
        return $this->hasMany(Port::class);
    }
}
