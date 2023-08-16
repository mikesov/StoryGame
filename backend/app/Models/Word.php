<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

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
        return $this->belongsTo('App\Sentence');
    }

    /**
     * Declare relationship to Audio.
     *
     * @return HasOne
     */
    public function audio(): HasOne
    {
        return $this->HasOne('App\Audio');
    }

    /**
     * Declare relationship to Touchable.
     *
     * @return HasOne
     */
    public function touchable(): HasOne
    {
        return $this->HasOne('App\Touchable');
    }
}
