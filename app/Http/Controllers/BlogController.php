<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Facades\File;
class BlogController extends Controller
{
    function index(){
        $blogs = Blog::query()
            ->get();
        return view('blog.index',["blogs" => $blogs]);
    }

    function create(){
        return view('blog.create');
    }

    function insert(Request $request){
        if($request->file('foto') == null)
        {
            $path2 = "-";
        } else
        {
            $file= $request->file("foto");
            // $file->storeAs('public/imageblog', $file->hashName());

            $filename = $file->hashName();
            $file->move("foto",$filename);
            $path = $request->getSchemeAndHttpHost()."foto/".$filename;
            $path2 = str_replace($request->getSchemeAndHttpHost(),"",$path);
            // dd([$path,$path2]);
        }

        $payload = [
            "judul" => $request->input('judul'),
            "penulis" => $request->input('penulis'),
            "konten" => $request->input('content'),
            "foto"=> $path2
        ];

        Blog::query()->create($payload);
        return redirect('blog');
    }


    function edit($id){
        $blogs =Blog::query()->where('id',$id)->first();
        return view('blog.edit', ['blog'=> $blogs]);
    }
    //post update
    function update(Request $request){
        $blogs = Blog::query()->where('id',$request->id)->first();

        $file= $request->file("foto");

        $filename = $file->hashName();
        $file->move("foto",$filename);

        $path = $request->getSchemeAndHttpHost()."foto/".$filename;
        $path2 = str_replace($request->getSchemeAndHttpHost(),"",$path);
        //  dd([$path,$path2]);
        unlink($blogs->foto);


        $blogs->fill($request->all());
        $blogs->foto = $path2;
        $blogs->save();
        // dd([$path,$path2]);
        return redirect('blog');
    }

    function delete($id){

        $blogs = Blog::query()->where("id", $id)->first();

        if($blogs->foto != "-"){
            unlink($blogs->foto);
        }

        $delete =  Blog::query()->where("id", $id)->delete();
        return redirect('blog');
    }

    function detail($id){
        $blogs = Blog::query()->where("id", $id)->first();
        return view('blog.detail',['blog'=> $blogs]);
    }
}
