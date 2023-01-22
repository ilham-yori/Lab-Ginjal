<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $table = "hospital_employees";

    public function roles()
    {
        return $this->belongsTo(Role::class, "role_id", "id");
    }

    public function user()
    {
        return $this->belongsTo(User::class, "user_id", "id");
    }

    public function history()
    {
        return $this->hasMany(DetectionHistory::class, "doctor_id", "id");
    }
}
