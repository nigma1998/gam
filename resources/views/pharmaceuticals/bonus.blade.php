@extends('layouts.gamm')
@section('content')

<div class="content">


    
<div class="block padtop_s">
    <ul>
    <li class="padtop_s">
        @foreach($bonus as $bonus)
        <form  method="post" action="{{ route('gem.button.update', ['button'=> $button]) }}"  enctype="multipart/form-data">
            @csrf
            @method('put')
            <img width="48" height="48" src="/Themes/images/misc/brusnika.png" class="icon"/>
                 <span><a href="/Rooms/ChangeVitamin?vitaminId=1&page=1">{{ $bonus->name }}</a></span><span class="minor">,</span>
                <span class="smallfont minor">цена</span>
                <img width="16" height="16" src="/Themes/images/coins2.png"/>
                <span class="ylwtitle">{{ $bonus->price }}</span>
        <div class="smallfont">
            <div>
                <span class="minor">Опыт: </span>
                <img width="16" height="16" src="/Themes/images/exp2.png"/>
                <span class="money">{{ $bonus->exp }}</span>
                <br/>
                <span class="minor">При использовании медикаментов,</span>
                <br/>
                <span class="minor">ускоряет выздоровление на </span>
                <span class="money">{{ $bonus->total_time }} мин.</span>
                
                  <div class="form-group">
        
                  <input type="hidden" class="form-control" name="delivery" id="delivery" value="{{ $bonus->id }}">
                 </div>
                 <button class="btn btn-primary">Выбрать</button>
            </form> 
            @endforeach
                <br/>
            </div>
        </div>
        <div style="clear: both"></div>
    </li>





@endsection
