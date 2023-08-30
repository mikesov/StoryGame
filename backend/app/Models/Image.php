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
     * Declare relationship to Page.
     *
     * @return BelongsTo
     */
    public function page(): BelongsTo
    {
        return $this->belongsTo(Page::class);
    }

    /**
     * Declare relationship to Touchable.
     *
     * @return BelongsTo
     */
    public function touchable(): BelongsTo
    {
        return $this->belongsTo(Touchable::class);
    }

    /**
     * Get the model that the image belongs to.
     *
     * @return mixed|null
     */
    public function getModel(): mixed
    {
        if ($this->page_id) {
            return $this->page;
        } elseif ($this->touchable_id) {
            return $this->touchable;
        }

        return null;
    }
}
