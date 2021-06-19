<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\HistoriKeluar;
use Validator;

class HistoriKeluarController extends Controller
{
    public function index(){
        $historis = HistoriKeluar::all();
        if(count($historis) > 0){
            return response([
                'message' => 'Berhasil menampilkan HistoriKeluar',
                'data' => $historis
            ], 200);
        }

        return response([
            'message' => 'Kosong',
            'data' => null
        ], 404);
    }

    public function show($find){
        $historis = HistoriKeluar::find($find);
        if(!is_null($historis)){
            return response([
                'message' => 'Berhasil menampilkan HistoriKeluar',
                'data' => $historis
            ], 200);
        }

        return response([
            'message' => 'HistoriKeluar tidak ditemukan',
            'data' => null
        ], 404);
    }

    public function store(Request $request){
        $storeData = $request -> all();
        $validate = Validator::make($storeData, [
            'tanggal_histori' => 'required',
            'nama_bahan' => 'required',
            'jumlah_stok' => 'required',
            'unit_stok' => 'required',
            'keterangan' => 'required'
        ]);

        if($validate -> fails())
            return response(['message' => $validate -> errors()], 400);

        $historis = HistoriKeluar::create($storeData);
        return response([
            'message' => 'Tambah HistoriKeluar sukses',
            'data' => $historis
        ], 200);
    }

    public function update(Request $request, $find){
        $historis = HistoriKeluar::find($find);
        if(is_null($historis)){
            return response([
                'message' => 'HistoriKeluar tidak ditemukan',
                'data' => null
            ], 404);
        }

        $updateData = $request -> all();
        $validate = Validator::make($updateData, [
            'tanggal_histori' => 'required',
            'nama_bahan' => 'required',
            'jumlah_stok' => 'required',
            'unit_stok' => 'required',
            'keterangan' => 'required'
        ]);

        if($validate -> fails())
            return response(['message' => $validate -> errors()], 400);
        
        $historis -> tanggal_histori = $updateData['tanggal_histori'];
        $historis -> nama_bahan = $updateData['nama_bahan'];
        $historis -> jumlah_stok = $updateData['jumlah_stok'];
        $historis -> unit_stok = $updateData['unit_stok'];
        $historis -> keterangan = $updateData['keterangan'];

        if($historis -> save()){
            return response([
                'message' => 'Update HistoriKeluar Sukses',
                'data' => $historis
            ], 200);
        }

        return response([
            'message' => 'Update HistoriKeluar Gagal',
            'data' => null
        ], 400);
    }
}
