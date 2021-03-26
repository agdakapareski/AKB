<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Customer;
use Validator;

class CustomerController extends Controller
{
    public function index(){
        $customers = Customer::all();
        if(count($customers) > 0){
            return response([
                'message' => 'Retrieve All Success',
                'data' => $customers
            ], 200);
        }

        return response([
            'message' => 'Empty',
            'data' => null
        ], 404);
    }

    public function show($id){
        $customers = Customer::find($id);
        if(!is_null($customers)){
            return response([
                'message' => 'Retrieve Customer Success',
                'data' => $customers
            ], 200);
        }

        return response([
            'message' => 'Customer not found',
            'data' => null
        ], 404);
    }

    public function store(Request $request){
        $storeData = $request -> all();
        $validate = Validator::make($storeData, [
            'nama_customer' => 'required|max:60',
            'email_customer',
            'telepon_customer'
        ]);

        if($validate -> fails())
            return response(['message' => $validate -> errors()], 400);

        $customers = Customer::create($storeData);
        return response([
            'message' => 'Add Customer Success',
            'data' => $customers
        ], 200);
    }

    public function update(Request $request, $id){
        $customers = Customer::find($id);
        if(is_null($customers)){
            return response([
                'message' => 'Customer Not Found',
                'data' => null
            ], 404);
        }

        $updateData = $request -> all();
        $validate = Validator::make($updateData, [
            'nama_customer' => 'required|max:60',
            'email_customer',
            'telepon_customer'
        ]);

        if($validate -> fails())
            return response(['message' => $validate -> errors()], 400);
        
        $customers -> nama_customer = $updateData['nama_customer'];
        $customers -> email_customer = $updateData['email_customer'];
        $customers -> telepon_customer = $updateData['telepon_customer'];

        if($customers -> save()){
            return response([
                'message' => 'Update Customer Success',
                'data' => $customers
            ], 200);
        }

        return response([
            'message' => 'Update Customer Failed',
            'data' => null
        ], 400);
    }
}
