<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Transaksi;
use Validator;

class TransaksiController extends Controller
{
    public function index() {
        $transaksis = Transaksi::all();
        if(count($transaksis) > 0) {
            return response([
                'message' => 'Berhasil menampilkan transaksi',
                'data' => $transaksis
            ], 200);
        }

        return response([
            'message' => 'Kosong',
            'data' => null
        ], 404);
    }

    public function show($find) {
        if(is_numeric($find)) {
            $transaksis = Transaksi::find($find);
        } else {
            $transaksis = Transaksi::where('nama_customer', '=', $find)->get();
        }
        if(!is_null($transaksis)) {
            return response([
                'message' => 'Berhasil menampilkan transaksi',
                'data' => $transaksis
            ], 200);
        }

        return response([
            'message' => 'Transaksi tidak ditemukan',
            'data' => null
        ], 404);
    }

    public function store(Request $request) {
        $storeData = $request -> all();
        $validate = Validator::make($storeData, [
            'nama_customer' => 'required',
            'nama_pegawai' => 'nullable',
            'jenis_pembayaran' => 'nullable',
            'nama_pemilik_kartu' => 'nullable',
            'kode_verifikasi' => 'nullable',
            'total_transaksi' => 'required',
            'status_transaksi' => 'nullable'
        ]);

        if($validate -> fails()) {
            return response(['message' => $validate -> errors()], 400);
        }

        $transaksis = Transaksi::create($storeData);
        return response([
            'message' => 'Berhasil menyimpan transaksi',
            'data' => $transaksis
        ], 200);
    }

    public function storeMobile(Request $request) {
        $storeData = $request -> all();
        $validate = Validator::make($storeData, [
            'nama_customer' => 'required',
            'nama_pegawai' => 'nullable',
            'jenis_pembayaran' => 'nullable',
            'nama_pemilik_kartu' => 'nullable',
            'kode_verifikasi' => 'nullable',
            'total_transaksi' => 'required',
            'status_transaksi' => 'nullable'
        ]);

        if($validate -> fails()) {
            return response(['message' => $validate -> errors()], 400);
        }

        $transaksis = Transaksi::create($storeData);
        return response($transaksis, 200);
    }

    public function update(Request $request, $find) {
        $transaksis = Transaksi::find($find);
        if(is_null($transaksis)) {
            return response([
                'message' => 'Transaksi tidak ditemukan',
                'data' => null
            ], 404);
        }

        $updateData = $request -> all();
        $validate = Validator::make($updateData, [
            'nama_customer' => 'required',
            'nama_pegawai' => 'nullable',
            'jenis_pembayaran' => 'nullable',
            'nama_pemilik_kartu' => 'nullable',
            'kode_verifikasi' => 'nullable',
            'total_transaksi' => 'required',
            'status_transaksi' => 'nullable'
        ]);

        if($validate -> fails()) {
            return response(['message' => $validate -> errors()], 400);
        }

        $transaksis -> nama_customer = $updateData['nama_customer'];
        $transaksis -> nama_pegawai = $updateData['nama_pegawai'];
        $transaksis -> jenis_pembayaran = $updateData['jenis_pembayaran'];
        $transaksis -> nama_pemilik_kartu = $updateData['nama_pemilik_kartu'];
        $transaksis -> kode_verifikasi = $updateData['kode_verifikasi'];
        $transaksis -> total_transaksi = $updateData['total_transaksi'];
        $transaksis -> status_transaksi = $updateData['status_transaksi'];

        if($transaksis -> save()) {
            return response([
                'message' => 'Update Transaksi Berhasil',
                'data' => $transaksis
            ], 200);
        }

        return response([
            'message' => 'Update Transaksi Gagal',
            'data' => null
        ], 400);
    }

    public function lunas($find) {
        if(is_numeric($find)) {
            $transaksis = Transaksi::find($find);
        } else {
            $transaksis = Transaksi::where('nama_customer', '=', $find)->first();
        }
        $transaksis -> status_transaksi = 'Lunas';
        $transaksis -> save();
        if($transaksis -> save()){
            return response([
                'message' => 'Transaksi Lunas',
                'data' => $transaksis
            ], 200);
        }

        return response([
            'message' => 'Gagal',
            'data' => null
        ], 400);
    }

    public function destroy($find){
        $transaksis = Transaksi::find($find);

        if(is_null($transaksis)){
            return response([
                'message' => 'Transaksi tidak ditemukan',
                'data' => null
            ], 404);
        }

        if($transaksis -> delete()){
            return response([
                'message' => 'Delete Transaksi Sukses',
                'data' => $transaksis,
            ], 200);
        }
        return response([
            'message' => 'Delete Transaksi Gagal',
            'data' => null,
        ], 400);
    }
}
