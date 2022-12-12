
<div class="card border-[1px] " style="width: 18rem;">
  <img src="{{ asset($blog['foto']) }}" class="card-img-top img-fluid" alt="...">
  <div class="card-body px-[10px] bg-slate-400/30">
    <h5 class="card-title text-center text-[24px] font-[700] uppercase ">{{$blog['judul']}}</h5>
    <div class="konten text-[18px] font-[500] py-[20px]>
        <p class="card-text"><b>Penulis = </b> {{$blog['penulis']}}</p>
        <p class="card-text"> <?php echo substr($blog['konten'],0,50) . "...." ?> </p>
        <a href="{{route ('blog.detail',["id" => $blog->id]) }}" class="card-text"> continue reading.....</a>
    </div>
    <td>
        <!-- <a href="{{route ('blog.detail',["id" => $blog->id]) }}"><button class="btn btn-success">Detail</button></a> -->
        <a href="{{route ('blog.edit',["id" => $blog->id]) }}"><button class="btn btn-primary">Update</button></a>
        <a href="{{route ('blog.delete',["id" => $blog->id]) }}"><button class="btn btn-danger">Delete</button></a>
    </td>
  </div>
</div>
