<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\ListEmployeeResource;

class ListTimeKeepingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return[
            'ma_employee' => $this->ma_employee,
            // 'full_name' => ListEmployeeResource::collection($this->whenLoaded('ma_employee')),
            // 'full_name' => new ListEmployeeResource($this->full_name),
            'full_name' => $this->full_name,
            'total_time' => $this->total_time,
            'month' => $this->month,
            'year' => $this->year,
            'rank' => $this->rank,
        ];
    }
}
