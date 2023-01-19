@extends('layouts.gamm')
@section('content')
    <div>

<div class="caption">
    <h1>Приемная</h1>
</div>
<div class="content">
    <div class="padtop_s">

</div>

<div class="block">
    <div>

        <h3>Ожидающие пациент</h3>

    </div>
    <a href="{{ route('gem.gem.index') }}">Вернуться обратно</a>
    <ul class="delim-list padtop_s">

        <li class="padtop_s first-li ">
          @foreach($npsListt as $lafLis)
          @php
          $exp = $lafLis->exp * 3;
          $coins = $lafLis->coins * 3;
      @endphp
          <div class="card-body">
            <form  method="post" action="{{ route('ambulance.ambulance.update', ['ambulance'=> $ambulance]) }}"  enctype="multipart/form-data">
              @csrf
              @method('put')
            <img class="icon" width="58" height="58" src="{{ Storage::url($lafLis->image_url)}}"/>
            <div>
                {{$lafLis->product_name}} <span class="smallfont minor"> </span>
<span class="smallfont minor">(Андрей, 24 года)</span><span class="smallfont minor">, </span>


            </div>

<div class="smallfont minor" style="margin-left:52px;">
    <div>
        <span>Время прибывания:</span>
        <span class="ylwtitle">{{$lafLis->total_time}}.</span>
    </div>
    <span>Опыт:</span>
    <img width="16" height="16" src="{{ asset('public/storage/images/exp.png') }}"/><span class="money">{{$exp}}</span><span class="minor">, </span>
    <span>Доход:</span>
    <img width="16" height="16" src="{{ asset('public/storage/images/moni.jpg') }}"/>
    <span class="money">{{$coins}}</span><span class="minor">, </span>

</div>
<!-- здесь вывод перечень nps с последующим его записи в бд-->
      </li>


            <div class="form-group">

            <input type="hidden" class="form-control" name="product_name" id="product_name" value="{{$lafLis->product_name}}">
            </div>
            <div class="form-group">

            <input type="hidden" class="form-control" name="total_time" id="total_time" value="{{$lafLis->total_time}}">
            </div>
            <div class="form-group">

            <input type="hidden" class="form-control" name="exp" id="exp" value="{{$exp}}">
            </div>
            <div class="form-group">

            <input type="hidden" class="form-control" name="image_url" id="image_url" value="{{$lafLis->image_url}}">
            </div>
            <div class="form-group">

            <input type="hidden" class="form-control" name="button" id="button" value="{{$lafLis->button}}">
            </div>

            <div class="form-group">

                <input type="hidden" class="form-control" name="complaint_button" id="complaint_button" value="{{$lafLis->complaint_button}}">
                </div>
            <div class="form-group">

                 <input type="hidden" class="form-control" name="inspection_button" id="inspection_button" value="{{$lafLis->inspection_button}}">
                </div>
            <div class="form-group">

                  <input type="hidden" class="form-control" name="button_treatment" id="button_treatment" value="{{$lafLis->button_treatment}}">
                  </div>
                  <div class="form-group">

                    <input type="hidden" class="form-control" name="coins" id="coins" value="{{$coins}}">
                    </div>
            <div class="form-group">

                  <input type="hidden" class="form-control" name="drink_button" id="drink_button" value="{{$lafLis->drink_button}}">
                  </div>

            <button class="btn btn-primary">Принять</button>


          </form>
          @endforeach

    </ul>
   

</div>

    </div>

@endsection