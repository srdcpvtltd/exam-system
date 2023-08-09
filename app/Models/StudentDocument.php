<?php

namespace App\Models;

use App\Helpers\FileHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentDocument extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'document_category_id',
        'document'
    ];

    public function student()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function category()
    {
        return $this->belongsTo(DocumentCategory::class,'document_category_id');
    }

    public function setDocumentAttribute($value){
        $this->attributes['document'] = FileHelper::saveFile($value,'/uploaded_files/');
    }
}
