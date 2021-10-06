<?php

namespace App\Http\Resources\Applicant;

use Illuminate\Http\Resources\Json\JsonResource;

class DT extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            $this->tracking_number,
            $this->full_name,
            $this->personal['address']['permanent'],
            $this->school['name'],

            '<a target="_new" href="'.route('applicant.show', $this->id).'"> Assess</a>'
        ];
    }
}
