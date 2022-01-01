<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserReview extends Model
{
    protected $fillable = [

        "user_name",
        "review",
        "rate",
        "movie_id"
    ];
}
