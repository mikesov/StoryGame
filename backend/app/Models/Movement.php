<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movement extends Model
{
    use HasFactory;

    protected $table = 'movements';
    protected $primaryKey = 'id';

    protected $fillable = [
        'touchable_id',
        'coordinateX',
        'coordinateY',
    ];
}
