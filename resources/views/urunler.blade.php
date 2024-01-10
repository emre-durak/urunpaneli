@extends("app.layout")

@section('content')

<div class="row">
    <div class="col d-flex justify-content-end">
        <a href="{{route("urun.create")}}" class="btn btn-primary">Ürün Ekle</a>
    </div>
</div>
<table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Ürün Adı</th>
        <th scope="col">Ürün Detay</th>
        <th scope="col">İşlemler</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($urunler as $urun)
      <tr>
        <th scope="row">{{$loop->iteration}}</th>
        <td>{{ $urun['name'] }}</td>
        <td>{{ $urun['description'] }}</td>

        <td class="d-flex">
            <a class="btn btn-info" href="{{ route('urun.edit',["urun" => $urun['id']]) }}">Düzenle</a>
            <form method="Post" action="{{ route('urun.destroy',["urun" => $urun['id']]) }}">
                @csrf
                @method("delete")
                <button class="btn btn-danger">Sil</button>
            </form>
        </td>
      </tr>
      <tr>
      @endforeach
    </tbody>
  </table>

@endsection