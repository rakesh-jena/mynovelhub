<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserReply extends Model
{
    use HasFactory;

    protected $table = 'user_reply';
    protected $fillable = ['replied_id', 'user_id', 'reply_type', 'content'];
}
