<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'students_id', 'counselors_id', 'appointment_date', 'appointment_status', 'cancellation_info', 'comment',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class, 'students_id');
    }

    public function counselor()
    {
        return $this->belongsTo(Counselor::class, 'counselors_id');
    }

}
