<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookTranslated extends Model
{
    use HasFactory;

    protected $table = 'books_translated';
    protected $fillable = ['novel', 'slug', 'abbreviation', 'lead',
        'author', 'description', 'status', 'released', 'featured', 'rating', 'chapters',
        'page_view', 'cover', 'ch_updated'];

}