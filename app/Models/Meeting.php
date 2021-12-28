<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    use HasFactory;
    public $fillable = [
        'host_id', 'start', 'end', 'day', 'status', 'active'
    ];

    public function host()
    {
        return $this->belongsTo(AdminPanel::class);
    }
    public function participants()
    {
        return $this->hasMany(Participant::class);
    }
}
