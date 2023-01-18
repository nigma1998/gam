@extends('layouts.admin')
@section('content')

@include('inc.message')

<a href="{{ route('admin.nps.create') }}">Добавить нового nps</a>




        <table class="table">
          <thead>
            <tr>
              <th scope="col">id</th>
              <th scope="col">Название болезни</th>
              <th scope="col">Картинка</th>
              <th scope="col">время</th>
              <th scope="col">опыт</th>
              <th scope="col">описание</th>
              <th scope="col">медикоменты</th>
              <th scope="col">кнопка на выслушать жалобу</th>
              <th scope="col">кнопка произвести осмотр</th>
              <th scope="col">кнопка на курс лечения</th>
              <th scope="col">кнопка на корм</th>
              <th scope="col">Управление</th>
            </tr>
          </thead>
          <tbody>
            <tr>
@forelse($npsList as $npsLis)
              <td>{{$npsLis->id}}</td>
              <td>{{$npsLis->product_name}}</td>

              <td> <img src="{{ Storage::url($npsLis->image_url)}}" width='68' height='68'> </td>

              <td>{{$npsLis->total_time}}</td>
              <td>{{$npsLis->exp}}</td>
              <td>{{$npsLis->description}}</td>
              <td>{{$npsLis->drug_one}}
                {{$npsLis->amount_one}}<br>
                {{$npsLis->drug_two}}
                {{$npsLis->amount_two}}<br>
                {{$npsLis->drug_three}}
                {{$npsLis->amount_three}}<br>
                {{$npsLis->drug_four}}
                {{$npsLis->amount_four}}<br>
                {{$npsLis->drug_five}}
                {{$npsLis->amount_five}}<br>
                {{$npsLis->drug_six}}
                {{$npsLis->amount_six}}<br>
              </td>
              <td>{{$npsLis->complaint_button}}</td>
              <td>{{$npsLis->inspection_button}}</td>
              <td>{{$npsLis->button_treatment}}</td>
              <td>{{$npsLis->drink_button}}</td>
              <td> <a href="{{ route('admin.nps.edit', ['np'=> $npsLis->id]) }}">редактирование</a></td>
            </tr>
@empty
@endempty
@endsection

