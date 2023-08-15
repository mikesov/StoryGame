<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Touchable extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'word_id',
        'coordinateX',
        'coordinateY',
        'vertices',
    ];
}
