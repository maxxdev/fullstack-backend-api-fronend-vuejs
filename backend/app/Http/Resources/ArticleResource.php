<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ArticleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        $array=parent::toArray($request);
        $array['category']=$this->category;

        return $array;
    }

    public function with($request)
    {
        return [
            'category'=>$this->category,
        ];
    }
}
