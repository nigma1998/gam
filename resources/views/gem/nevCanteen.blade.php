@extends('layouts.gamm')
@section('content')

@include('inc.message')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
              <a href="{{ route('gem.canteen.index') }}">Вернуться обратно</a>
                <div class="card-header">{{ __('Купить кухню') }}</div>

                <div class="card-body">
                  <form  method="post" action="{{ route('gem.canteen.store') }}" >
                    @csrf


                    <div class="form-group">

                    <input  type="hidden" class="form-control" name="user" id="user" value="{{ Auth::user()->name }}">
                    </div>

                  <!--  <div class="form-group">
                    <label for="image_url">Изображение</label>
                    <input type="file" class="form-control" name="image_url" id="image_url">
                    </div>
-->
                    <button class="btn btn-primary">Купить</button>

                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
