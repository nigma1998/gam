<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Добавить</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/laf.css') }}" rel="stylesheet">
  </head>
  <body>
    @include('inc.message')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                  <a href="{{ route('admin.schablon.index') }}">Вернуться обратно</a>
                    <div class="card-header">{{ __('Редоктировать  изображение в шаблон') }}</div>

                    <div class="card-body">
                      <form  method="post" action="{{ route('admin.schablon.update', ['schablon'=> $lis]) }}" enctype="multipart/form-data">
                        @csrf
                        @method('put')

                       <div class="form-group">
                        <label for="url">Изображение</label>
                        <input type="file" class="form-control" name="url" id="url">
                        </div>

                        <button class="btn btn-primary">Сохранить</button>

                      </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </body>
</html>
