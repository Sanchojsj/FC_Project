<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Crop extends Model
{
    use HasFactory;
    protected $fillable=[
        'crop_code',
        'crop_name',
        'start_date',
        'finish_date',
        'land_area',
        'type_phase',
        'type_crop',
        'body',
        'cover',
    ];

    public function imagesC(){
        return $this->hasMany(Image_Crop::class);
    }
}

