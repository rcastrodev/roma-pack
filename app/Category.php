<?php

namespace App;

use App\SubCategory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['image', 'image_2', 'name', 'content_1', 'content_2', 'data_sheet'];

    public function subCategories()
    {
        return $this->hasMany(SubCategory::class);
    }
}
