<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamItemScore extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'exam_item_scores';
    protected $fillable =[
        'id',
        'exam_id',
        'quality_item_id',
        'score',

    ];
    public function quality_item()
    {
        return $this->hasMany(Quality_item::class);
    }

    public function exams()
    {
        return $this->hasMany(Exam::class);
    }
}
