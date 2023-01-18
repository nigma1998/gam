@extends('layouts.admin')
@section('content')
@include('inc.message')
        <table class="table">
          <thead>
            <tr>
              <th scope="col">id</th>
              <th scope="col">ник</th>
              <th scope="col">емайл</th>
              <th scope="col">уровень</th>
              <th scope="col">клан</th>
              <th scope="col">Название клана</th>
              <th scope="col">Управление</th>
            </tr>
          </thead>
          <tbody>
            <tr>
@forelse($usersList as $usersLis)
              <td>{{$usersLis->id}}</td>
              <td>{{$usersLis->name}}</td>
              <td>{{$usersLis->email}}</td>
              <td>{{$usersLis->lvl}}</td>
              <td>{{$usersLis->klan}}</td>
              <td>{{$usersLis->klans_name}}</td>
              <td> <a href="{{ route('admin.users.edit', ['user'=> $usersLis->id]) }}">редактирование</a></td>
            </tr>
@empty
@endempty

@endsection
