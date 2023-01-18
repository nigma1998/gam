
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
                  <a href="{{ route('admin.medicines.index') }}">Вернуться обратно</a>
                    <div class="card-header">{{ __('Добавить Медикомент') }}</div>

                    <div class="card-body">
                      <form  method="post" action="{{ route('admin.medicines.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                        <label for="product_name">Название медикамента</label>
                        <input type="text" class="form-control" name="product_name" id="product_name" value="{{ old('product_name') }}">
                        </div>
                        <div class="form-group">
                        <label for="income">Доход</label>
                        <input type="text" class="form-control" name="income" id="income" value="{{ old('income') }}">
                        </div>
                        <div class="form-group">
                        <label for="total_time">Время</label>
                        <input type="text" class="form-control" name="total_time" id="total_time" value="{{ old('total_time') }}">
                        </div>
                        <div class="form-group">
                        <label for="exp">Опыт</label>
                        <input type="text" class="form-control" name="exp" id="exp" value="{{ old('exp') }}">
                        </div>
                        <div class="form-group">
                        <label for="price">Цена</label>
                        <input type="text" class="form-control" name="price" id="price" value="{{ old('price') }}">
                        </div>
                        <div class="form-group">
                        <label for="amount">Количество</label>
                        <input type="text" class="form-control" name="amount" id="amount" value="{{ old('amount') }}">
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
