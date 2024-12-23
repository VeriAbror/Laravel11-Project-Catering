<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryAndMenu extends Model
{
    protected $fillable = ['category_name', 'menu_name', 'price'];
}

