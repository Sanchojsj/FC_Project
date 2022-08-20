<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Supply;
class SupplyImage extends Model
{
    use HasFactory;
    protected $fillable=[
        'supply_image',
        'supply_id',
    ];

    public function supplies(){
        return $this->belongsTo(Supply::class);
    }
}
