<?php

namespace App\Http\Resources;
use App\Http\Resources\TweetResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class TweetCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */

    public $collects = TweetResource::class;
    public function toArray($request)
    {
        return [
            'data' => $this->collection
        ];
    }
}
