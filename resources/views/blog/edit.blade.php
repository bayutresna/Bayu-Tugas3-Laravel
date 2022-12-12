@extends('template')
@section('title','Tugas 2 Blog')
@section('logo','Tugas 2 Postingan')
@section('konten_master')
@parent
<div class="row g-5">
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
          <form action="{{ route('blog.update', ["id" => $blog->id]) }}" method = "post" enctype="multipart/form-data">
            @csrf
            @method('put')
              <div class="mb-4">
                  <label class="text-xl text-gray-600">Judul <span class="text-red-500">*</span></label></br>
                  <input type="text" class="border-2 border-gray-300 p-2 w-full" name="judul" id="title" value="{{$blog->judul}}" required>
              </div>
              <div class="mb-4">
                  <label class="text-xl text-gray-600">Penulis</label></br>
                  <input type="text" class="border-2 border-gray-300 p-2 w-full" name="penulis" id="description" value="{{$blog->penulis}}">
              </div>
              <div class="input-group">
                <span class="input-group-btn">
                  <input class="btn btn-primary" type="file" name="foto" multiple>
                </span>
              </div>
                <div class="mb-8">
                    <label class="text-xl text-gray-600">Konten <span class="text-red-500">*</span></label></br>
                    <textarea name="content" class="content border-2 border-gray-500">{{$blog->konten}}</textarea>
                </div>
                <div class="flex p-1 pt-3">
                    <button role="submit" class="btn btn-outline-primary" required>Submit</button>
                </div>
                <input type="hidden" value="{{$blog->id}}">
            </form>
        </div>
      </div>
    </div>
  </div>
</div>
  <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
  <script>
      CKEDITOR.replace( 'content' );
  </script>
@endsection
