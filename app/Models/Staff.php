<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;
    protected $table = 'staff';
    protected $fillable = [
        'id',
        'email',
        'password',
        'name',
        'job',
    ];
    //時段
    public function sections()
    {
        return $this->hasMany(Section::class);
    }

    public function per_week_schedule()
    {
        return $this->hasMany(Per_weekSchedule::class);
    }
}
