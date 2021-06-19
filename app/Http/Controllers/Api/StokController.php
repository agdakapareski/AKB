<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Stok;
use Validator;

class StokController extends Controller
{
    public function index(){
        $stoks = Stok::all();
        if(count($stoks) > 0){
            return response([
                'message' => 'Berhasil menampilkan stok',
                'data' => $stoks
            ], 200);
        }

        return response([
            'message' => 'Kosong',
            'data' => null
        ], 404);
    }

    public function show($find){
        $stoks = Stok::find($find);
        if(!is_null($stoks)){
            return response([
                'message' => 'Berhasil menampilkan stok',
                'data' => $stoks
            ], 200);
        }

        return response([
            'message' => 'Stok tidak ditemukan',
            'data' => null
        ], 404);
    }

    public function store(Request $request){
        $storeData = $request -> all();
        $validate = Validator::make($storeData, [
            'nama_bahan' => 'required',
            'jumlah_stok' => 'required',
            'unit_stok' => 'required',
        ]);

        if($validate -> fails())
            return response(['message' => $validate -> errors()], 400);

        $stoks = Stok::create($storeData);
        return response([
            'message' => 'Tambah stok sukses',
            'data' => $stoks
        ], 200);
    }

    public function update(Request $request, $find){
        if(is_numeric($find)) {
            $stoks = Stok::find($find);
        } else {
            $stoks = Stok::where('nama_bahan', '=', $find)->first();
        }
        if(is_null($stoks)){
            return response([
                'message' => 'Stok tidak ditemukan',
                'data' => null
            ], 404);
        }

        $updateData = $request -> all();
        $validate = Validator::make($updateData, [
            'nama_bahan' => 'required',
            'jumlah_stok' => 'required',
            'unit_stok' => 'required',
        ]);

        if($validate -> fails())
            return response(['message' => $validate -> errors()], 400);
        
        $stoks -> nama_bahan = $updateData['nama_bahan'];
        $stoks -> jumlah_stok = $updateData['jumlah_stok'];
        $stoks -> unit_stok = $updateData['unit_stok'];

        if($stoks -> save()){
            return response([
                'message' => 'Update Stok Sukses',
                'data' => $stoks
            ], 200);
        }

        return response([
            'message' => 'Update Stok Gagal',
            'data' => null
        ], 400);
    }

    public function destroy($find){
        if(is_numeric($find)) {
            $stoks = Stok::find($find);
        } else {
            $stoks = Stok::where('nama_bahan', '=', $find)->get();
        }

        if(is_null($stoks)){
            return response([
                'message' => 'Stok tidak ditemukan',
                'data' => null
            ], 404);
        }

        if($stoks -> delete()){
            return response([
                'message' => 'Delete Stok Sukses',
                'data' => $stoks,
            ], 200);
        }
        return response([
            'message' => 'Delete Stok Gagal',
            'data' => null,
        ], 400);
    }
}
