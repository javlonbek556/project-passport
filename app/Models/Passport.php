<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Passport extends Model
{
    protected $fillable = [
        'passport_number',
        'issue_date',
        'expiry_date',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
