<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    use HasFactory;

    public mixed $name;
    public mixed $cover;
    public mixed $pages;
    public mixed $reward;

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

    public array $errors = [];

    /**
     * Validate new story's information
     *
     * @return bool
     */
    public function isValid(): bool
    {
        $errors = [];

        if (!$this->name) {
            $errors['name'][] = 'The name field is required.';
        }

        if (!$this->cover) {
            $errors['cover'][] = 'The cover field is required';
        }

        return empty($errors);
    }
}
