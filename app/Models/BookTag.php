<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookTag extends Model
{
    use HasFactory;

    protected $table = 'book_tags';
    protected $fillable = ['book_id', 'tag_id', 'book_type'];
}
