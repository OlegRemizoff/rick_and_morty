<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Episodes;
use App\Models\Locations;

class Characters extends Model
{

    public $timestamps = false;

    protected $fillable = ['id', 'name', 'status', 'species',  'gender', 'image', 'url', 'created', 'location_id'];

    // protected $guarded = [];


    public function episodes(): BelongsToMany
    {
        return $this->belongsToMany(Episodes::class, 'character_episode', 'character_id', 'episode_id');
    }

    public function location(): BelongsTo
    {
        return $this->belongsTo(Locations::class);
    } 

}
