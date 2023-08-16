<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
     * @return HasMany
     */
    public function readHistories(): HasMany
    {
        return $this->hasMany('App\ReadHistory');
    }

    /**
     * Declare relationship to Page.
     *
     * @return HasMany
     */
    public function pages(): HasMany
    {
        return $this->hasMany('App\Page');
    }
}
