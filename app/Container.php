<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Container extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'description',
        'comments',
        'large',
        'width',
        'height',
        'volume',
        'weight',
        'max_weight',
        'teus',
        'active'
    ];
}
