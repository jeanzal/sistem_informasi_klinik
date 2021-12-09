<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    protected $table = 'dokters';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama_dokter'
    ];
    public $timestamps = false;
}
