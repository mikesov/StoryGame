<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Story extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'cover',
        'pages',
        'reward',
    ];

    /**
     * Declare relationship to ReadHistory.
     *
     * @return MorphToMany
     */
    public function read_history(): MorphToMany
    {
        return $this->morphToMany(ReadHistory::class, 'read_history');
    }

    /**
     * Declare relationship to Page.
     *
     * @return HasMany
     */
    public function pages(): HasMany
    {
        return $this->hasMany(Page::class);
    }
}
