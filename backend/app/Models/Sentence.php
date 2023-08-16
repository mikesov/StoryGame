<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

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
        return $this->belongsTo('App\Page');
    }

    /**
     * Declare relationship to Word.
     *
     * @return HasMany
     */
    public function words(): HasMany
    {
        return $this->hasMany('App\Word');
    }

    /**
     * Declare relationship to Audio.
     *
     * @return HasOne
     */
    public function audio(): HasOne
    {
        return $this->hasOne('App\Audio');
    }
}
