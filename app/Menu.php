<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menus';
    protected $fillable = ['name', 'main_type'];

    public function categories() {
        return $this->belongsToMany('App\Category', 'menu_categories', 'menu_id', 'category_id');
    }
}
