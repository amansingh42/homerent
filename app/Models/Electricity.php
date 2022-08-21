<?php

namespace App\Models;

use App\Models\Assets;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Electricity extends Model
{
    use HasFactory;

    protected $fillable = ['aid','a_price','p_reading','c_reading','per_unit','month','year']; 

    public function asset_name(){
        return $this->belongsTo(Assets::class,'aid','id');
    }
}
