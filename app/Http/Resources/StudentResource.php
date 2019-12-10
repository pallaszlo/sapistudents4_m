<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StudentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);

        return [
            'data'=>[
                'id'=> $this->id,
                'program_id'=>$this->program_id,
                'name' => $this->name,
                'email' => $this->email,
                'status' => $this->status,
            ],
        ]; 
    }
}
