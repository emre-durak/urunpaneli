@extends("app.layout")

@section('content')
    
<h1>Ürün Düzenle</h1>

<form method="POST" action="{{route('urun.update',["urun" => $urun->id])}}">
    @csrf
    @method("put")
    <div class="form-group">
      <label for="exampleInputEmail1">Ürün Adı</label>
      <input type="text" name="name" class="form-control" id="exampleInputEmail1" value="{{$urun->urunad}}" aria-describedby="emailHelp">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Ürün Detay</label>
        <input type="text" name="description" class="form-control" id="exampleInputEmail1" value="{{$urun->urundetay}}" aria-describedby="emailHelp">
      </div>

    <button type="submit" class="btn btn-primary">Ürünü Güncelle</button>
  </form>

@endsection