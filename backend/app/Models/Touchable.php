<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Touchable extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'sentence_id',
        'vertices',
    ];

    /**
     * Declare relationship to Word.
     *
     * @return BelongsTo
     */
    public function word(): BelongsTo
    {
        return $this->belongsTo(Sentence::class);
    }

    /**
     * Declare relationship to Image.
     *
     * @return HasOne
     */
    public function image(): HasOne
    {
        return $this->hasOne(Image::class);
    }

    /**
     * Declare relationship to Movement.
     *
     * @return HasOne
     */
    public function movement(): HasOne
    {
        return $this->hasOne(Movement::class);
    }
}
