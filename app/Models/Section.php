<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;
    protected $table = 'sections';
    protected $fillable = [
        'id',
        'staff_id',
        'start',
        'end',
        'date',
    ];
    public function exams()
    {
        return $this->hasOne(Exam::class);
    }

    public function staff()
    {
        return $this->belongsTo(Staff::class);
    }
}
