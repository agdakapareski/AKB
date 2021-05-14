<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Detail_transaksi;
use Validator;

class DetailTransaksiController extends Controller
{
    public function index() {
        $details = Detail_transaksi::all();
        if(count($details) > 0) {
            return response([
                'message' => 'Berhasil menampilkan pesanan',
                'data' => $details
            ], 200);
        }

        return response([
            'message' => 'Pesanan kosong',
            'data' => null
        ], 404);
    }

    public function indexMobile() {
        $details = Detail_transaksi::all();
        if(count($details) > 0) {
            return response($details, 200);
        }

        return response('Pesanan kosong', 404);
    }

    public function showNama($find) {
        if(is_numeric($find)) {
            $details = Detail_transaksi::find($find);
        } else {
            $details = Detail_transaksi::where('nama_customer', '=', $find)->get();
        }
        if(!is_null($details)) {
            return response($details, 200);
        }

        return response('Pesanan tidak ada', 404);
    }

    public function showTotal($find) {
        $details = Detail_transaksi::where('nama_customer', '=', $find)->sum('subtotal');
        if(!is_null($details)) {
            return response($details, 200);
        }

        return response([
            'message' => 'Kosong'
        ], 404);
    }

    public function show($find) {
        if(is_numeric($find)) {
            $details = Detail_transaksi::find($find);
        } else {
            $details = Detail_transaksi::where('nama_customer', '=', $find)->get();
        }
        if(!is_null($details)) {
            return response([
                'message' => 'Berhasil menampilkan pesanan',
                'data' => $details
            ], 200);
        }

        return response([
            'message' => 'Pesanan tidak ada',
            'data' => null
        ], 404);
    }

    public function storeMobile(Request $request) {
        $storeData = $request -> all();
        $validate = Validator::make($storeData, [
            'nama_customer' => 'required',
            'nama_menu' => 'required',
            'harga' => 'required',
            'jumlah_pesanan' => 'required',
            'status_pesanan' => 'nullable'
        ]);

        if($validate -> fails()) {
            return response(['message' => $validate -> errors()], 400);
        }

        $details = Detail_transaksi::create($storeData);
        return response($details);
    }

    public function store(Request $request) {
        $storeData = $request -> all();
        $validate = Validator::make($storeData, [
            'nama_customer' => 'required',
            'nama_menu' => 'required',
            'harga' => 'required',
            'jumlah_pesanan' => 'required',
            'status_pesanan' => 'nullable'
        ]);

        if($validate -> fails()) {
            return response(['message' => $validate -> errors()], 400);
        }

        $details = Detail_transaksi::create($storeData);
        return response([
            'message' => 'Berhasil menyimpan pesanan',
            'data' => $details
        ], 200);
    }

    public function update(Request $request, $find) {
        $details = Detail_transaksi::find($find);
        if(is_null($details)) {
            return response([
                'message' => 'Pesanan tidak ada',
                'data' => null
            ], 404);
        }

        $updateData = $request -> all();
        $validate = Validator::make($updateData, [
            'nama_customer' => 'required',
            'nama_menu' => 'required',
            'harga' => 'required',
            'jumlah_pesanan' => 'required',
            'status_pesanan' => 'nullable'
        ]);

        if($validate -> fails()) {
            return response(['message' => $validate -> errors()], 400);
        }

        $details -> nama_customer = $updateData['nama_customer'];
        $details -> nama_menu = $updateData['nama_menu'];
        $details -> harga = $updateData['harga'];
        $details -> jumlah_pesanan = $updateData['jumlah_pesanan'];
        $details -> status_pesanan = $updateData['status_pesanan'];

        if($details -> save()) {
            return response([
                'message' => 'Update pesanan berhasil',
                'data' => $details
            ], 200);
        }

        return response([
            'message' => 'Update pesanan gagal',
            'data' => null
        ], 404);
    }

    public function destroy($find){
        if(is_numeric($find)) {
            $details = Detail_transaksi::find($find);
        } else {
            $details = Detail_transaksi::where('nama_customer', '=', $find)->get();
        }

        if(is_null($details)){
            return response([
                'message' => 'Pesanan tidak ditemukan',
                'data' => null
            ], 404);
        }

        if($details -> each -> delete()){
            return response([
                'message' => 'Delete Pesanan Sukses',
                'data' => $details,
            ], 200);
        }
        return response([
            'message' => 'Delete Pesanan Gagal',
            'data' => null,
        ], 400);
    }
}
