<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AttendanceResource extends JsonResource
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
            'id' => $this->id,
            'patient_id' => $this->patient_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'temperature' => $this->temperature,
            'respiratory_rate' => $this->respiratory_rate,
            'pulse' => $this->pulse,
            'diastolic_pressure' => $this->diastolic_pressure,
            'systolic_pressure' => $this->systolic_pressure,
            'symptoms' => $this->symptoms,
        ];
    }
}
