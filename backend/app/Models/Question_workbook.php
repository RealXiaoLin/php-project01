<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question_workbook extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'question_id',
    ];
}
