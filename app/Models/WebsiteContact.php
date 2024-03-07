<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebsiteContact extends Model
{
    use HasFactory;
    protected $table = 'website_contacts';
    protected $primaryKey = 'id';
    protected $fillable = [ 'english_address', 'marathi_address','email', 'english_number','marathi_number'];
}