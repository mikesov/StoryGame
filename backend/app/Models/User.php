<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * Constructor method.
     * @return void
     */
    public function __constructor() {

    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'coins',
        'stories_read',
    ];

    /**
     * Default attributes.
     *
     * @var string[]
     */
    protected $attributes = [
        'name' => 'John Doe',
        'email' => 'johndoe@examplemail.com',
        'password' => '12345678',
        'phone' => '',
        'coins' => 0,
        'stories_read' => 0,
    ];

    public array $errors = [];

    /**
     * Validate new user's information.
     *
     * @return bool
     */
    public function isValid(): bool
    {
        $this->errors = [];

        if (!$this->name || $this->name == '') {
            $errors['name'][] = 'The name field is required.';
        }

        if (!$this->email || $this->email == '') {
            $errors['email'][] = 'The email field is required';
        } elseif (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'][] = 'The email address is not valid.';
        }

        if (!$this->password || $this->email == '') {
            $errors['password'][] = 'The password field is required.';
        } elseif (strlen($this->password) < 6) {
            $errors['password'][] = 'The password field must be at least 8 characters long.';
        }

        return empty($errors);
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
