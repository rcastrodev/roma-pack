<?php

namespace App;

use App\Company;
use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    protected $fillable = ['company_id', 'description', 'address', 'email', 'phone1', 'phone2', 'logo', 'linkedin', 'facebook', 'instagram',];


    public function company()
    {
        return $this->belongsTo (Company::class);
    }
}
