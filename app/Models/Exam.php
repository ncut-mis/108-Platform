<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User as Staff;

class Exam extends Model
{
    use HasFactory;
    protected $table = 'exams';
    protected $fillable = [
        'id',
        'product_id',
        'staff_id',
        'pass',
        'perfect',
        'meet',
        'start',
        'end',
        'date',

    ];

    public function staff()
    {
        return $this->belongsTo(Staff::class);
    }
}
