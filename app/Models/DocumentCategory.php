<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class DocumentCategory extends Model
{
    use HasFactory;
    
    protected $guarded = [];

    public function document($user_id = null)
    {
        if(!$user_id)
            $user_id = Auth::user()->id;
        return StudentDocument::where('user_id',$user_id)->where('document_category_id',$this->id)->first();
    }
}
