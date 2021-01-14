<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workbook extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
    ];

    public function questions()
    {
        return $this->belongsToMany('App\Question');
    }

}
