<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $fillable=['question_id','question','option1','option2','option3','option4','correct_option','task_num','time_alloted'];
    public $timestamps=false;

    
}
