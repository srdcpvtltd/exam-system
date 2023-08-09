<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GradeCategory extends Model
{
    use HasFactory;

    protected $fillable = ['name','mark'];

    public function grades()
    {
        return $this->hasMany(Grade::class);
    }
}
