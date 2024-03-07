<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneralContact extends Model
{
    use HasFactory;
    protected $table = 'general_contacts';
    protected $primaryKey = 'id';
    protected $fillable = ['english_name','marathi_name','english_number','marathi_number','english_icon','marathi_icon'];
}