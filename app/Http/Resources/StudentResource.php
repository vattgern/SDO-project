<?php

namespace App\Http\Resources;

use App\Models\Users\User;
use Illuminate\Http\Resources\Json\JsonResource;

class StudentResource extends JsonResource
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
          'name' => $this->name,
          'student_cart' => $this->student_cart,
          'middle_name' => $this->middle_name,
          'last_name' => $this->last_name,
          'user_data' => $this->user,
          'parents' => $this->parents
        ];
    }

}
