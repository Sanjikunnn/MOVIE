<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    protected $fillable = [
        'user_id',
        'imdb_id',
        'movie_data',
    ];

    protected $casts = [
        'movie_data' => 'array', // Biar bisa langsung dipakai sebagai array/object
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
