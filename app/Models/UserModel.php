<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class userModel extends Model
{
    protected $table = 'list_user';
    protected $fillable = [
        'name',
        'username',
        'password',
    ];
}
