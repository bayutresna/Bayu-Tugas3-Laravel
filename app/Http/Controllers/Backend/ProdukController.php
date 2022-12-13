<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produk;
use Illuminate\Support\Facades\File;

class ProdukController extends Controller
{
    function index(){
        $produk = Produk::query()->get();
        return response()->json([
            'status' => true,
            'message' => "",
            'data' => $produk->makehidden([
                'created_at',
                'updated_at'
            ])
        ]);
    }

    function show($id){
        $produk = Produk::query()->where('id',$id)->first();
        if($produk == null){
            return response()->json([
                "status" =>false,
                "message" => "data tidak ditemukan",
                "data" => null
            ]);
        }
        return response()->json([
            "status" => true,
            "message"=> "",
            "data" => $produk
        ]);
    }

    function store(Request $request){

        $file= $request->file("foto");
        // $file->storeAs('public/imageproduk', $file->hashName());

        $filename = $file->hashName();
        $file->move("foto",$filename);
        $path = $request->getSchemeAndHttpHost()."foto/".$filename;
        $path2 = str_replace($request->getSchemeAndHttpHost(),"",$path);

        $payload = $request->all();
        $payload->foto = $path2;

        // if(!isset($payload['nama'])){
        //     return response()->json([
        //         "status"=>false,
        //         "message"=>"nama tidak boleh kosong",
        //         "data"=> null
        //     ]);
        // }
        // if(!isset($payload['email'])){
        //     return response()->json([
        //         "status"=>false,
        //         "message"=>"email tidak boleh kosong",
        //         "data"=> null
        //     ]);
        // }
        // if(!isset($payload['password'])){
        //     return response()->json([
        //         "status"=>false,
        //         "message"=>"Password tidak boleh kosong",
        //         "data"=> null
        //     ]);
        // }
        $produk = Produk::query()->create($payload);
        return response()->json([
            "status"=>true,
            "message"=>"",
            "data"=>$produk
        ]);
    }

    function update($id,Request $request){
        $produk = Produk::query()->where('id',$id)->first();
        if($produk == null){
            return response()->json([
                "status" =>false,
                "message" => "data tidak ditemukan",
                "data" => null
            ]);
        }
        unlink($produk->foto);
        $file= $request->file("foto");

        $filename = $file->hashName();
        $file->move("foto",$filename);

        $path = $request->getSchemeAndHttpHost()."foto/".$filename;
        $path2 = str_replace($request->getSchemeAndHttpHost(),"",$path);

        $produk->fill($request->all());
        $produk->foto = $path2;
        $produk->save();
        return response()->json([
            'status' => true,
            'message' => 'data telah berubah',
            "data"=> $produk
        ]);
    }

    function destroy($id){
        $produk =  Produk::query()->where("id", $id)->first();
        unlink($produk->foto);
        $delete->Produk::query()->where('id',$id)->delete();
        return response()->json([
            'status' =>true,
            'message' => 'data telah dihapus'
        ]);
    }
}
