<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SmtpServer extends Model
{
    use HasFactory;

    protected $fillable = [
        'transport',
        'host',
        'port',
        'encryption',
        'username',
        'password',
        'timeout',
        'auth_mode',
        'active',
    ];
}
