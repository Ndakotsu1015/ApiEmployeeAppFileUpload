<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'address' => $this->address,
            'email' => $this->email,
            'phone_number' => $this->phone_number,
            'date_of_birth' => $this->date_of_birth,
            // 'image' => $this->image,
            'image' => filter_var($this->image, FILTER_VALIDATE_URL) ? $this->image : (is_null($this->image) ? null : 'http://localhost:8000/api/employees/file/get/' . $this->image),
            'file' => filter_var($this->file, FILTER_VALIDATE_URL) ? $this->file : (is_null($this->file) ? null : 'http://localhost:8000/api/employees/file/get/' . $this->file),
            // 'file' => $this->file,
            'state_id' => $this->state_id,
            'local_government_id' => $this->local_government_id,
            'marital_status_id' => $this->marital_status_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}