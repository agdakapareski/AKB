<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class HistoriKeluar extends Model
{
    protected $table = 'histori_keluar';
    protected $primaryKey = 'id_histori_keluar';
    protected $fillable = [
       'id_histori_keluar', 'tanggal_histori', 'nama_bahan', 'jumlah_stok', 'unit_stok', 'harga_stok', 'keterangan'
    ];

    public function getCreatedAtAttribute(){
        if(!is_null($this->attributes['created_at'])){
            return Carbon::parse($this->attributes['created_at']) -> format('Y-m-d H:i:s');
        }
    }

    public function getUpdatedAtAttribute(){
        if(!is_null($this->attributes['updated_at'])){
            return Carbon::parse($this->attributes['updated_at']) -> format('Y-m-d H:i:s');
        }
    }
}