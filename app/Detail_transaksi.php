<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Detail_transaksi extends Model
{
    use SoftDeletes;

    protected $table = 'detail_transaksi';
    protected $primaryKey = 'id_detail_transaksi';
    protected $fillable = [
        'id_detail_transaksi', 'nama_customer', 'nama_menu', 'jumlah_pesanan', 'status_pesanan'
    ];
}
