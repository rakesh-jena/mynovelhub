<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserLibrary extends Model
{
    use HasFactory;

    protected $table = 'user_library';
    protected $fillable = ['user_id', 'book_id'];
}
