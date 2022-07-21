<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ViewCount extends Model
{
    use HasFactory;

    protected $table = 'view_count';
    protected $fillable = ['book_id', 'daily', 'weekly', 'monthly'];
}
