<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Activity;
class ActivityImage extends Model
{
    use HasFactory;
    protected $fillable=[
        'activity_image',
        'activity_id',
    ];

    public function activities(){
        return $this->belongsTo(Activity::class);
    }
}
