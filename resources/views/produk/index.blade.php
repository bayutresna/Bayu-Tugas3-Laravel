@extends('template')
@section('title','Tugas 2 Produk')
@section('logo','Tugas 2 Produk')
@section('konten_master')
@parent

<div class="py-3 d-flex justify-content-center">
    <a href="{{route ('produk.create')}}"><button class="btn btn-primary">Tambah Produk</button></a>
</div>
<div class="container d-flex gap-5 flex-wrap">
@foreach($produks as $produk)
    @include('produk.component.card')
@endforeach
</div>
@endsection

