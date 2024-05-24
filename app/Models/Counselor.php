<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Counselor extends Model
{
    use HasFactory;

    protected $fillable = [
        'fullname',
        'contact',
        'specialty',
    ];

    public function student()
    {
        return $this->hasMany(Student::class);
    }

        public function appointment()
    {
        return $this->hasMany(Appointment::class);
    }

}
