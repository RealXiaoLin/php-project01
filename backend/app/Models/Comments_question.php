<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comments_question extends Model
{
    use HasFactory;

    protected $fillable = [
        'comment_id',
        'qu_id',
    ];
}
