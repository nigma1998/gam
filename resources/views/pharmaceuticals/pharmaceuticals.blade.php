@extends('layouts.gamm')
@section('content')

<div class="content">
    <div class="block">
@include('inc.message')
    <div>
        <img width="16" height="16" src="/Themes/images/refresh.png"/>
        <a href="{{ route('pharmaceuticals.pharmaceuticals.index') }}">Обновить</a>
        <a href="{{ url('home') }}">Домой</a>
    </div>

    <ul class="delim-list padtop_s">
      @foreach($lab as $lafLis)

      @if($lafLis->total_time = $lafLis->total_time)
      <li class="padtop_s first-li">
              <td> <img class="icon" width="48" height="48" src="{{ Storage::url($lafLis->image_url)}}"/> </td>
          <div class="row">
              <div>

<span class="minor smallfont">
  <div class="spravca"> <input type="checkbox" id="{{ $lafLis->id }}" class="reference"/>
<span class="patienttitle">{{ $lafLis->product_name }}</span>

</div>
<div>

@php
// реализация самого таймера
$timeh = date('H', strtotime($lafLis->updated_at));
$timei = date('i', strtotime($lafLis->updated_at));
$times = date('s', strtotime($lafLis->updated_at));

// за основу взята функция mktime
$s = $times; // переменная секунда
$x = $timeh;// переменная час
$r = $timei + $lafLis->total_time;// переменная минуты здесь же мы прибовляем время которая храниться в бд
$m = date("m", strtotime($lafLis->updated_at));// переменная месяц
$e = date("d", strtotime($lafLis->updated_at));// переменная день
$i = date("Y", strtotime($lafLis->updated_at));// переменная год

$endOfDiscount = mktime($x,$r,$s,$m,$e,$i);
@endphp
@switch($lafLis->identifier)
@case(1)
@if($lafLis->delivery <= 0)
<a href="{{ route('gem.button.edit', ['button'=> $lafLis->id]) }}">Выбрать способ доставки</a>
@else
<form  method="post" action="{{ route('gem.button.update', ['button'=> $lafLis->id]) }}" onchange="this.form.submit()"  enctype="multipart/form-data">
  @csrf
  @method('put')
  <div class="form-group">
  <input type="hidden" class="form-control" name="identifier" id="identifier" value="2">
  </div>
  <button class="btn btn-primary">Оформить заказ</button>
</form>


@endif


@break

     @default(2)

@php
$now = time(); // текущее время
$secondsRemaining = $endOfDiscount - $now; // оставшееся время

$minut;
$hour;
$day;

$daysRemaining = floor($secondsRemaining / $day); //дни, до даты
$secondsRemaining -= ($daysRemaining * $day);     //обновляем переменную

$hoursRemaining = floor($secondsRemaining / $hour); // часы до даты
$secondsRemaining -= ($hoursRemaining * $hour);     //обновляем переменную

$minutesRemaining = floor($secondsRemaining / $minut); //минуты до даты
$secondsRemaining -= ($minutesRemaining * $minut);     //обновляем переменную
@endphp

@if ($daysRemaining > -1)
  До окончания

    @if($daysRemaining > 0)
    {{$daysRemaining}} д,
    @else

    @endif
    @if($hoursRemaining > 0)
    {{$hoursRemaining}} ч,
    @else

    @endif
    @if($minutesRemaining > 0)
     {{$minutesRemaining}} минут,
     @else

     @endif
     @if($secondsRemaining > 0)
     {{$secondsRemaining}} секунда
     @else

     @endif
   </span>                    </div>
                 <div>

@php
$tameh = date('H', strtotime($lafLis->dat));
$tamei = date('i', strtotime($lafLis->dat));
$tames = date('s', strtotime($lafLis->dat));




$sar = $tames;
$xix = $tameh;
$rar = $tamei + Auth::user()->button;
$mab = date("m", strtotime($lafLis->dat));
$ey = date("d", strtotime($lafLis->dat));
$ir = date("Y", strtotime($lafLis->dat));

  $end = mktime($xix,$rar,$sar,$mab,$ey,$ir);
  $naw = time(); // текущее время
  $ref = $end - $naw; // оставшееся время

  $minut;
  $hour;
  $day;

  $days = floor($ref / $day); //дни, до даты
  $ref -= ($days * $day);     //обновляем переменную

  $hours = floor($ref / $hour); // часы до даты
  $ref -= ($hours * $hour);     //обновляем переменную

  $minutes = floor($ref / $minut); //минуты до даты
  $ref -= ($minutes * $minut);     //обновляем переменную
@endphp


  @if ($days > -1)
  <div class='blog'>До следующего опроса
    @if($days > 0)
    {{$days}} д,
    @else

    @endif

    @if($hours > 0)
    {{$hours}} ч,
    @else

    @endif

    @if($minutes > 0)
    {{$minutes}} минут,
    @else

    @endif

    @if($ref > 0)
     {{$ref}} секунда
     @else

     @endif



  @else
</div>


    <form  method="post" action="{{ route('gem.button.update', ['button'=> $lafLis->id]) }}"  enctype="multipart/form-data">
      @csrf
      @method('put')


  @php
    // здесь реализуеться сокращение таймера
  $daysRemaining * 24; // преобразовываем день в час
  $hoursRemaining;
  $plus = $daysRemaining + $hoursRemaining * 60;
  $minutesRemaining;
  $peremenaj = $plus + $minutesRemaining ;

  $tare = 5; // условное значени позже будет переписанно на значение из бд

  $arrr = $peremenaj - $tare; // вычитаем из общего время нужную сумму
  $aq = $arrr; // результат присваиваем этой переменной и вносим в бд

  @endphp
      <div class="form-group">
      <input type="hidden" class="form-control" name="total_time" id="total_time" value="{{$aq}}">
      </div>
      <button class="btn btn-primary">Сократить время</button>
    </form>

    @endif


@else



</br>

      <form  method="post" action="{{ route('pharmaceuticals.bonus.update', ['bonu'=> $lafLis->id]) }}" onchange="this.form.submit()" enctype="multipart/form-data">
      @csrf
@method('put')
      @foreach($lab as $lafLis)

      <div class="form-group">
      <input type="hidden" class="form-control" name="product_name" id="product_name" value="{{ $lafLis->product_name}}">
      </div>
      <div class="form-group">
      <input type="hidden" class="form-control" name="income" id="income" value="{{ $lafLis->income }}">
      </div>
      <div class="form-group">
      <input type="hidden" class="form-control" name="total_time" id="total_time" value="">
      </div>
      <div class="form-group">
      <input type="hidden" class="form-control" name="exp" id="exp" value="{{ Auth::user()->personal_experience }}">
      </div>
      <div class="form-group">
      <input type="hidden" class="form-control" name="price" id="price" value="">
      </div>
      <div class="form-group">
      <input type="hidden" class="form-control" name="amount" id="amount" value="{{ $lafLis->amount }}">
      </div>
        @endforeach
      <button class="btn btn-primary">Получить заказ</button>


    </form>
@endif
@endswitch
<!--здесь должно отображаться таймер до следующего сокращение времени-->
              </div>
          </div>
          <div style="clear: both"></div>

      </li>



@else

  @foreach($has as $lafL)


            <li class="padtop_s first-li">
                    <img class="icon" width="48" height="48" src="{{ asset('public/storage/images/fonn.jpg') }}"/>
                <div class="row">
                    <div>
                            <span class="patienttitle">Свободная палата</span>
<span class="minor smallfont"></span>                    </div>
                    <div>

    <img width="16" height="16" src="/Themes/images/diagnosis.png"/>
<a href="{{ route('pharmaceuticals.pharmaceuticals.edit', ['pharmaceutical'=> $lafLis->id]) }}">Заказать медикомент</a>
                    </div>
                </div>
                <div style="clear: both"></div>

            </li>


            @endforeach

@endif

                  @endforeach

  @forelse($has as $lafL)
            <li class="padtop_m">

<div>
    <img class="icon" width="48" height="48" src="{{ asset('public/storage/images/fonn.jpg') }}"/>
    <span class="drugtitle">Новая палата</span>
    <div>
                <img width="16" height="16" src="/Themes/images/cart.png"/>
                <a href="{{ route('pharmaceuticals.pharmaceuticals.create') }}">Купить</a>
            за
                <img width="16" height="16" src="/Themes/images/diamond.png"/>
            <span class="ylwtitle">бесплатно</span>
     </div>
     <div style="clear: both"></div>
</div>

            </li>

            @empty
            @endempty
    </ul>
    <ul class="padtop_m">
      
      <li>
          <img width="16" height="16" src="/Themes/images/pill.png"/>
          
              <div style="margin-left:21px">



              </div>
      </li>
      <li class="padtop_m">
          <img width="16" height="16" src="/Themes/images/receptionist.png"/>
          <a href="/Reception?t=637958294648680268">Приемная</a>
      </li>
  </ul>


</div>

@endsection
