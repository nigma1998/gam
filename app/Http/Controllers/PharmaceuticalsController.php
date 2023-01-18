<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Users;
use App\Models\Schablon;
use App\Http\Requests\PharmaceuticalsUpdateRequest;
use App\Models\Cart;
use App\Models\Bonus;
use App\Models\Delivery;
use App\Models\Level;
use App\Models\Pharmaceuticals;
use App\Helper\TimeHelper;
use App\Helper\TaimHelper;

class PharmaceuticalsController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
      $this->middleware('auth');
  }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $bonus = new Pharmaceuticals;
        $user = Auth::user()->name;
        $userList =  Pharmaceuticals::where('user', $user)->get();
        //файл для шаблона
        $schablon = Schablon::select(Schablon::$yonListt)->get();

        //через поиск определяем выбрал игрок способ доставки или нет


        $article = Bonus::where('id', $bonus->delivery)->get();


        $lvl = Level::select(Level::$fileTaibl)->get();
        // данные взяты с файла хелпер
        $TimeHelper = new TimeHelper();
        $minut = TimeHelper::SECONDS_PER_MINUTE;
        $hour = TimeHelper::SECONDS_PER_HOUR;
        $day = TimeHelper::SECONDS_PER_DAY;

        $TaimHelper = new TaimHelper();

        return view('pharmaceuticals.pharmaceuticals', [
          'lab' => $userList,
          'has' => $schablon,
          'minut' => $minut,
          'hour' => $hour,
          'day' => $day,
          'lvl' => $lvl,
          'prob' => $TaimHelper,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('pharmaceuticals.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    //  dd($request);
      $validated = $request->validate([
        'user' => ['required', 'string']
      ]);

      $data = $request->only(['user']);

      $userList = Pharmaceuticals::create($data);


      if($userList){
        return redirect()->route('pharmaceuticals.pharmaceuticals.index')->with('success', 'лабаратория приобретина');
      }

      return back()->withInput()->with('error', 'Не удолось купить камеру');

    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  Pharmaceuticals $pharmaceuticals
     * @return \Illuminate\Http\Response
     */
    public function edit(Pharmaceuticals $pharmaceutical)
    {
      $deliveryList = Delivery::select(Delivery::$allowedFields)->get();

        return view('pharmaceuticals.edit', [
          'pharmaceuticals' => $pharmaceutical,
          'deliveryList' => $deliveryList,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  PharmaceuticalsUpdateRequest  $request
     * @param  int  Pharmaceuticals $pharmaceutical
     * @return \Illuminate\Http\Response
     */
    public function update(PharmaceuticalsUpdateRequest $request, Pharmaceuticals $pharmaceutical)
    {
      $lvls = Auth::user()->lvl;
      $lv = Level::select(Level::$fileyon)->where('lvl', $lvls)->value('exp_to_lvl');

      $validated = $request->validated();

       $pharmaceutical = $pharmaceutical->fill($validated)->save();
      //вычитаем монеты за ее доставку
      $coins = Auth::user()->coins; // общее количество монет у игрока
      $pric = request()->input('price');
      $calculation = $coins - $pric;
      $resul = $calculation;

      // прибавление опыта игроку
      $ex = Auth::user()->exp; // общее количество опыта у игрока
      $level = Auth::user()->lvl; //уровень игрока
      $accrual = request()->input('exp'); // количество получаемого опыта
      $addition = $ex + $accrual;
      $result = $addition;

      if ($ex <= $lv) {
        $user = Users::findOrFail(Auth::user()->id);
        $user->exp = $result;
        $user->coins = $resul;
        $user->save();
      }else{
        ++$level;
        $subtraction = $ex - $lv;
        $resul = $subtraction;
        $user = Users::findOrFail(Auth::user()->id);
        $user->exp = $resul;
        $user->lvl = $level;
        $user->save();
      }

      if($pharmaceutical){
        return redirect()->route('pharmaceuticals.pharmaceuticals.index')->with('success', 'заказ успешно выбран ' . $accrual . ' опыта');
      }

      return back()->withInput()->with('error', 'Рецепт сбежал');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
