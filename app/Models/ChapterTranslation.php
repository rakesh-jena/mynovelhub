<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChapterTranslation extends Model
{
    use HasFactory;

    protected $table = 'chapters_translation';
    protected $fillable = ['book_id', 'slug', 'chapter_no', 'content', 'volume', 'ch_name'];
}
