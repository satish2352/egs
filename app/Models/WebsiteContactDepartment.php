<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebsiteContactDepartment extends Model
{
    use HasFactory;
    protected $table = 'website_contact_department';
    protected $primaryKey = 'id';
    protected $fillable = [ 'department_english_name', 'department_marathi_name','department_english_address', 'department_marathi_address','department_email','department_english_contact_number','department_marathi_contact_number'];
}
