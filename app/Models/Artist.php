<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    protected $fillable = ['name', 'bio', 'image_path'];

    public function tracks()
    {
        return $this->hasMany(Track::class);
    }

    public function albums()
    {
        return $this->hasMany(Album::class);
    }
}