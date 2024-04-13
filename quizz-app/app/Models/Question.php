<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    
    use HasFactory;
    protected $fillable=['question','option1','option2','option3','option4','correct_option','time_alloted'];
    public $timestamps=false;

   public function tasks()
{
    return $this->belongsToMany(Task::class);
}
}
