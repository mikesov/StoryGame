<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Page extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'story_id',
        'page_number',
    ];

    /**
     * Declare relationship to Story.
     *
     * @return BelongsTo
     */
    public function story(): BelongsTo
    {
        return $this->belongsTo('App\Story');
    }

    /**
     * Declare relationship to Sentence.
     *
     * @return HasMany
     */
    public function sentences(): HasMany
    {
        return $this->hasMany('App\Sentence');
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
}
