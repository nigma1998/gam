@extends('layouts.admin')
@section('content')

@include('inc.message')

<a href="{{ route('admin.schablon.create') }}">Добавить новый шаблон</a>

        <table class="table">
          <thead>
            <tr>
              <th scope="col">id</th>
              <th scope="col">Картинка</th>
              <th scope="col">Управление</th>
            </tr>
          </thead>
          <tbody>
            <tr>
@forelse($schbList as $lis)
              <td>{{$lis->id}}</td>
              <td> <img src="{{ Storage::url($lis->url)}}" width='68' height='68'> </td>
              <td> <a href="{{ route('admin.schablon.edit', ['schablon'=> $lis->id]) }}">редактирование</a></td>
            </tr>
@empty
@endempty
@endsection
