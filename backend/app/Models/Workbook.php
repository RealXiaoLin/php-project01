<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workbook extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'question_workbook_id',
    ];

    public function question_workbooks()
    {
        return $this->hasMany(Question_workbooks::class);
    }

}
