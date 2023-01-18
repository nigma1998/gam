@extends('layouts.gamm')
@section('content')

<h1>Здесь вы можете ознакомиться с правилами оренды склада</h1>

<div class="card-body">
  <form  method="post" action="{{ route('stock.stock.store') }}" >
    @csrf


    <div class="form-group">

    <input  type="hidden" class="form-control" name="name" id="name" value="{{ Auth::user()->name }}">
    </div>

  <!--  <div class="form-group">
    <label for="image_url">Изображение</label>
    <input type="file" class="form-control" name="image_url" id="image_url">
    </div>
-->
    <button class="btn btn-primary">орендовать склад</button>

  </form>
</div>

@endsection
