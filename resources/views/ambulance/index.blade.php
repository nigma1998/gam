@extends('layouts.gamm')
@section('content')

<li class="padtop_s li">
    <img class="icon" width="48" height="48" src="{{ asset('public/storage/images/skoraj.jpg') }}"/>
<div class="row">
    @if (Auth::user()->lvl > 6)        
    <!--<img width="16" height="16" alt="o" src="{{ asset('storage/images/palata.png') }}">-->
        <a href="{{ route('ambulance.ambulance.index') }}">Автопарк</a>
        <span class="ylwtitle"></span>
        @else
        <p>Автопарк (доступна с 16 уровня)</p>
        @endif
  
</div>
<div style="clear: both"></div>

</li>
<li class="padtop_s li">
    <img class="icon" width="48" height="48" src="{{ asset('public/storage/images/pilot.jpg') }}"/>
<div class="row">
    @if (Auth::user()->lvl > 26)        
    <!--<img width="16" height="16" alt="o" src="{{ asset('storage/images/palata.png') }}">-->
        <a href="">Аэродром</a>
        <span class="ylwtitle"></span>
        @else
        <p>Аэродром (доступна с 26 уровня)</p>
        @endif
</div>
<div style="clear: both"></div>

</li>

@endsection