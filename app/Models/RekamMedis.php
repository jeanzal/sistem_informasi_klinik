<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RekamMedis extends Model
{
    protected $table = 'rekam_medis';
    protected $primaryKey = 'id';
    protected $fillable = [
        'spesialis', 'biaya','dokter_id'
    ];
    public $timestamps = false;
}
