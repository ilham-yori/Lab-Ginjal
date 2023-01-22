<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetectionHistory extends Model
{
    use HasFactory;

    protected $table = "detection_history";

    public function employee()
    {
        return $this->belongsTo(Employee::class, "doctor_id", "id");
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class, "patient_id", "id");
    }
}
