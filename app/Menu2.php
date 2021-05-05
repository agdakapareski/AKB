<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Menu2 extends Model
{
    use SoftDeletes;

    protected $table = 'menu';
    protected $primaryKey = 'id_menu';
    protected $fillable = [
        'id_menu', 'nama_menu', 'id_bahan', 'kategori_menu', 'deskripsi_menu', 'harga',
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
