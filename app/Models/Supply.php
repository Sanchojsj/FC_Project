<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SupplyImage;
class Supply extends Model
{
    use HasFactory;
    protected $fillable=[   
        'supply_code',
        'supply_name',
        'price',
        'amount',
        'expiration_date',
        'body',
        'cover',
    ];

    public function supply_images(){
        return $this->hasMany(SupplyImage::class);
    }
}
