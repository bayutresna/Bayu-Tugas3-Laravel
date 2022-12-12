<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use Illuminate\Support\Facades\File;

class ProdukController extends Controller
{
    function index(){
        $produks = Produk::query()
            ->get();
        return view('produk.index',["produks" => $produks]);
    }

    function create(){
        return view('produk.create');
    }

    function insert(Request $request){

        $file= $request->file("foto");
        // $file->storeAs('public/imageproduk', $file->hashName());

        $filename = $file->hashName();
        $file->move("foto",$filename);
        $path = $request->getSchemeAndHttpHost()."foto/".$filename;
        $path2 = str_replace($request->getSchemeAndHttpHost(),"",$path);
        // dd([$path,$path2]);
        $payload = [
            "nama" => $request->input("nama"),
            "deskripsi" => $request->input("deskripsi"),
            "harga" => $request->input("harga"),
            "stok" => $request->input("stok"),
            "foto"=> $path2
        ];

        produk::query()->create($payload);
        return redirect('produk');
    }


    function edit($id){
        $produks =Produk::query()->where('id',$id)->first();
        return view('produk.edit', ['produk'=> $produks]);
    }
    //post update
    function update(Request $request){
        $produks = Produk::query()->where('id',$request->id)->first();

        $file= $request->file("foto");

        $filename = $file->hashName();
        $file->move("foto",$filename);

        $path = $request->getSchemeAndHttpHost()."foto/".$filename;
        $path2 = str_replace($request->getSchemeAndHttpHost(),"",$path);
        //  dd([$path,$path2]);
        unlink($produks->foto);


        $produks->fill($request->all());
        $produks->foto = $path2;
        $produks->save();
        // dd([$path,$path2]);
        return redirect('produk');
    }

    function delete($id){

        $produks = Produk::query()->where("id", $id)->first();
        unlink($produks->foto);

        $delete =  Produk::query()->where("id", $id)->delete();
        return redirect('produk');
    }
}
