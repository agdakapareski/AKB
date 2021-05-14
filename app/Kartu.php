<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Kartu extends Model
{
    protected $table = 'kartu';
    protected $primaryKey = 'id_kartu';
    protected $fillable = [
        'id_kartu', 'jenis_kartu', 'nama_pemilik_kartu', 'nomor_kartu', 'exp_date_kartu'
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
