
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
                  <a href="{{ route('admin.users.index') }}">Вернуться обратно</a>
                    <div class="card-header">{{ __('Редактировать Игрока ') }} </div>

                    <div class="card-body">
                      <form  method="post" action="{{ route('admin.users.update', ['user'=> $usersList]) }}" >

                        @csrf
                        @method('put')

                        <div class="form-group">
                        <label for="name">Никнейм</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{ $usersList->name }}">
                        </div>
                        <div class="form-group">
                        <label for="email">Почта</label>
                        <input type="text" class="form-control" name="email" id="email" value="{{ $usersList->email }}">
                        </div>
                        <div class="form-group">
                        <label for="lvl">Уровень</label>
                        <input type="text" class="form-control" name="lvl" id="lvl" value="{{$usersList->lvl}}">
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
