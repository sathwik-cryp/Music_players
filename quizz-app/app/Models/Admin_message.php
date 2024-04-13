<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin_message extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable=['a_id','user_id','message'];
}
