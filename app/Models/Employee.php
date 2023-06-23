<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'email',
        'phone_number',
        'date_of_birth',
        'image',
        'file',
        'state_id',
        'local_government_id',
        'marital_status_id',
    ];

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function localGovernment()
    {
        return $this->belongsTo(LocalGovernment::class);
    }

    public function maritalStatus()
    {
        return $this->belongsTo(MaritalStatus::class);
    }

    protected $cast = [
        'state_id' => 'integer',
        'local_government_id' => 'integer',
        'marital_status_id' => 'integer'
    ];
}