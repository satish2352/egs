<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DisasterManagementWebPortal extends Model
{
    use HasFactory;
    protected $table = 'disaster_management_web_portals';
    protected $primaryKey = 'id';
    protected $fillable = ['english_name', 'marathi_name','english_title', 'marathi_title','english_description', 'marathi_description','english_designation','marathi_designation','english_image','marathi_image'];

}