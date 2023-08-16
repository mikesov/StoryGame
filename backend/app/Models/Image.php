<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Image extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'image_id',
        'touchable_id',
        'image',
    ];

    /**
     * Declare relationship to Page.
     *
     * @return BelongsTo
     */
    public function page(): BelongsTo
    {
        return $this->morphMany('App\Page');
    }

    /**
     * Declare relationship to Touchable.
     *
     * @return BelongsTo
     */
    public function touchable(): BelongsTo
    {
        return $this->belongsTo('App\Touchable');
    }
}
