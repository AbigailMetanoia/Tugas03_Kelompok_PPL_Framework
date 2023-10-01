<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $primaryKey = 'isbn';
    protected $table = 'books';

    protected $fillable = ['isbn', 'author', 'title', 'price'];

    public $timestamps = false;
}
