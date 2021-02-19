<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class score extends JsonResource
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
            'id' => $this->id,
            'player_name' =>$this->player_name,
            'game_name' =>$this->game_name,
            'score' =>$this->score,
            'created_at'=>$this->created_at,
            'updated_at'=>$this->updated_at
        ];
    }
}
