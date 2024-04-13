<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task_number extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable=['id','admin_id'];
}
