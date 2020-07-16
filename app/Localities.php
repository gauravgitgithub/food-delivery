<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Localities extends Model
{
    protected $fillable = [
        'state_id', 'city_id', 'principal_subdivision', 'principal_subdivision_code','latitude','longitude','pluscode','name'
    ];
}
