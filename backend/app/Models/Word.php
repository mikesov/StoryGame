<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Word extends Model
{
    use HasFactory;
    protected $fillable = [
        'sentence_id',
        'content',
        'order',
        'start',
        'end',
    ];

    /**
     * Declare relationship to Sentence.
     *
     * @return BelongsTo
     */
    public function sentence(): BelongsTo
    {
        return $this->belongsTo(Sentence::class);
    }

    /**
     * Declare relationship to Audio.
     *
     * @return HasOne
     */
    public function audio(): HasOne
    {
        return $this->hasOne(Audio::class);
    }

    /**
     * Declare relationship to Touchable.
     *
     * @return HasOne
     */
    public function touchable(): HasOne
    {
        return $this->HasOne(Touchable::class);
    }
}
