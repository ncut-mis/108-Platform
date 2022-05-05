<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QualityItem extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'quality_items';
    protected $fillable =[
        'id',
        'category_id',
        'content',
        'extra',

    ];
    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    public function exam_item_scores()
    {
        return $this->hasMany(Exam_item_score::class);
    }
}
