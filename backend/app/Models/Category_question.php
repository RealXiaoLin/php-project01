<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category_question extends Model
{
    use HasFactory;

    protected $fillable = [
        'workbook_id',
        'question_id',
    ];

}
