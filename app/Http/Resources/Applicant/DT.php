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
        $address = explode(' - ', $this->personal['address']['present'] ?? '');

        return [
            $this->tracking_number,
            $this->full_name,
            $address[1] ?? '',
            $address[0] ?? '',
            $this->school['name'],

            '<a target="_new" href="'.route('applicant.show', $this->id).'"> Assess</a>'
        ];
    }
}
