<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Meja;
use Validator;

class MejaController extends Controller
{
    public function index(){
        $mejas = Meja::all();
        if(count($mejas) > 0){
            return response([
                'message' => 'Berhasil menampilkan data meja',
                'data' => $mejas
            ], 200);
        }

        return response([
            'message' => 'Kosong',
            'data' => null
        ], 404);
    }

    public function show($id){
        $mejas = Meja::find($id);
        if(!is_null($mejas)){
            return response([
                'message' => 'Berhasil menampilkan data meja',
                'data' => $mejas
            ], 200);
        }

        return response([
            'message' => 'Data meja tidak ditemukan',
            'data' => null
        ], 404);
    }

    public function store(Request $request){
        $storeData = $request -> all();
        $validate = Validator::make($storeData, [
            'nomor_meja' => 'required|numeric',
            'status_meja' => 'required'
        ]);

        if($validate -> fails())
            return response(['message' => $validate -> errors()], 400);

        $mejas = Meja::create($storeData);
        return response([
            'message' => 'Tambah data meja sukses',
            'data' => $mejas
        ], 200);
    }

    public function update(Request $request, $id){
        $mejas = Meja::find($id);
        if(is_null($mejas)){
            return response([
                'message' => 'Data meja tidak ditemukan',
                'data' => null
            ], 404);
        }

        $updateData = $request -> all();
        $validate = Validator::make($updateData, [
            'nomor_meja' => 'required|numeric',
            'status_meja' => 'required'
        ]);

        if($validate -> fails())
            return response(['message' => $validate -> errors()], 400);
        
        $mejas -> nomor_meja = $updateData['nomor_meja'];
        $mejas -> status_meja = $updateData['status_meja'];

        if($mejas -> save()){
            return response([
                'message' => 'Update data meja Sukses',
                'data' => $mejas
            ], 200);
        }

        return response([
            'message' => 'Update data meja Gagal',
            'data' => null
        ], 400);
    }

    public function destroy($id) {
        $mejas = Meja::find($id);

        if(is_null($mejas)) {
            return response([
                'message' => 'Meja tidak ditemukan',
                'data' => null
            ], 404);
        }

        if($mejas -> delete()) {
            return response([
                'message' => 'Delete Meja berhasil',
                'data' => $mejas
            ], 200);
        }

        return response([
            'message' => 'Delete Meja gagal',
            'data' => null
        ], 400);
    }
}
