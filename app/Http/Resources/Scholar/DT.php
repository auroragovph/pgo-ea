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
        $address = explode(' - ', $this->applicant->personal['address']['present'] ?? '');

        return [
            $this->applicant->tracking_number,
            $this->applicant->full_name,
            $address[1] ?? '',
            $address[0] ?? '',
            $this->applicant->school['name'] ?? '',

            '<a target="_new" href="'.route('applicant.show', $this->applicant->id).'"> View</a>'
        ];
    }
}
