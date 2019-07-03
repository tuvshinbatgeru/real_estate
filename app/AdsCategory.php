<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdsCategory extends Model
{
    protected $table = 'ads_categories';
    protected $fillable = ['ads_id', 'category_id', 'option_id'];
}
