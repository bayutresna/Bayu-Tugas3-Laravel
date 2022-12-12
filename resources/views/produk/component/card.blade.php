
<div class="card border-[1px] " style="width: 18rem;">
  <img src="{{ asset($produk['foto']) }}" class="card-img-top" alt="...">
  <div class="card-body px-[10px] bg-slate-400/30">
    <h5 class="card-title text-center fs-3 uppercase "><b>{{$produk['nama']}}</b></h5>
    <div class="konten text-[18px] fs-6 py-4">
        <p class="card-text"><b>Deskripsi = </b> {{$produk['deskripsi']}}</p>
        <p class="card-text"><b>Harga = </b> {{$produk['harga']}}</p>
        <p class="card-text"><b>Stok = </b> {{$produk['stok']}}</p>
    </div>
    <td>
        <a href="{{route ('produk.edit',["id" => $produk->id]) }}"><button class="btn btn-primary">Update</button></a>
        <a href="{{route ('produk.delete',["id" => $produk->id]) }}"><button class="btn btn-danger">Delete</button></a>
    </td>
  </div>
</div>
