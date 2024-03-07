<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PolicyPrivacy extends Model
{
    use HasFactory; use HasFactory;
    protected $table = 'policy_privacies';
    protected $primaryKey = 'id';
    protected $fillable = ['english_title','marathi_title','english_description','marathi_description'];

}