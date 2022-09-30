<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Attendance extends Model
{
    use HasFactory;

    protected $table = 'attendances';

    protected $fillable = [
       'patient_id',
       'temperature',
       'systolic_pressure',
       'diastolic_pressure',
       'pulse',
       'respiratory_rate',
    ];

    public function patient(): HasOne
    {
        return $this->hasOne(Patient::class);
    }

    public function symptoms(): BelongsToMany
    {
        return $this->belongsToMany(Symptom::class);
    }
}
