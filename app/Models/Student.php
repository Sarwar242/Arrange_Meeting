<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    public $fillable = [
        'name', 'roll', 'email', 'address', 'session', 'department_id', 'batch_id'
    ];


    public function department()
    {
        return $this->belongsTo(Department::class);
    }
    public function batch()
    {
        return $this->belongsTo(Batch::class);
    }

    public function attendances()
    {
        return $this->belongsToMany(Attendance::class,  'student_attendance', 'attendance_id', 'student_id');
    }
}
