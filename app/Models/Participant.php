<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    use HasFactory;
    public $fillable = [
        'meeting_id', 'teacher_id'
    ];

    public function teacher()
    {
        return $this->belongsTo(AdminPanel::class);
    }
    public function meeting()
    {
        return $this->belongsTo(Meeting::class);
    }
}
