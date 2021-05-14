<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Bahan;
use Validator;

class BahanController extends Controller
{
    public function index() {
        $bahans = Bahan::all();

        if(!is_null($bahans)) {
            return response([
                'message' => 'Berhasil meampilkan bahan',
                'data' => $bahans
            ], 200);
        }

        return response([
            'message' => 'Kosong',
            'data' => null
        ], 404);
    }

    public function show($id) {
        $bahans = Bahan::find($id);

        if(!is_null($bahans)) {
            return response([
                'message' => 'Hasil pencarian bahan',
                'data' => $bahans
            ], 200);
        }

        return response([
            'message' => 'Bahan tidak ditemukan',
            'data' => null
        ], 404);
    }

    public function store(Request $request) {
        $storeData = $request -> all();
        $validate = Validator::make($storeData, [
            'nama_bahan' => 'required',
            'serving_size' => 'required',
            'satuan_serving' => 'required'
        ]);

        if($validate -> fails())
            return response(['message' => $validate -> errors()], 400);

        $bahans = Bahan::create($storeData);
        return response([
            'message' => 'Tambah bahan sukses',
            'data' => $bahans
        ], 200);
    }

    public function update(Request $request, $id) {
        $bahans = Bahan::find($id);
        if(is_null($bahans)) {
            return response ([
                'message' => 'Bahan tidak ditemukan',
                'data' => null
            ], 404);
        }

        $updateData = $request -> all();
        $validate = Validator::make($updateData, [
            'nama_bahan' => 'required',
            'serving_size' => 'required',
            'satuan_serving' => 'required'
        ]);

        if($validate -> fails())
            return response(['message' => $validate -> errors()], 400);
        
        $bahans -> nama_bahan = $updateData['nama_bahan'];
        $bahans -> serving_size = $updateData['serving_size'];
        $bahans -> satuan_serving = $updateData['satuan_serving'];

        if($bahans -> save()) {
            return response([
                'message' => 'Update bahan berhasil',
                'data' => $bahans
            ], 200);
        }

        return response([
            'message' => 'Update bahan gagal',
            'data' => null
        ], 400);
    }

    public function destroy($id) {
        $bahans = Bahan::find($id);

        if(is_null($bahans)) {
            return response([
                'message' => 'Bahan tidak ditemukan',
                'data' => null
            ], 404);
        }

        if($bahans -> delete()) {
            return response([
                'message' => 'Hapus bahan berhasil',
                'data' => $bahans
            ], 200);
        }

        return response([
            'message' => 'Hapus bahan gagal',
            'data' => null
        ], 400);
    }
}