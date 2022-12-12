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

    <label for="email"> Email : </label>
    <input type="text" class="text" id="email" placeholder="email" name="email">

    <label for="password"> Password : </label>
    <input type="password" class="" id="password" name="password">

    <button type="submit"> Login</button>
</form>
@endsection
