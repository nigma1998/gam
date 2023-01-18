
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
                  <a href="{{ route('admin.dish.index') }}">Вернуться обратно</a>
                    <div class="card-header">{{ __('Добавить блюдо') }}</div>

                    <div class="card-body">
                      <form  method="post" action="{{ route('admin.dish.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                        <label for="name">Название блюда</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}">
                        </div>
                        <div class="form-group">
                        <label for="ingredient_one">ингридиент 1</label>
                        <input type="text" class="form-control" name="ingredient_one" id="ingredient_one" value="{{ old('ingredient_one') }}">
                        </div>
                        <div class="form-group">
                        <label for="amount_one">Количество ингридиента 1</label>
                        <input type="text" class="form-control" name="amount_one" id="amount_one" value="{{ old('amount_one') }}">
                        </div>
                        <div class="form-group">
                        <label for="ingredient_two">ингридиент 2</label>
                        <input type="text" class="form-control" name="ingredient_two" id="ingredient_two" value="{{ old('ingredient_two') }}">
                        </div>
                        <div class="form-group">
                        <label for="amount_two">Количество ингридиента 2</label>
                        <input type="text" class="form-control" name="amount_two" id="amount_two" value="{{ old('amount_two') }}">
                        </div>
                        <div class="form-group">
                        <label for="ingredient_three">ингридиент 3</label>
                        <input type="text" class="form-control" name="ingredient_three" id="ingredient_three" value="{{ old('ingredient_three') }}">
                        </div>
                        <div class="form-group">
                        <label for="amount_three">Количество ингридиента 3</label>
                        <input type="text" class="form-control" name="amount_three" id="amount_three" value="{{ old('amount_three') }}">
                        </div>
                        <div class="form-group">
                        <label for="description">Описание</label>
                        <input type="text" class="form-control" name="description" id="description" value="{{ old('description') }}">
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
