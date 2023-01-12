<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'check_in_date', 'check_out_date', 'room_type', 'has_extra_night', 'check_in_date_2', 'check_out_date_2', 'room_type_2'];
}
