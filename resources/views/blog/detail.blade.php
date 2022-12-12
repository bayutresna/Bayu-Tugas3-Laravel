@extends('template')
@section('title','Tugas 2 Blog')
@section('logo','Tugas 2 Postingan')
@section('konten_master')
@parent

<div class="row g-5">
  <div class="col-md-8">
    <article class="blog-post">
      <img src="{{asset($blog->foto)}}" alt="">
      <h2 class="blog-post-title mb-1">{{$blog->judul}}</h2>
      <p class="blog-post-meta">{{$blog->updated_at}} by <a href="#">{{$blog->penulis}}</a></p>
     <?php echo($blog->konten) ?>
    </article>
  </div>
  @include('blog.component.sidebar')
</div>
@endsection
