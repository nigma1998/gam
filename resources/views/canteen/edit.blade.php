@extends('layouts.gamm')
@section('content')

<div class="padtop_s">

</div>

<div class="block">
<div>

    <h3>Рецепты</h3>

</div>
<a href="{{ route('canteen.canteen.index') }}">Вернуться обратно</a>
<ul class="delim-list padtop_s">

    <li class="padtop_s first-li ">
      @foreach($dishList as $dishList)

      <div class="card-body">
        <form  method="post" action="{{ route('canteen.canteen.update', ['canteen'=> $canteen]) }}"  enctype="multipart/form-data">
          @csrf
          @method('put')
        <img class="icon" width="58" height="58" src="{{ Storage::url($dishList->image_url)}}"/>
        <div>
            <a href="/Reception/Treat?repIndex=1&roomIndex=1&t=637967616171613494&page=1">{{$dishList->product_name}}</a><span class="smallfont minor">, </span>
<span class="smallfont minor">(Ксюша, 24 года)</span><span class="smallfont minor">, </span>
<span class="smallfont minor">цена:</span>
<img width="16" height="16" alt="o" src="/Themes/images/coins2.png" />
<span class="smallfont minor">90</span>

        </div>

<div class="smallfont minor" style="margin-left:52px;">
<div>
    <span>Время прибывания:</span>
    <span class="ylwtitle">{{$dishList->total_time}}.</span>
</div>
<span>Опыт:</span>
<img width="16" height="16" src="{{ asset('storage/images/exp.png') }}"/><span class="money">{{$dishList->exp}}</span><span class="minor">, </span>
<span>Доход:</span>
<img width="16" height="16" src="/Themes/images/coins2.png"/>
<span class="money">550</span><span class="minor">, </span>
<div>
        <span class="minor">Ингридиенты:</span><img width="16" height="16" src="/Themes/images/potion.png"/><span>Скальпель (1/2936)</span><span>, </span><span>Святая вода (1/4541)</span><span>, </span><span>Успокоительное (2/3498)</span>
    </div>

</div>
<!-- здесь вывод перечень nps с последующим его записи в бд-->
    </li>


        <div class="form-group">

        <input type="hidden" class="form-control" name="product_name" id="product_name" value="{{$dishList->name}}">
        </div>

        <div class="form-group">
        <input type="hidden" class="form-control" name="ingredient_one" id="ingredient_one" value="{{$dishList->ingredient_one}}">
        </div>
        <div class="form-group">
        <input type="hidden" class="form-control" name="amount_one" id="amount_one" value="{{$dishList->amount_one}}">
        </div>
        <div class="form-group">
        <input type="hidden" class="form-control" name="ingredient_two" id="ingredient_two" value="{{$dishList->ingredient_two}}">
        </div>
        <div class="form-group">
        <input type="hidden" class="form-control" name="amount_two" id="amount_two" value="{{$dishList->amount_two}}">
        </div>
        <div class="form-group">
        <input type="hidden" class="form-control" name="ingredient_three" id="ingredient_three" value="{{$dishList->ingredient_three}}">
        </div>
        <div class="form-group">
        <input type="hidden" class="form-control" name="amount_three" id="amount_three" value="{{$dishList->amount_three}}">
        </div>
        <div class="form-group">
        <input type="hidden" class="form-control" name="ingredient_four" id="ingredient_four" value="{{$dishList->ingredient_four}}">
        </div>
        <div class="form-group">
        <input type="hidden" class="form-control" name="amount_four" id="amount_four" value="{{$dishList->amount_four}}">
        </div>
        <div class="form-group">
        <input type="hidden" class="form-control" name="ingredient_five" id="ingredient_five" value="{{$dishList->ingredient_five}}">
        </div>
        <div class="form-group">
        <input type="hidden" class="form-control" name="amount_five" id="amount_five" value="{{$dishList->amount_five}}">
        </div>
        <div class="form-group">
        <input type="hidden" class="form-control" name="ingredient_six" id="ingredient_six" value="{{$dishList->ingredient_six}}">
        </div>
        <div class="form-group">
        <input type="hidden" class="form-control" name="amount_six" id="amount_six" value="{{$dishList->amount_six}}">
        </div>

        <div class="form-group">

        <input type="hidden" class="form-control" name="total_time" id="total_time" value="{{$dishList->total_time}}">
        </div>
        <div class="form-group">

        <input type="hidden" class="form-control" name="exp" id="exp" value="{{$dishList->exp}}">
        </div>
        <div class="form-group">

        <input type="hidden" class="form-control" name="image_url" id="image_url" value="{{$dishList->image_url}}">
        </div>
        <div class="form-group">

        <input type="hidden" class="form-control" name="button" id="button" value="{{$dishList->button}}">
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
