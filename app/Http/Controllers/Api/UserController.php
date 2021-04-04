<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use app\User;
use Validator;

class UserController extends Controller
{
    public function index(){
        $users = User::all();
        if(count($users) > 0){
            return response([
                'message' => 'Berhasil menampilkan Pegawai',
                'data' => $users
            ], 200);
        }

        return response([
            'message' => "Kosong",
            'data' => null
        ], 404);
    }

    public function show($id){
        $users = User::find($id);
        if(!is_null($users)){
            return response([
                'message' => 'Berhasil menampilkan pegawai',
                'data' => $users
            ], 200);
        }

        return response([
            'message' => 'Pegawai tidak ditemukan',
            'data' => null
        ], 404);
    }

    public function update(Request $request, $id){
        $users = User::find($id);
        if(isnull($users)){
            return response([
                'message' => 'Pegawai tidak ditemukan',
                'data' => null
            ], 404);
        }

        $updateData = $request -> all();
        $validate = Validator::make($updateData, [
            'nama_pegawai' => 'required|max:60',
            'email_pegawai' => 'required|email:rfc, dns|unique:users',
            'password' => 'required',
            'kelamin_pegawai' => 'required',
            'posisi_pegawai' => 'required',
            'tanggal_bergabung' => 'required',
            'status_pegawai' => 'required',
        ]);

        if($validate -> fails())
            return response(['message' => $validate -> errors()], 400);
        
        $users -> nama_pegawai = $updateData['nama_pegawai'];
        $users -> email_pegawai = $updateData['email_pegawai'];
        $users -> password = $updateData['password'];
        $users -> kelamin_pegawai = $updateData['kelamin_pegawai'];
        $users -> posisi_pegawai = $updateData['posisi_pegawai'];
        $users -> tanggal_bergabung = $updateData['tanggal_bergabung'];
        $users -> status_pegawai = $updateData['status_pegawai'];

        if($users -> save()){
            return response([
                'message' => 'Update Pegawai Sukses',
                'data' => $users
            ], 200);
        }

        return response([
            'message' => 'Update Pegawai Gagal',
            'data' => null
        ], 400);
    }

    public function destroy($id){
        $users = User::find($id);

        if(is_null($users)){
            return response([
                'message' => 'Pegawai tidak ditemukan',
                'data' => null
            ], 404);
        }

        if($users -> delete()){
            return response([
                'message' => 'Delete Pegawai Sukses',
                'data' => $users,
            ], 200);
        }
        
        return response([
            'message' => 'Delete Pegawai Gagal',
            'data' => null,
        ], 400);
    }
}
