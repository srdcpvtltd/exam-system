<?php

namespace App\Models;

use App\Helpers\FileHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CollegeProfile extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'phone',
        'college_name',
        'principal_name',
        'state_id',
        'district',
        'city_id',
        'year_of_establishment',
        'address',
        'certificate',
        'document'
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    
    public function setDocumentAttribute($value){
        $this->attributes['document'] = FileHelper::saveFile($value,'/uploaded_files/');
    }
    
    public function state()
    {
        return $this->belongsTo(State::class,'state_id');
    }

    public function city()
    {
        return $this->belongsTo(City::class,'city_id');
    }
}
