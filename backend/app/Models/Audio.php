<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Audio extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'sentence_id',
        'word_id',
        'audio',
    ];
}
