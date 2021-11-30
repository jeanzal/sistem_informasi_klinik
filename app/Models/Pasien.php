<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    protected $table = "pasien";
    protected $primaryKey ="id";
    protected $fillable =[
        'name'
    ];
}
