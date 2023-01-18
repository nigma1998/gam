@extends('layouts.gamm')
@section('content')




<div class="content">
    <div class="block">
@include('inc.message')
    <div>
        <img width="16" height="16" src="/Themes/images/refresh.png"/>
        <a href="{{ route('gem.gem.index') }}">Обновить</a>
        <a href="{{ url('home') }}">Домой</a>
    </div>

    <ul class="delim-list padtop_s">
      @foreach($laf as $lafLis)
      @php

      $button = $prob->foodButton($lafLis->updated_at, $lafLis->total_tim)

      @endphp
      @if($lafLis->total_time = $lafLis->total_time)
      <li class="padtop_s first-li">
              <td> <img class="icon" width="48" height="48" src="{{ Storage::url($lafLis->image_url)}}"/> </td>
          <div class="row">
              <div>

<span class="minor smallfont">
  <div class="spravca"> <input type="checkbox" id="{{ $lafLis->id }}" class="reference"/>
<label for="{{ $lafLis->id }}" ><span class="patienttitle">{{ $lafLis->product_name }}</span></label>
<span class="story">
  <div class="explain smallfont" style="padding:4px;">
  <ul>
      <li class="padbottom_s">
          <img width="16" height="16" src="/Themes/images/info.png"/>
          <span class="ylwtitle">Курс лечения</span>
      </li>

          <li style='margin-left:20px;'>
              <span class="">29x Обезболивающее: </span><span>Выпить</span> через <span class='ylwtitle'>
                 {{ $prob->foodButton($lafLis->updated_at, $lafLis->total_time) }}


               </span>
          </li>

          <li style='margin-left:20px;'>
              <span class="">29x Щипцы: </span><span>Использовать</span> через <span class='ylwtitle'>{{ $prob->foodButtonYon($lafLis->updated_at, $lafLis->total_time) }}</span>
          </li>

          <li style='margin-left:20px;'>
             
          </li>

  </ul>
  </div>
</span>
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

@php
    
// за основу взята функция mktime
$sa = $times; // переменная секунда
$xa = $timeh;// переменная час
$ra = $timei + $lafLis->complaint_button;// переменная минуты здесь же мы прибовляем время которая храниться в бд
$ma = date("m", strtotime($lafLis->updated_at));// переменная месяц
$ea = date("d", strtotime($lafLis->updated_at));// переменная день
$ia = date("Y", strtotime($lafLis->updated_at));// переменная год

$endO = mktime($xa,$ra,$sa,$ma,$ea,$ia);
$nw = time(); // текущее время
$secondsRemaining = $endO - $nw; // оставшееся время

$minut;
$hour;
$day;

$tag = floor($secondsRemaining / $day); //дни, до даты
$secondsRemaining -= ($tag * $day);     //обновляем переменную

$hou = floor($secondsRemaining / $hour); // часы до даты
$secondsRemaining -= ($hou * $hour);     //обновляем переменную

$minu = floor($secondsRemaining / $minut); //минуты до даты
$secondsRemaining -= ($minu * $minut);     //обновляем переменную

@endphp

@if ($tag > -1)
Выслушать жалобу через 

    @if($tag > 0)
    {{$tag}} д,
    @else

    @endif
    @if($hou > 0)
    {{$hou}} ч,
    @else

    @endif
    @if($minu > 0)
     {{$minu}} минут,
     @else

     @endif
     @if($secondsRemaining > 0)
     {{$secondsRemaining}} секунда
     @else

     @endif





@else
    

<form  method="post" action="{{ route('gem.nonesk.update', ['nonesk'=> $lafLis->id]) }}" onchange="this.form.submit()"  enctype="multipart/form-data">
  @csrf
  @method('put')
  <div class="form-group">
  <input type="hidden" class="form-control" name="identifier" id="identifier" value="2">
  </div>
  <div class="form-group">

    <input type="hidden" class="form-control" name="exp" id="exp" value="{{ Auth::user()->personal_experience }}">
    </div>
  <button class="btn btn-primary">Выслушать жалобу</button>
</form>
@endif
@break
@case(2)
@php
    



// за основу взята функция mktime
$sa = $times; // переменная секунда
$xa = $timeh;// переменная час
$ra = $timei + $lafLis->inspection_button;// переменная минуты здесь же мы прибовляем время которая храниться в бд
$ma = date("m", strtotime($lafLis->updated_at));// переменная месяц
$ea = date("d", strtotime($lafLis->updated_at));// переменная день
$ia = date("Y", strtotime($lafLis->updated_at));// переменная год

$endO = mktime($xa,$ra,$sa,$ma,$ea,$ia);
$nw = time(); // текущее время
$secondsRemaining = $endO - $nw; // оставшееся время

$minut;
$hour;
$day;

$tag = floor($secondsRemaining / $day); //дни, до даты
$secondsRemaining -= ($tag * $day);     //обновляем переменную

$hou = floor($secondsRemaining / $hour); // часы до даты
$secondsRemaining -= ($hou * $hour);     //обновляем переменную

$minu = floor($secondsRemaining / $minut); //минуты до даты
$secondsRemaining -= ($minu * $minut);     //обновляем переменную

@endphp

@if ($tag > -1)
Произвести осмотр через 

    @if($tag > 0)
    {{$tag}} д,
    @else

    @endif
    @if($hou > 0)
    {{$hou}} ч,
    @else

    @endif
    @if($minu > 0)
     {{$minu}} минут,
     @else

     @endif
     @if($secondsRemaining > 0)
     {{$secondsRemaining}} секунда
     @else

     @endif





@else


<form  method="post" action="{{ route('gem.nonesk.update', ['nonesk'=> $lafLis->id]) }}" onchange="this.form.submit()"  enctype="multipart/form-data">
  @csrf
  @method('put')
  <div class="form-group">
  <input type="hidden" class="form-control" name="identifier" id="identifier" value="3">
  </div>
  <div class="form-group">

    <input type="hidden" class="form-control" name="exp" id="exp" value="{{ Auth::user()->personal_experience }}">
    </div>
  <button class="btn btn-primary">Произвести осмотр</button>
</form>

@endif
@break
@case(3)
@php
    



// за основу взята функция mktime
$sa = $times; // переменная секунда
$xa = $timeh;// переменная час
$ra = $timei + $lafLis->button_treatment;// переменная минуты здесь же мы прибовляем время которая храниться в бд
$ma = date("m", strtotime($lafLis->updated_at));// переменная месяц
$ea = date("d", strtotime($lafLis->updated_at));// переменная день
$ia = date("Y", strtotime($lafLis->updated_at));// переменная год

$endO = mktime($xa,$ra,$sa,$ma,$ea,$ia);
$nw = time(); // текущее время
$secondsRemaining = $endO - $nw; // оставшееся время

$minut;
$hour;
$day;

$tag = floor($secondsRemaining / $day); //дни, до даты
$secondsRemaining -= ($tag * $day);     //обновляем переменную

$hou = floor($secondsRemaining / $hour); // часы до даты
$secondsRemaining -= ($hou * $hour);     //обновляем переменную

$minu = floor($secondsRemaining / $minut); //минуты до даты
$secondsRemaining -= ($minu * $minut);     //обновляем переменную

@endphp

@if ($tag > -1)
Назначить курс лечения через 

    @if($tag > 0)
    {{$tag}} д,
    @else

    @endif
    @if($hou > 0)
    {{$hou}} ч,
    @else

    @endif
    @if($minu > 0)
     {{$minu}} минут,
     @else

     @endif
     @if($secondsRemaining > 0)
     {{$secondsRemaining}} секунда
     @else

     @endif





@else

<form  method="post" action="{{ route('gem.nonesk.update', ['nonesk'=> $lafLis->id]) }}" onchange="this.form.submit()"  enctype="multipart/form-data">
  @csrf
  @method('put')
  <div class="form-group">
  <input type="hidden" class="form-control" name="identifier" id="identifier" value="4">
  </div>
  <div class="form-group">

    <input type="hidden" class="form-control" name="exp" id="exp" value="{{ Auth::user()->personal_experience }}">
    </div>
  <button class="btn btn-primary">Назначить курс лечения</button>
</form>

@endif
@break
@case(4)
@php
    



// за основу взята функция mktime
$sa = $times; // переменная секунда
$xa = $timeh;// переменная час
$ra = $timei + $lafLis->drink_button;// переменная минуты здесь же мы прибовляем время которая храниться в бд
$ma = date("m", strtotime($lafLis->updated_at));// переменная месяц
$ea = date("d", strtotime($lafLis->updated_at));// переменная день
$ia = date("Y", strtotime($lafLis->updated_at));// переменная год

$endO = mktime($xa,$ra,$sa,$ma,$ea,$ia);
$nw = time(); // текущее время
$secondsRemaining = $endO - $nw; // оставшееся время

$minut;
$hour;
$day;

$tag = floor($secondsRemaining / $day); //дни, до даты
$secondsRemaining -= ($tag * $day);     //обновляем переменную

$hou = floor($secondsRemaining / $hour); // часы до даты
$secondsRemaining -= ($hou * $hour);     //обновляем переменную

$minu = floor($secondsRemaining / $minut); //минуты до даты
$secondsRemaining -= ($minu * $minut);     //обновляем переменную

@endphp

@if ($tag > -1)
  Произвести действия 

    @if($tag > 0)
    {{$tag}} д,
    @else

    @endif
    @if($hou > 0)
    {{$hou}} ч,
    @else

    @endif
    @if($minu > 0)
     {{$minu}} минут,
     @else

     @endif
     @if($secondsRemaining > 0)
     {{$secondsRemaining}} секунда
     @else

     @endif





@else
@if(Auth::user()->drink <= 0)
<a href="{{ route('gem.taim.index', ['button'=> $lafLis->id]) }}">Выбрать еду</a>
@else
<form  method="post" action="{{ route('gem.nonesk.update', ['nonesk'=> $lafLis->id]) }}" onchange="this.form.submit()"  enctype="multipart/form-data">
  @csrf
  @method('put')
  <div class="form-group">
  <input type="hidden" class="form-control" name="identifier" id="identifier" value="5">
  </div>
  <div class="form-group">

    <input type="hidden" class="form-control" name="exp" id="exp" value="{{ Auth::user()->personal_experience }}">
    </div>
  <button class="btn btn-primary">Напоить пациента</button>
</form>


@endif
@endif

@break
 @default(5)
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
  <div class='blog'>До следующего приёма
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
<form  method="post" action="{{ route('gem.nonesk.update', ['nonesk'=> $lafLis->id]) }}"  enctype="multipart/form-data">
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
$date = date("Y-m-d H:i:s");

@endphp
  <div class="form-group">
  <input type="hidden" class="form-control" name="total_time" id="total_time" value="{{$aq}}">
  <input type="hidden" class="form-control" name="dat" id="dat" value="{{$date}}">
  </div>
  <button class="btn btn-primary">Осмотр</button>
</form>


@endif



@else

</br>
@php

$date = date("Y-m-d H:i:s");

@endphp

      <form  method="post" action="{{ route('gem.nonesk.update', ['nonesk'=> $lafLis->id]) }}" onchange="this.form.submit()" enctype="multipart/form-data">
      @csrf
      @method('put')

      <div class="form-group">
      <input type="hidden" class="form-control" name="product_name" id="product_name" value="">
      </div>
      <div class="form-group">
      <input type="hidden" class="form-control" name="image_url" id="image_url" value="">
      </div>
      <div class="form-group">

      <input type="hidden" class="form-control" name="total_time" id="total_time" value="">
      </div>
      <div class="form-group">

      <input type="hidden" class="form-control" name="exp" id="exp" value="{{ Auth::user()->personal_experience }}">
      </div>

      <div class="form-group">
      <input type="hidden" class="form-control" name="identifier" id="identifier" value="1">
      </div>
      <div class="form-group">
        <input type="hidden" class="form-control" name="coins" id="coins" value="{{ $lafLis->coins }}">
        </div>
      <div class="form-group">
      <input type="hidden" class="form-control" name="dat" id="dat" value="{{$date}}">
      </div>

      <button class="btn btn-primary">Выписать пациента</button>


    </form>
@endif
@break
@endswitch

<!--здесь должно отображаться таймер до следующего сокращение времени-->
              </div>
          </div>
          <div style="clear: both"></div>

      </li>



@else

  @foreach($has as $lafL)


            <li class="padtop_s first-li">
                    <img class="icon_l" width="48" height="48" src="{{ asset('public/storage/images/fonn.jpg') }}">
                <div class="row">
                    <div>
                            <span class="patienttitle">Свободная палата</span>
<span class="minor smallfont"></span>                    </div>
                    <div>

    <img width="16" height="16" src="/Themes/images/diagnosis.png"/>
<a href="{{ route('gem.gem.edit', ['gem'=> $lafLis->id]) }}">Принять пациента</a>
                    </div>
                </div>
                <div style="clear: both"></div>

            </li>


            @endforeach

@endif

                  @endforeach
                  
                  @php
                    $count; 
                    
                  @endphp
                  
                  @forelse($has as $lafL)

  @if($count < 8 )
            <li class="padtop_m">

<div>
    <img class="icon" width="48" height="48" src="{{ asset('public/storage/images/fonn.jpg') }}"/>
    <span class="drugtitle">Новая палата</span>
    <div>
                <img width="16" height="16" src="/Themes/images/cart.png"/>
                <a href="{{ route('gem.gem.create') }}">Купить</a>
            за
                <img width="16" height="16" src="/Themes/images/diamond.png"/>
            <span class="ylwtitle">бесплатно</span>
     </div>
     <div style="clear: both"></div>
</div>

            </li>

            @else

             <p>Палаты закончились</p>

            @endif

            @empty
            @endempty
    </ul>
    <ul class="padtop_m">
        <li>
            <img width="16" height="16" src="/Themes/images/pill.png"/>
            <a href="{{ route('gem.taim.index') }}">Выбрать обед для больного</a>:
                <div style="margin-left:21px">
                    Живительный напиток
                </div>
        </li>
        <li class="padtop_m">
            <img width="16" height="16" src="/Themes/images/receptionist.png"/>
            <a href="/Reception?t=637958294648680268">Приемная</a>
        </li>
    </ul>

</div>

@endsection
