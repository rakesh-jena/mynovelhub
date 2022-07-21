<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChapterView extends Model
{
    use HasFactory;

    protected $table = 'chapter_views';
    protected $fillable = ['chapter_id', 'views', 'book_id'];
}
