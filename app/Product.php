<?php

namespace App;

use App\Category;
use App\SubCategory;
use App\ProductPicture;
use App\VariableProduct;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['sub_category_id', 'name', 'description', 'data_sheet', 'order'];

    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class);
    }

    public function images()
    {
        return $this->hasMany(ProductPicture::class);
    }

    public function variableProducts()
    {
        return $this->hasMany(VariableProduct::class);
    }
}


