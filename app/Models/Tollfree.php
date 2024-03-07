<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tollfree extends Model
{
    use HasFactory;
    protected $table = 'tollfrees';
    protected $primaryKey = 'id';
    protected $fillable = ['english_tollfree_no','marathi_tollfree_no'];

}