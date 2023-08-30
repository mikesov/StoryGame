<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Sentence extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'page_id',
        'positionX',
        'positionY',
        'content',
    ];

    /**
     * Declare relationship to Page.
     *
     * @return BelongsTo
     */
    public function page(): BelongsTo
    {
        return $this->belongsTo(Page::class);
    }

    /**
     * Declare relationship to Word.
     *
     * @return HasMany
     */
    public function words(): HasMany
    {
        return $this->hasMany(Word::class);
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
}
