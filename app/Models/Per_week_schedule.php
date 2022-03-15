<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Per_week_schedule extends Model
{
    use HasFactory;
    protected $table = 'per_week_schedules';
    protected $fillable = [
        'id',
        'staff_id',
        'start',
        'end',
        'week',
        'month',
    ];
    public function staff()
    {
        return $this->belongsTo(Staff::class);
    }
}
