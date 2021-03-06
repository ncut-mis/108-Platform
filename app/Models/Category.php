<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function quality_item()
    {
        return $this->hasMany(Quality_item::class);
    }
}
