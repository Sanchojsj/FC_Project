<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ActivityImage;
class Activity extends Model
{
    use HasFactory;
    protected $fillable=[   
        'activity_code',
        'activity_name',
        'realization_date',
        'value',
        'type_phase',
        'body',
        'cover',
    ];

    public function activity_images(){
        return $this->hasMany(ActivityImage::class);
    }
}
