<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentAttendance extends Model
{
    use HasFactory;
    protected $table = 'student_attendance';
    protected $fillable = ['student_id','attendance_id', 'present'];

    public function student(){
        return $this->belongsTo(Student::class);
    }
    public function attendance(){
        return $this->belongsTo(Attendance::class);
    }
}
