@extends('template')
@section('title','Tugas 2')
@section('logo','Login')
@section('konten_master')
@parent

@if($errors->any())
    <h1 style="color:blue; background:red">
        {{$errors->first()}}
    </h1>
@endif

<form action="{{route('login')}}" method="post">
    @csrf
  <div class="mb-3">
    <label for="" class="form-label">Email</label>
    <input class="form-control" id="username" name="email">
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Password</label>
    <input type="password" class="form-control" id="password" name="password">
  </div>
  <button type="submit" class="btn btn-primary" >Submit</button>
</form>

<div class="mb-3">
  <label for="" class="form-label">Belum Punya Akun?</label>
   <a  href="{{ route('register') }}">Buat dulu yuk!</a>
</div>

@endsection
