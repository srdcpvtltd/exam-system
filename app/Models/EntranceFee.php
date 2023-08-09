<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EntranceFee extends Model
{
    use HasFactory;

    protected $fillable = ['exam_name','exam_fee'];

}
