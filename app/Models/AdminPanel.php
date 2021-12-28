<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class AdminPanel extends Authenticatable
{
    use HasFactory;
    protected $table = 'admin_panels';
    public $fillable = [
        'name', 'dept', 'email', 'contact',
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];


    public function meetings()
    {
        return $this->hasMany(Meeting::class);
    }
}
