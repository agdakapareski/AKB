<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Reservasi extends Model
{
    use SoftDeletes;

    protected $table = 'reservasi';
    protected $primaryKey = 'id_reservasi';
    protected $fillable = [
       'id_reservasi', 'nama_pegawai', 'nama_customer', 'nomor_meja', 'tanggal_reservasi', 'sesi_reservasi'
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
