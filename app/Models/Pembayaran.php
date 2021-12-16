<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $table = 'pembayaran';
    protected $primaryKey = 'id';
    protected $fillable = [
        'tgl_bayar','transaction_id','metode_bayar',
    ];
    public $timestamps = false;
}
