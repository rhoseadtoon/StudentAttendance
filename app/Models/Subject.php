<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'description', 'teacher',
    ];

    public function students()
    {
        return $this->belongsToMany(Student::class, 'subject_student', 'subject_id', 'student_id');
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }
}
