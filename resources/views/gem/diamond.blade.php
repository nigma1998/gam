@extends('layouts.gamm')
@section('content')



<h1>Здесь пальма</h1>
@php
$tameh = date('H', strtotime(Auth::user()->updated_at));
$tamei = date('i', strtotime(Auth::user()->updated_at));
$tames = date('s', strtotime(Auth::user()->updated_at));




$sar = $tames;
$xix = $tameh + Auth::user()->palma;
$rar = $tamei;
$mab = date("m", strtotime(Auth::user()->updated_at));
$ey = date("d", strtotime(Auth::user()->updated_at));
$ir = date("Y", strtotime(Auth::user()->updated_at));

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


@endsection
