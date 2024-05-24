<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Counselor;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'fullname',
        'course',
        'year_level',
        'email',
        'contact',
    ];

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }

}
