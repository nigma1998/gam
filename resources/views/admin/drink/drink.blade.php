@extends('layouts.admin')
@section('content')

@include('inc.message')

<a href="{{ route('admin.drinks.create') }}">Добавить новый напиток</a>




        <table class="table">
          <thead>
            <tr>
              <th scope="col">id</th>
              <th scope="col">Название доставки</th>
              <th scope="col">Картинка</th>
              <th scope="col">Цена</th>
              <th scope="col">время</th>
              <th scope="col">опыт</th>
              <th scope="col">Управление</th>
            </tr>
          </thead>
          <tbody>
            <tr>
            @forelse($drinkList as $drinkList)
            <td>{{$drinkList->id}}</td>
            <td>{{$drinkList->name}}</td>

            <td> <img src="{{ Storage::url($drinkList->image_url)}}" width='68' height='68'> </td>
            <td>{{$drinkList->price}}  </td>
            <td>{{$drinkList->total_time}}</td>
            <td>{{$drinkList->exp}}</td>
            <td> <a href="{{ route('admin.drinks.edit', ['drink'=> $drinkList->id]) }}">редактирование</a></td>
            </tr>
@empty
@endempty
@endsection
