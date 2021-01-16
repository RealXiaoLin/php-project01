<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workbook extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'user_id',
    ];

    public function questions()
    {
        return $this->belongsToMany(Question::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
