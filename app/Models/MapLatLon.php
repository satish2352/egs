<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MapLatLon extends Model
{
    use HasFactory;
    protected $table = 'map_lat_lons';
    protected $primaryKey = 'id';
    protected $fillable = ['lat', 'lon', 'location_name_english', 'location_name_marathi','location_address_english','location_address_marathi'];

}