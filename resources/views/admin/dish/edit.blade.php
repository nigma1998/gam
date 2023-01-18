
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->


    <title>Редактировать</title>

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
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                  <a href="{{ route('admin.dish.index') }}">Вернуться обратно</a>
                    <div class="card-header">{{ __('Редактировать блюдо ') }} </div>

                    <div class="card-body">
                      <form  method="post" action="{{ route('admin.dish.update', ['dish'=> $dishList]) }}" enctype="multipart/form-data">

                        @csrf
                        @method('put')
                        <td> <img src="{{ Storage::url($dishList->image_url)}}" width='68' height='68'> </td>

                        <div class="form-group">
                        <label for="name">Название блюдо</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{ $dishList->name }}">
                        </div>
                        <div class="form-group">
                        <label for="ingredient_one"> ингридиент 1</label>
                        <input type="text" class="form-control" name="ingredient_one" id="ingredient_one" value="{{ $dishList->ingredient_one }}">
                        </div>
                        <div class="form-group">
                        <label for="amount_one">количество ингридиента 1</label>
                        <input type="text" class="form-control" name="amount_one" id="amount_one" value="{{ $dishList->amount_one }}">
                        </div>
                        <div class="form-group">
                        <label for="ingredient_two"> ингридиент 2</label>
                        <input type="text" class="form-control" name="ingredient_two" id="ingredient_two" value="{{ $dishList->ingredient_two }}">
                        </div>
                        <div class="form-group">
                        <label for="amount_two">количество ингридиента 2</label>
                        <input type="text" class="form-control" name="amount_two" id="amount_two" value="{{ $dishList->amount_two }}">
                        </div>
                        <div class="form-group">
                        <label for="ingredient_three"> ингридиент 3</label>
                        <input type="text" class="form-control" name="ingredient_three" id="ingredient_three" value="{{ $dishList->ingredient_three }}">
                        </div>
                        <div class="form-group">
                        <label for="amount_three">количество ингридиента 3</label>
                        <input type="text" class="form-control" name="amount_three" id="amount_three" value="{{ $dishList->amount_three }}">
                        </div>
                        <div class="form-group">
                        <label for="image_url">Картинка</label>
                        <input type="file" class="form-control" name="image_url" id="image_url">
                        </div>
                        <div class="form-group">
                        <label for="total_time">Время</label>
                        <input type="text" class="form-control" name="total_time" id="total_time" value="{{ $dishList->total_time }}">
                        </div>
                        <div class="form-group">
                        <label for="exp">Опыт</label>
                        <input type="text" class="form-control" name="exp" id="exp" value="{{ $dishList->exp }}">
                        </div>

                        <div class="form-group">
                        <label for="description">Описание</label>
                        <input type="text" class="form-control" name="description" id="description" value="{{ $dishList->description }}">
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
