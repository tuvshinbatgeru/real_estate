<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryOptions extends Model
{
	protected $table = 'category_options';
	protected $fillable = ['category_id', 'option'];
}
