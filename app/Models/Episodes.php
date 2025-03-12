<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Characters;

class Episodes extends Model
{
    public $timestamps = false;

    protected $fillable = ['id', 'name', 'air_date', 'episode',  'url', 'created'];


    public function characters(): BelongsToMany
    {
        return $this->belongsToMany(Characters::class, 'character_episode', 'episode_id', 'character_id');
    }
}
