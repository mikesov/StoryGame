<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Movement extends Model
{
    use HasFactory;

    protected $table = 'movements';
    protected $primaryKey = 'id';

    protected $fillable = [
        'touchable_id',
        'coordinateX',
        'coordinateY',
    ];

    /**
     * Declare relationship to Touchable.
     *
     * @return BelongsTo
     */
    public function touchable(): BelongsTo
    {
        return $this->belongsTo(Touchable::class);
    }
}
