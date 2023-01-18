
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
                  <a href="{{ route('admin.nps.index') }}">Вернуться обратно</a>
                    <div class="card-header">{{ __('Редактировать nps ') }} </div>

                    <div class="card-body">
                    <form  method="post" action="{{ route('admin.nps.update', ['np'=> $npsLis]) }}" enctype="multipart/form-data">

                        @csrf
                        @method('put')
                        <td> <img src="{{ Storage::url($npsLis->image_url)}}" width='68' height='68'> </td>

                        <div class="form-group">
                        <label for="product_name">Имя</label>
                        <input type="text" class="form-control" name="product_name" id="product_name" value="{{ $npsLis->product_name }}">
                        </div>
                        <div class="form-group">
                        <label for="price">Время</label>
                        <input type="text" class="form-control" name="total_time" id="total_time" value="{{ $npsLis->total_time }}">
                        </div>
                        <div class="form-group">
                        <label for="exp">Опыт</label>
                        <input type="text" class="form-control" name="exp" id="exp" value="{{ $npsLis->exp }}">
                        </div>
                        <div class="form-group">
                        <label for="image_url">Картинка</label>
                        <input type="file" class="form-control" name="image_url" id="image_url">
                        </div>

                        <div class="form-group">
                        <label for="description">Описание</label>
                        <input type="text" class="form-control" name="description" id="description" value="{{ $npsLis->description }}">
                        </div>
                        <div class="form-group">
                        <label for="drug_one">Мндикамент 1</label>
                        <input type="text" class="form-control" name="drug_one" id="drug_one" value="{{ $npsLis->drug_one }}">
                        </div>
                        <div class="form-group">
                        <label for="amount_one">Количество 1</label>
                        <input type="text" class="form-control" name="amount_one" id="amount_one" value="{{ $npsLis->amount_one }}">
                        </div>
                        <div class="form-group">
                        <label for="drug_two">Мндикамент 2</label>
                        <input type="text" class="form-control" name="drug_two" id="drug_two" value="{{ $npsLis->drug_two }}">
                        </div>
                        <div class="form-group">
                        <label for="amount_two">Количество 2</label>
                        <input type="text" class="form-control" name="amount_two" id="amount_two" value="{{ $npsLis->amount_two }}">
                        </div>
                        <div class="form-group">
                        <label for="drug_three">Мндикамент 3</label>
                        <input type="text" class="form-control" name="drug_three" id="drug_three" value="{{ $npsLis->drug_three }}">
                        </div>
                        <div class="form-group">
                        <label for="amount_three">Количество 3</label>
                        <input type="text" class="form-control" name="amount_three" id="amount_three" value="{{ $npsLis->amount_three }}">
                        </div>
                        <div class="form-group">
                        <label for="drug_four">Мндикамент 4</label>
                        <input type="text" class="form-control" name="drug_four" id="drug_four" value="{{ $npsLis->drug_four }}">
                        </div>
                        <div class="form-group">
                        <label for="amount_four">Количество 4</label>
                        <input type="text" class="form-control" name="amount_four" id="amount_four" value="{{ $npsLis->amount_four }}">
                        </div>
                        <div class="form-group">
                        <label for="drug_five">Мндикамент 5</label>
                        <input type="text" class="form-control" name="drug_five" id="drug_five" value="{{ $npsLis->drug_five }}">
                        </div>
                        <div class="form-group">
                        <label for="amount_five">Количество 5</label>
                        <input type="text" class="form-control" name="amount_five" id="amount_five" value="{{ $npsLis->amount_five }}">
                        </div>
                        <div class="form-group">
                        <label for="drug_six">Мндикамент 6</label>
                        <input type="text" class="form-control" name="drug_six" id="drug_six" value="{{ $npsLis->drug_six }}">
                        </div>
                        <div class="form-group">
                        <label for="amount_six">Количество 6</label>
                        <input type="text" class="form-control" name="amount_six" id="amount_six" value="{{ $npsLis->amount_six }}">
                        </div>

                        <div class="form-group">
                          <label for="complaint_button">кнопка на выслушать жалобу</label>
                          <input type="text" class="form-control" name="complaint_button" id="complaint_button" value="{{ $npsLis->complaint_button }}">
                          </div>
                          <div class="form-group">
                        <label for="inspection_button">кнопка произвести осмотр</label>
                        <input type="text" class="form-control" name="inspection_button" id="inspection_button" value="{{ $npsLis->inspection_button}}">
                        </div>
                        <div class="form-group">
                          <label for="button_treatment">кнопка на курс лечения</label>
                          <input type="text" class="form-control" name="button_treatment" id="button_treatment" value="{{ $npsLis->button_treatment }}">
                          </div>
                          <div class="form-group">
                            <label for="drink_button">кнопка на корм</label>
                            <input type="text" class="form-control" name="drink_button" id="drink_button" value="{{ $npsLis->drink_button }}">
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
