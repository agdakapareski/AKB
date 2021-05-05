<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Menu;
use Validator;

class MenuController extends Controller
{
    public function index(){
        $menus = Menu::join('bahans', 'menus.id_bahan', '=' ,'bahans.id') -> select('menus.*', 'bahans.*') -> get();
        if(count($menus) > 0) {
            return response([
                'message' => 'Berhasil menampilkan menu',
                'data' => $menus
            ], 200);
        }

        return response([
            'message' => 'Kosong',
            'data' => null
        ], 404);
    }

    public function showMobile(){
        $menus = Menu::all();
        if(count($menus) > 0) {
            return response(
                $menus
            , 200);
        }
    }

    public function show($id) {
        $menus = Menu::find($id);
        if(!is_null($menus)) {
            return response([
                'message' => 'Hasil pencarian Menu',
                'data' => $menus
            ], 200);
        }

        return response([
            'message' => 'Menu tidak ditemukan',
            'data' => null
        ], 404);
    }

    public function store(Request $request) {
        $storeData = $request -> all();
        $validate = Validator::make($storeData, [
            'nama_menu' => 'required',
            'id_bahan' => 'required|numeric',
            'kategori_menu' => 'required',
            'deskripsi_menu' => 'required',
            'harga' => 'required|numeric'
        ]);

        if($validate -> fails()) {
            return response(['message' => $validate -> errors()], 400);
        }

        $menus = Menu::create($storeData);
        return response([
            'message' => 'Tambah menu sukses',
            'data' => $menus
        ], 200);
    }

    public function update(Request $request, $id) {
        $menus = Menu::find($id);
        if(is_null($menus)) {
            return response([
                'message' => 'Menu tidak ditemukan',
                'data' => null
            ], 404);
        }

        $updateData = $request -> all();
        $validate = Validator::make($updateData, [
            'nama_menu' => 'required',
            'id_bahan' => 'required|numeric',
            'kategori_menu' => 'required',
            'deskripsi_menu' => 'required',
            'harga' => 'required|numeric'
        ]);

        if($validate -> fails()) {
            return response(['message' => $validate -> errors()], 400);
        }

        $menus -> nama_menu = $updateData['nama_menu'];
        $menus -> id_bahan = $updateData['id_bahan'];
        $menus -> kategori_menu = $updateData['kategori_menu'];
        $menus -> deskripsi_menu = $updateData['deskripsi_menu'];
        $menus -> harga = $updateData['harga'];

        if($menus -> save()) {
            return response([
                'message' => 'Update menu berhasil',
                'data' => $menus
            ], 200);
        }

        return response([
            'message' => 'Update menu gagal',
            'data' => null
        ], 400);
    }

    public function destroy($id) {
        $menus = Menu::find($id);

        if(is_null($menus)) {
            return response([
                'message' => 'Menu tidak ditemukan',
                'data' => null
            ], 404);
        }

        if($menus -> delete()) {
            return response([
                'message' => 'Delete menu berhasil',
                'data' => $menus
            ], 200);
        }

        return response([
            'message' => 'Delete menu gagal',
            'data' => null
        ], 400);
    }
}
