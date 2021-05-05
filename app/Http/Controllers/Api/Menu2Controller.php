<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Menu2;
use Validator;

class Menu2Controller extends Controller
{
    //method untuk menampilkan semua data product (read)
    public function index() {
        $menus = Menu2::  join('bahans', 'menu.id_bahan', '=' ,'bahans.id') -> select('menu.*', 'bahans.*') -> get();
       // $menus = Menu::all();

        if(count($menus) > 0) {
            return response([
                'message' => 'Retrieve All Success',
                'data' => $menus
            ], 200);
        }

        return response([
            'message' => 'Empty',
            'data' => null
        ], 404);
    }

    //method untuk menampilkan 1 data product (search)
    public function show($find) {
        $menu = Menu2:: join('bahans', 'menu.id_bahan', '=' ,'bahans.id') -> select('menu.*', 'bahans.*') ->
                where('id_menu','like',$find,'or','nama_menu','like','%'.$find.'%')->get();

        if(!is_null($menu)) {
            return response([
                'message' => 'Retrive Menu Success',
                'data' => $menu
            ], 200);
        }

        return response([
            'message' => 'Menu Not Found',
            'data' => null
        ], 404);
    }

    //method untuk menambah 1 data product baru (create)
    public function store(Request $request) {
        $storeData = $request->all();
        $validate = Validator::make($storeData, [
            'nama_menu' => 'required',
            'id_bahan' => 'required|numeric',
            'kategori_menu' => 'required',
            'deskripsi_menu' => 'required',
            'harga' => 'required|numeric',
        ]);

        if($validate->fails())
            return response(['message' => $validate->errors()], 400);
        
        $menus = Menu2::create($storeData);
        return response([
            'message' => 'Add Menu Success',
            'data' => $menus
        ],200);
    }

    //method untuk menghapus 1 data product (delete)
    public function destroy($find) {
        $menu = Menu2::where('id_menu','like',$find,'or','nama_menu','like','%'.$find.'%');

        if(is_null($menu)) {
            return response([
                'message' => 'Menu Not Found',
                'data' => null
            ], 404);
        }

        if($menu->delete()) {
            return response([
                'message' => 'Delete Menu Success',
                'data' => $menu,
            ], 200);
        }
        return response([
            'message' => 'Delete Menu Failed',
            'data' => null
        ], 400);
    }

    //method untuk mengubah 1 data product (update)
    public function update(Request $request, $find) {

        $menu = Menu2::find($find);
        if(is_null($menu)) {
            return response([
                'message' => 'Menu Not Found',
                'data' => null
            ], 404);
        }

        $updateData = $request->all();
            $validate = Validator::make($updateData,[
                'nama_menu' => 'required',
                'kategori_menu' => 'required',
                'deskripsi_menu' => 'required',
                'harga' => 'required|numeric',
            ]);
    
      
        if($validate->fails())              
            return response(['message' => $validate->errors()],400);
   
        $menu->nama_menu = $updateData['nama_menu'];
        $menu->kategori_menu = $updateData['kategori_menu'];
        $menu->deskripsi_menu = $updateData['deskripsi_menu'];
        $menu->harga = $updateData['harga'];
        if($menu->save()){
            return response([
                'message' => 'Update menu Success',
                'data' => $menu,
            ],200);
        }
    } 
}
