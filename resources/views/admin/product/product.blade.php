@extends('layouts.admin')
@section('content')

@include('inc.message')


<a href="{{ route('admin.product.create') }}">Добавить новый продукт</a>




        <table class="table">
          <thead>
            <tr>
              <th scope="col">id</th>
              <th scope="col">Название продукта</th>
              <th scope="col">Картинка</th>
              <th scope="col">Номер продукта</th>
              <th scope="col">Управление</th>
            </tr>
          </thead>
          <tbody>
            <tr>
@forelse($productList as $productList)
              <td>{{$productList->id}}</td>
              <td>{{$productList->name}}</td>
              <td> <img src="{{ Storage::url($productList->image_url)}}" width='68' height='68'> </td>
              <td>{{$productList->room}}</td>
              <td> <a href="{{ route('admin.product.edit', ['product'=> $productList->id]) }}">редактирование</a></td>
            </tr>
            @empty
            @endempty

@endsection
