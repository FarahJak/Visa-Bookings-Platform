<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'email',
        'country_code',
        'mobile_number',
        'OTP_CODE',
        'password',
        'first_name',
        'last_name',
        'date_of_birth',
        'place_of_birth',
        'gender',
        'country_of_residency',
        'passport_no',
        'issue_date',
        'expiry_date',
        'place_of_issue',
        'profession',
        'organization',
        'has_companion',
        'user_type',
    ];

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
    ];

    /**
     * Get the visa associated with the user.
     */
    public function visa()
    {
        return $this->hasOne(Visa::class);
    }
}
