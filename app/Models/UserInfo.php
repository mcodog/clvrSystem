<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class UserInfo extends Model
{
    use HasFactory;
    public $table = "user_info";

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    
}
