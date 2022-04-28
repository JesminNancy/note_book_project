<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NoteBookModel extends Model
{
    protected $table = 'note_book_details';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = false;
}
