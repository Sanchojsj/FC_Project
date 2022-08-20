<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Crop;
class CropImage extends Model
{
    use HasFactory;
    protected $fillable=[
        'crop_image',
        'crop_id',
    ];

    public function crops(){
        return $this->belongsTo(Crop::class);
    }
}
