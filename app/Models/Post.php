<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User; // User modelini import qilish

class Post extends Model
{
    protected $fillable = [
        'user_id',
        'passport_number',
        'issue_date',
        'expiry_date'
    ];

    protected $table = 'posts';

    
    public function user()
    {
        return $this->hasOne(User::class, );
    }
}
