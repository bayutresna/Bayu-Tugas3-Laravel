<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pengguna;

class PenggunaController extends Controller
{
    function index(){
        $pengguna = Pengguna::query()->get();
        return response()->json([
            'status' => true,
            'message' => "",
            'data' => $pengguna->makehidden([
                'created_at',
                'id',
                'updated_at'
            ])
        ]);
    }

    function show($id){
        $pengguna = Pengguna::query()->where('id',$id)->first();
        if($pengguna == null){
            return response()->json([
                "status" =>false,
                "message" => "data tidak ditemukan",
                "data" => null
            ]);
        }
        return response()->json([
            "status" => true,
            "message"=> "",
            "data" => $pengguna
        ]);
    }

    function store(Request $request){
        $payload = $request->all();
        if(!isset($payload['nama'])){
            return response()->json([
                "status"=>false,
                "message"=>"nama tidak boleh kosong",
                "data"=> null
            ]);
        }
        if(!isset($payload['email'])){
            return response()->json([
                "status"=>false,
                "message"=>"email tidak boleh kosong",
                "data"=> null
            ]);
        }
        if(!isset($payload['password'])){
            return response()->json([
                "status"=>false,
                "message"=>"Password tidak boleh kosong",
                "data"=> null
            ]);
        }
        $pengguna = Pengguna::query()->create($payload);
        return response()->json([
            "status"=>true,
            "message"=>"",
            "data"=>$pengguna
        ]);
    }

    function update($id,Request $request){
        $pengguna = Pengguna::query()->where('id',$id)->first();
        if($pengguna == null){
            return response()->json([
                "status" =>false,
                "message" => "data tidak ditemukan",
                "data" => null
            ]);
        }
        $pengguna->fill($request->all());
        $pengguna->save();
        return response()->json([
            'status' => true,
            'message' => 'data telah berubah',
            "data"=> $pengguna
        ]);
    }

    function destroy($id){
        $delete =  Pengguna::query()->where("id", $id)->delete();
        return response()->json([
            'status' =>true,
            'message' => 'data telah dihapus'
        ]);
    }
}
