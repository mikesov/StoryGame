<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
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
     * Declare relationship to Sentence and Word.
     *
     * @return MorphTo
     */
    public function audioable(): MorphTo
    {
        return $this->morphTo();
    }
}
