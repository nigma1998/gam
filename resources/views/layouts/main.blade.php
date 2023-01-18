<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head><title>Грань медицины</title>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<meta name="viewport" content="width=device-width, user-scalable=no" />
<link rel="apple-touch-icon" sizes="72x72" href="/touch-icon-ipad.png" />
<link rel="apple-touch-icon" sizes="114x114" href="/touch-icon-iphone-retina.png" />
<link rel="apple-touch-icon" sizes="144x144" href="/touch-icon-ipad-retina.png" />
<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
<link rel="icon" href="/favicon.ico" type="image/x-icon" />
<link href="{{ URL::asset('../public/css/mainb.css') }}" rel="stylesheet">
</head>
<body>
    <div>

<div class="caption">
    <h1>Грань медицины</h1>
</div>
<div class="content">

<div class="block">
<div class="padtop_s">
    <div style="padding-bottom: 4px">
        <img class="screen" width="128" height="128" src="{{ asset('public/storage/images/fonn.jpg') }}">
    </div>
    <div class="smallfont">
        <h3>Лечи самые сложные заболевания!</h3>
        <div class="img_thumb">
            <!--<img class="icon" width="48" height="48" src="/Themes/images/patients/patient45.png"/>
            <img class="icon" width="48" height="48" src="/Themes/images/patients/patient5.png"/>
            <img class="icon" width="48" height="48" src="/Themes/images/patients/patient7.png"/>-->
            <div style="clear: both"></div>
        </div>
        <h3>Делай для себя новые открытия!</h3>
        <div class="img_thumb">
           <!-- <img class="icon" width="48" height="48" src="/Themes/images/medicines/medicine3.png"/>
            <img class="icon" width="48" height="48" src="/Themes/images/medicines/medicine20.png"/>
            <img class="icon" width="48" height="48" src="/Themes/images/medicines/medicine48.png"/>-->
            <div style="clear: both"></div>
        </div>
        <h3>Управляй своими организациями которые ты сможешь открыть в будущем!</h3>
        <div class="img_thumb">
           <!-- <img class="icon" width="90" height="60" src="/Themes/images/AutoCars/Hummer-H-2.png"/>
            <img class="icon" width="90" height="60" src="/Themes/images/AutoCars/StarTrans-Senator.png"/>
            <img class="icon" width="90" height="60" src="/Themes/images/AutoCars/Mercedes-e200.png"/>-->
            <div style="clear: both"></div>
        </div>
        <h3>Достигни самых больших высот</h3>
        <div class="img_thumb">
            <!--<img class="icon" width="96" height="96" src="/Themes/images/presents/premium/syringe.png"/>
            <img class="icon" width="96" height="96" src="/Themes/images/presents/premium/ice.png"/>
            <img class="icon" width="96" height="96" src="/Themes/images/presents/premium/ferrari.png"/>-->
            <div style="clear: both"></div>
        </div>
    </div>
    <span class="main-header smallfont">Грань медицины</span> <span class="whitefont smallfont">- это одна из самы крупных и серьёзных организации человечества.</span>
    <br />
    <span class="whitefont smallfont">
    Стань професионалом докажи человечеству что ты достоин этого титула и готов преодолеть самые невозможные трудности.
    </span>
   
    <ul>
      @if (Route::has('login'))
          <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
              @auth
                  <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
              @else
                  <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Вход</a>

                  @if (Route::has('register'))
                      <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Регистрация</a>
                  @endif
              @endauth
          </div>
      @endif
    </ul>
</div>

</div>

</div>



    </div>

</body>
</html>
