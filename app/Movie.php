<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $fillable = [

        "name",
        "director",
        "release_date",
        "cast",
    ];

    protected $casts = [
        'cast' => 'array'
    ];

    protected $hidden = [

        'updated_at'
    ];

    public function userReviews()
    {
        return $this->hasMany(UserReview::class);
    }
}
