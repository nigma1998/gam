@extends('layouts.admin')
@section('content')

@include('inc.message')

<a href="{{ route('admin.medicines.create') }}">Добавить новый медикомент</a>




        <table class="table">
          <thead>
            <tr>
              <th scope="col">id</th>
              <th scope="col">Название медикомента</th>
              <th scope="col">Картинка</th>
              <th scope="col">Доход</th>
              <th scope="col">Время</th>
              <th scope="col">Опыт</th>
              <th scope="col">Цена</th>
              <th scope="col">Количество</th>
              <th scope="col">Управление</th>
            </tr>
          </thead>
          <tbody>
            <tr>
@forelse($medicomentList as $medicomentList)
              <td>{{$medicomentList->id}}</td>
              <td>{{$medicomentList->product_name}}</td>
              <td> <img src="{{ Storage::url($medicomentList->image_url)}}" width='68' height='68'> </td>
              <td>{{$medicomentList->income}}  </td>
              <td>{{$medicomentList->total_time}}</td>
              <td>{{$medicomentList->exp}}</td>
              <td>{{$medicomentList->price}}</td>
              <td>{{$medicomentList->amount}}</td>
              <td> <a href="{{ route('admin.medicines.edit', ['medicine'=> $medicomentList->id]) }}">редактирование</a></td>
            </tr>
@empty
@endempty
@endsection
