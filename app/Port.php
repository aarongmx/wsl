<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Port extends Model
{

    protected $fillable = [
        'code',
        'name',
        'active',
        'country_id',
    ];

    public function country() {
        return $this->belongsTo(Country::class);
    }
}
