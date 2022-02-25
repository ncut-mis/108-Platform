<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    use HasFactory;
    protected $table = 'sellers';
    protected $fillable = [
        'id',
        'member_id',
        'bank_branch',
        'account',
        'status',
    ];
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
