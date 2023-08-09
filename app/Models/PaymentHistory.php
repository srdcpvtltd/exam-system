<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentHistory extends Model
{
    use HasFactory;

    protected $fillable = ['token_id','txn_init_final','status','user_id','track_id'];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
