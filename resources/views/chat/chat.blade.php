@extends('layouts.gamm')
@section('content')

<div class="content">

   

    <div class="block">
    <div>
        <img width="16" height="16" src="/Themes/images/refresh.png" alt="">
        <a href="{{ route('chat.chat.index') }}">Обновить</a>  
     
       
        
        


    </div>
    
    <ul>
        
    @foreach($chatList as $chatList)
            <li class="padtop_s">
                <div>
                    
                    {{ $chatList->user }}
               
                </div>
                <div class="forummsg">
                    <p>{{ $chatList->text }}</p>
                </div>
                
            </li>
        
        
    </ul>
    @endforeach

   
        <summary><a>Написать в чат</a></summary>
        <form  method="post" action="{{ route('chat.chat.store') }}" onchange="this.form.submit()" enctype="multipart/form-data">
            @csrf
            
            <div class="form-group">

                <input  type="hidden" class="form-control" name="user" id="user" value="{{ Auth::user()->name }}">
                </div>
            <div class="form-group">
      
            <input type="text" class="form-control" name="text" id="text" value="{{ old('text') }}">
            </div> 
      
            <button class="btn btn-primary">Отправить</button>
   
 
   
    </div>

@endsection