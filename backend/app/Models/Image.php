<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

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
     * Declare relationship to Page and Touchable.
     *
     * @return MorphTo
     */
    public function imageable(): MorphTo
    {
        return $this->morphTo();
    }
//
//    /**
//     * Declare relationship to Touchable.
//     *
//     * @return BelongsTo
//     */
//    public function touchable(): BelongsTo
//    {
//        return $this->belongsTo('App\Touchable');
//    }
}
