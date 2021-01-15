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
        'user_id',
    ];

    public function workbooks()
    {
      return $this->belongsToMany('App\Workbook');
    }

    public function categories()
    {
      return $this->belongsToMany('App\Category');
    }

    public function users()
    {
        return $this->belongsTO('App\User');
    }
}
