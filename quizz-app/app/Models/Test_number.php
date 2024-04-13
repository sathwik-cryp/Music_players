<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test_number extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable=['test_no','id','userr_id'];
}
