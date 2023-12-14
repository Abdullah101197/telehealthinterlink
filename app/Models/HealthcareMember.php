<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HealthcareMember extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'user_email', 'image', 'based_on', 'since', 'status', 'subscription_status', 'is_filled'];
}
