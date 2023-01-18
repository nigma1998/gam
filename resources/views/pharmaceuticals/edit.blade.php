@extends('layouts.gamm')
@section('content')

<div class="padtop_s">

</div>

<div class="block">
<div>

    <h3>Медикоменты</h3>

</div>
<a href="{{ route('pharmaceuticals.pharmaceuticals.index') }}">Вернуться обратно</a>
<ul class="delim-list padtop_s">

    <li class="padtop_s first-li ">
      @foreach($deliveryList as $deliveryList)

      <div class="card-body">
        <form  method="post" action="{{ route('pharmaceuticals.pharmaceuticals.update', ['pharmaceutical'=> $pharmaceuticals]) }}"  enctype="multipart/form-data">
          @csrf
          @method('put')
        <img class="icon" width="58" height="58" src="{{ Storage::url($deliveryList->image_url)}}"/>
        <div>
            <a href="/Reception/Treat?repIndex=1&roomIndex=1&t=637967616171613494&page=1">{{$deliveryList->product_name}}</a><span class="smallfont minor">, </span>
<span class="smallfont minor">(Ксюша, 24 года)</span><span class="smallfont minor">, </span>
<span class="smallfont minor">цена:</span>
<img width="16" height="16" alt="o" src="/Themes/images/coins2.png" />
<span class="smallfont minor">90</span>

        </div>

<div class="smallfont minor" style="margin-left:52px;">
<div>
    <span>Время прибывания:</span>
    <span class="ylwtitle">{{$deliveryList->total_time}}.</span>
</div>
<span>Опыт:</span>
<img width="16" height="16" src="{{ asset('storage/images/exp.png') }}"/><span class="money">{{$deliveryList->exp}}</span><span class="minor">, </span>
<span>Доход:</span>
<img width="16" height="16" src="/Themes/images/coins2.png"/>
<span class="money">{{$deliveryList->income}}</span><span class="minor">, </span>


</div>
<!-- здесь вывод перечень  с последующим его записи в бд-->
    </li>

    @php

    $date = date("Y-m-d H:i:s");

    @endphp
    <div class="form-group">

    <input type="hidden" class="form-control" name="product_name" id="product_name" value="{{ $deliveryList->product_name }}">
    </div>
    <div class="form-group">
      <div class="form-group">

      <input type="hidden" class="form-control" name="image_url" id="image_url" value="{{ $deliveryList->image_url}}">
      </div>
      <div class="form-group">

    <input type="hidden" class="form-control" name="income" id="income" value="{{ $deliveryList->income }}">
    </div>
    <div class="form-group">

    <input type="hidden" class="form-control" name="total_time" id="total_time" value="{{ $deliveryList->total_time}}">
    </div>
    <div class="form-group">

    <input type="hidden" class="form-control" name="exp" id="exp" value="{{ $deliveryList->exp }}">
    </div>
    <div class="form-group">

    <input type="hidden" class="form-control" name="price" id="price" value="{{ $deliveryList->price }}">
    </div>
    <div class="form-group">

    <input type="hidden" class="form-control" name="total_time" id="total_time" value="{{ $deliveryList->total_time }}">
    </div>
    <div class="form-group">

    <input type="hidden" class="form-control" name="amount" id="amount" value="{{ $deliveryList->amount }}">
    </div>
    <div class="form-group">

    <input type="hidden" class="form-control" name="dat" id="dat" value="{{$date}}">
    </div>


        <button class="btn btn-primary">Сохранить</button>


      </form>
      @endforeach

</ul>
<div class="padtop_m">
    <img width="16" height="16" src="/Themes/images/Book.png"/>
    <a href="/Patients">Просмотр всех видов пациентов</a>
</div>
</div>
<div class="game_actions">
<div class="delim">
    <div style="width:25%;">
    </div>
</div>

@endsection
