@extends('template')
@section('title','Tugas 2')
@section('logo','Login')
@section('konten_master')
@parent

<form action="{{route('register')}}" method="post">
    @csrf

  <div class="mb-3">
    <label for="" class="form-label">Nama Lengkap</label>
    <input class="form-control" id="nama" name="nama">
  </div>

  <div class="mb-3">
    <label for="" class="form-label">Email</label>
    <input class="form-control" id="email" name="email">
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Password</label>
    <input type="password" class="form-control" id="password" name="password">
  </div>
  <button type="submit" class="btn btn-primary" >Submit</button>
</form>
@endsection

