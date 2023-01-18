@extends('layouts.admin')
@section('content')

@include('inc.message')

<a href="{{ route('admin.dish.create') }}">Добавить новое блюдо</a>




        <table class="table">
          <thead>
            <tr>
              <th scope="col">id</th>
              <th scope="col">Название блюда</th>
              <th scope="col">Картинка</th>
              <th scope="col">Рецепт</th>
              <th scope="col">время</th>
              <th scope="col">опыт</th>
              <th scope="col">описание</th>
              <th scope="col">Управление</th>
            </tr>
          </thead>
          <tbody>
            <tr>
@forelse($dishList as $dishList)
              <td>{{$dishList->id}}</td>
              <td>{{$dishList->name}}</td>

              <td> <img src="{{ Storage::url($dishList->image_url)}}" width='68' height='68'> </td>
              <td>{{$dishList->ingredient_one}}
                {{$dishList->amount_one}}<br>
                {{$dishList->ingredient_two}}
                {{$dishList->amount_two}}<br>
                {{$dishList->ingredient_three}}
                {{$dishList->amount_three}}<br>
                {{$dishList->ingredient_four}}
                {{$dishList->amount_four}}<br>
              </td>
              <td>{{$dishList->total_time}}</td>
              <td>{{$dishList->exp}}</td>
              <td>{{$dishList->description}}</td>
              <td> <a href="{{ route('admin.dish.edit', ['dish'=> $dishList->id]) }}">редактирование</a></td>
            </tr>
@empty
@endempty
@endsection
