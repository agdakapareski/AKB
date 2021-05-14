<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Kartu;
use Validator;

class KartuController extends Controller
{
    public function index() {
        $kartus = Kartu::all();
        if(count($kartus) > 0) {
            return response([
                'message' => 'Berhasil menampilkan Daftar Kartu',
                'data' => $kartus
            ], 200);
        }

        return response([
            'message' => 'Daftar Kartu kosong',
            'data' => null
        ], 404);
    }

    public function show($find) {
        $kartus = Kartu::find($find);
        if(!is_null($kartus)) {
            return response([
                'message' => 'Berhasil menampilkan data kartu',
                'data' => $kartus
            ], 200);
        }

        return response([
            'message' => 'Data kartu tidak ada',
            'data' => null
        ], 404);
    }

    public function store(Request $request) {
        $storeData = $request -> all();
        $validator = Validator::make($storeData, [
            'jenis_kartu' => 'required',
            'nama_pemilik_kartu' => 'required',
            'nomor_kartu' => 'required',
            'exp_date_kartu' => 'required',
        ]);

        if($validator -> fails())
            return response(['message' => $validator -> errors()], 400);
        
        $kartus = Kartu::create($storeData);

        return response([
            'message' => 'Berhasil menyimpan data kartu',
            'data' => $kartus
        ], 200);
    }
}
