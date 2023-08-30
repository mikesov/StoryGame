<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Audio extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'sentence_id',
        'word_id',
        'audio',
    ];

    /**
     * Declare relationship to Page.
     *
     * @return BelongsTo
     */
    public function sentence(): BelongsTo
    {
        return $this->belongsTo(Sentence::class);
    }

    /**
     * Declare relationship to Touchable.
     *
     * @return BelongsTo
     */
    public function word(): BelongsTo
    {
        return $this->belongsTo(Word::class);
    }

    /**
     * Get the model that the image belongs to.
     *
     * @return mixed|null
     */
    public function getModel(): mixed
    {
        if ($this->sentence_id) {
            return $this->sentence;
        } elseif ($this->word_id) {
            return $this->word;
        }

        return null;
    }
}
