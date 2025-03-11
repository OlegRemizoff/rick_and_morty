<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Characters extends Model
{

    public $timestamps = false;

    protected $fillable = ['id', 'name', 'status', 'species',  'gender', 'image', 'url', 'created', 'location_id'];

    // protected $guarded = [];
}
