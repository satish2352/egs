<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MAPGISData extends Model
{
    
    use HasFactory;
    protected $table = 'm_a_p_g_i_s_data';
    protected $primaryKey = 'id';
    protected $fillable = ['latitude','longitude', 'english_police_station','marathi_police_station','english_address','marathi_address'];
}