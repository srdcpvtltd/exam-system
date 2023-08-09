<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;

    protected $fillable = ['name','category_id','point','mark_from','mark_upto'];
    
    public function category()
    {
        return $this->belongsTo(GradeCategory::class,'category_id');
    }
}
