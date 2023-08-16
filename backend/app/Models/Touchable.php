<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

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

    /**
     * Declare relationship to Word.
     *
     * @return BelongsTo
     */
    public function word(): BelongsTo
    {
        return $this->belongsTo('App\Word');
    }

    /**
     * Declare relationship to Image.
     *
     * @return HasOne
     */
    public function image(): HasOne
    {
        return $this->hasOne('App\Image');
    }

    /**
     * Declare relationship to Movement.
     *
     * @return HasOne
     */
    public function movement(): HasOne
    {
        return $this->hasOne('App\Movement');
    }
}
