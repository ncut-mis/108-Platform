<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    protected $table = 'members';
    protected $fillable = [
        'id',
        'name',
        'sex',
        'birthday',
        'phone',
        'address',
        'email',
        'password'

    ];
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function cart_items()
    {
        return $this->hasMany(Cart_item::class);
    }
}
