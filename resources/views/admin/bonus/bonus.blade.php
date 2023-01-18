@extends('layouts.admin')
@section('content')

@include('inc.message')

<a href="{{ route('admin.bonus.create') }}">Добавить новый бонус</a>




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
@forelse($bonusList as $bonusList)
              <td>{{$bonusList->id}}</td>
              <td>{{$bonusList->name}}</td>

              <td> <img src="{{ Storage::url($bonusList->image_url)}}" width='68' height='68'> </td>
              <td>{{$bonusList->price}}  </td>
              <td>{{$bonusList->total_time}}</td>
              <td>{{$bonusList->exp}}</td>
              <td> <a href="{{ route('admin.bonus.edit', ['bonu'=> $bonusList->id]) }}">редактирование</a></td>
            </tr>
@empty
@endempty
@endsection
