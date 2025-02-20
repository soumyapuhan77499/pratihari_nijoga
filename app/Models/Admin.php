<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'admin_id', 'first_name', 'last_name', 'mobile_no', 'otp', 'order_id', 'expiry', 'hash', 'client_id', 'client_secret', 'otp_length','channel','status'
    ];

    protected $hidden = [
        'password',
    ];
}