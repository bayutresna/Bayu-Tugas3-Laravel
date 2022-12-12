@extends('template')
@section('title','Tugas 2 Produk')
@section('konten_master')
@parent
<form action="{{ route('produk.insert')}}" method = "post" enctype="multipart/form-data">
@csrf
  <div class="mb-3">
    <label for="nama" class="form-label">Nama Produk</label>
    <input type="text" class="form-control" id="nama" aria-describedby="emailHelp" name= "nama">
  </div>
  <div class="mb-3">
    <label for="deskripsi" class="form-label">Deskripsi Produk</label>
    <textarea class="form-control" id="deskripsiproduk" name="deskripsi"> </textarea>
  </div>
  <div class="mb-3">
    <label for="harga" class="form-label">Harga Produk</label>
    <input type="text" class="form-control" id="harga" name= "harga">
  </div>
  <div class="mb-3">
    <label for="stok" class="form-label">Banyak Stok</label>
    <input type="text" class="form-control" id="stok" name= "stok">
  </div>
  <div class="mb-3">
      <label for="" class="form-label">Upload Foto Produk</label>
      <input type="file" class="form-control" id="imgname" name="foto"> </input>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
