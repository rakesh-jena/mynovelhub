<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookOriginal extends Model
{
    use HasFactory;
    protected $tables = 'books_original';
    protected $fillable = ['novel', 'slug', 'abbreviation','book_type','lead', 'author', 'description', 'status', 'rating', 'chapters', 'page_view', 'cover'];

}
