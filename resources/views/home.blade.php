@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
<h1>Привет {{ Auth::user()->name }}</h1> ваш уровень {{ Auth::user()->lvl}} </br>
                    {{ __('Вы вошли в систему!') }}

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __('Выход') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                    @if (Auth::user()->role > 0)  
                    
                    админка
                    <a href="{{ route('admin.nps.index') }}">Админ понель</a></br>
                    @endif
                    <a href="{{ route('gem.gem.index') }}">Перейти на аккаунт</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
