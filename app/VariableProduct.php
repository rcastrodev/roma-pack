<?php

namespace App;

use App\Product;
use Illuminate\Database\Eloquent\Model;

class VariableProduct extends Model
{
    protected $fillable = ['product_id','diameter','width','weight','long'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
