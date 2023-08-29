<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class ReadHistory extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'user_id',
        'story_id',
        'finish',
    ];

    /**
     * Declare relationship to User and Story.
     *
     * @return MorphTo
     */
    public function read_history(): MorphTo
    {
        return $this->morphTo();
    }
}
