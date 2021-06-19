<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Histori extends Model
{
    protected $table = 'histori';
    protected $primaryKey = 'id_histori';
    protected $fillable = [
       'id_histori', 'tanggal_histori', 'nama_bahan', 'jumlah_stok', 'unit_stok', 'harga_stok'
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
