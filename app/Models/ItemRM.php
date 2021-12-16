<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemRM extends Model
{
    protected $table = 'item_rm';
    protected $primaryKey = 'id';
    protected $fillable = [
        'qty','price','transaction_id','rekam_medis_id',
    ];
    public $timestamps = false;
}
