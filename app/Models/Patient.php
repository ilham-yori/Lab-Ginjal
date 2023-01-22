<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    
    public function history()
    {
        return $this->hasOne(DetectionHistory::class, "patient_id", "id");
    }
}
