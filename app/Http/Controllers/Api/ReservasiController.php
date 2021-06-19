<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Reservasi;
use App\Meja;
use Illuminate\Support\Facades\Validator;

class ReservasiController extends Controller
{
    public function index(){
        $reservasis = Reservasi::all();
        if(count($reservasis) > 0){
            return response([
                'message' => 'Berhasil menampilkan Reservasi',
                'data' => $reservasis
            ], 200);
        }

        return response([
            'message' => 'Kosong',
            'data' => null
        ], 404);
    }

    public function show($find){
        $reservasis = Reservasi::find($find);
        if(!is_null($reservasis)){
            return response([
                'message' => 'Berhasil menampilkan Reservasi',
                'data' => $reservasis
            ], 200);
        }

        return response([
            'message' => 'Reservasi tidak ditemukan',
            'data' => null
        ], 404);
    }

    public function store(Request $request){
        $storeData = $request -> all();
        $validate = Validator::make($storeData, [
            'nama_pegawai' => 'required',
            'nama_customer' => 'required',
            'nomor_meja' => 'required',
            'tanggal_reservasi' => 'required',
            'sesi_reservasi' => 'required'
        ]);

        if($validate -> fails())
            return response(['message' => $validate -> errors()], 400);

        $reservasis = Reservasi::create($storeData);
        return response([
            'message' => 'Tambah Reservasi sukses',
            'data' => $reservasis
        ], 200);
    }

    public function update(Request $request, $find){
        $reservasis = Reservasi::find($find);
        if(is_null($reservasis)){
            return response([
                'message' => 'Reservasi tidak ditemukan',
                'data' => null
            ], 404);
        }

        $updateData = $request -> all();
        $validate = Validator::make($updateData, [
            'nama_pegawai' => 'required',
            'nama_customer' => 'required',
            'nomor_meja' => 'required',
            'tanggal_reservasi' => 'required',
            'sesi_reservasi' => 'required'
        ]);

        if($validate -> fails())
            return response(['message' => $validate -> errors()], 400);
        
        $reservasis -> nama_pegawai = $updateData['nama_pegawai'];
        $reservasis -> nama_customer = $updateData['nama_customer'];
        $reservasis -> nomor_meja = $updateData['nomor_meja'];
        $reservasis -> tanggal_reservasi = $updateData['tanggal_reservasi'];
        $reservasis -> sesi_reservasi = $updateData['sesi_reservasi'];

        if($reservasis -> save()){
            return response([
                'message' => 'Update Reservasi Sukses',
                'data' => $reservasis
            ], 200);
        }

        return response([
            'message' => 'Update Reservasi Gagal',
            'data' => null
        ], 400);
    }

    public function destroy($find){
        $reservasis = Reservasi::find($find);

        if(is_null($reservasis)){
            return response([
                'message' => 'Reservasi tidak ditemukan',
                'data' => null
            ], 404);
        }

        if($reservasis -> delete()){
            return response([
                'message' => 'Delete Reservasi Sukses',
                'data' => $reservasis,
            ], 200);
        }
        return response([
            'message' => 'Delete Reservasi Gagal',
            'data' => null,
        ], 400);
    }
}
