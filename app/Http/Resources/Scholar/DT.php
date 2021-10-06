<?php

namespace App\Http\Resources\Scholar;

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
            $this->applicant->tracking_number,
            $this->applicant->full_name,
            $this->applicant->personal['address']['present'] ?? '',
            $this->applicant->school['name'] ?? '',

            '<a target="_new" href="'.route('applicant.show', $this->applicant->id).'"> View</a>'
        ];
    }
}
