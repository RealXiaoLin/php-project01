<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'body',
        'choice_1',
        'choice_2',
        'choice_3',
        'choice_4',
        'answer_body',
        'answer_choice',
        'status_num',
        'question_workbook_id',
        'category_question_id',
    ];

    public function question_workbooks()
    {
        return $this->hasMany(Question_workbooks::class);
    }

    public function category_questions()
    {
        return $this->hasMany(Category_questions::class);
    }




}
