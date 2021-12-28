<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class grow extends Model
{
    use HasFactory;
    public $address;
    public $nid;
    public $childs = Array();
    protected $table = 'grows';
}
