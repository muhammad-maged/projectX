<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MovieResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            "id"             => $this->id,
            "name"           => $this->name,
            "director"       => $this->director,
            "cast"           => $this->cast,
            "release_date"   => $this->release_date,
            "reviews"        => $this->userReviews
        ];
    }
}
