<?php

namespace App\Models;

use App\Models\CarImages;
use App\Models\SellerRequest;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Car extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function images()
    {
    	return $this->hasMany(CarImages::class);
    }

    public function sellerRequest()
    {
        return $this->hasOne(SellerRequest::class);
    }
}
