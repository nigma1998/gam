
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">



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
                  <a href="{{ route('admin.product.index') }}">Вернуться обратно</a>
                    <div class="card-header">{{ __('Добавить блюдо') }}</div>

                    <div class="card-body">
                      <form  method="post" action="{{ route('admin.product.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                        <label for="name">Название продукта</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}">
                        </div>
                        <div class="form-group">
                        <label for="room">порядковый номер продукта</label>
                        <input type="text" class="form-control" name="room" id="room" value="{{ old('room') }}">
                        </div>


                      <!--  <div class="form-group">
                        <label for="image_url">Изображение</label>
                        <input type="file" class="form-control" name="image_url" id="image_url">
                        </div>
-->
                        <button class="btn btn-primary">Сохранить</button>

                      </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </body>
</html>
