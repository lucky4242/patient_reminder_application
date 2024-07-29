<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reminder extends Model
{
    protected $fillable = [
        'patient_name',
        'patient_phone',
        'email',
        'drug_name',
        'dosage',
        'frequency',
        'reminder_time',
        'status',
    ];
}
