@extends("app.layout")

@section('content')
    
<h1>Ürün Ekle</h1>

<form method="POST" action="{{route('urun.store')}}">
    @csrf
    <div class="form-group">
      <label for="exampleInputEmail1">Ürün Adı</label>
      <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Ürün Detay</label>
        <input type="text" name="description" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>

    <button type="submit" class="btn btn-primary">Ürünü Ekle</button>
  </form>

@endsection