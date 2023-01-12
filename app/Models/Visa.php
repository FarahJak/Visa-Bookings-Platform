<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visa extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'arrival_date', 'visa_duration', 'visa_status', 'passport_picture', 'personal_picture', 'confirmed'];
}
