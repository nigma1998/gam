<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Cart;
use App\Models\Level;
use App\Models\Users;
use App\Models\Drinks;
use App\Models\Images;
use App\Models\Schablon;
use App\Http\Requests\CartUpdateRequest;
use App\Helper\TimeHelper;
use App\Helper\TaimHelper;

class CartController extends Controller
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

    $user = Auth::user()->name;
    $drinks = Auth::user()->drink;
    $userList =  Cart::where('user', $user)->get();

    $drinkList =  Drinks::where('id', $drinks)->get();

      // данные взяты с файла хелпер
      $TimeHelper = new TimeHelper();
      $minut = TimeHelper::SECONDS_PER_MINUTE;
      $hour = TimeHelper::SECONDS_PER_HOUR;
      $day = TimeHelper::SECONDS_PER_DAY;

      $amout = DB::table('cart')->count();
      $count = DB::table('cart')->where('user', $user)->count();

      $schablon = Schablon::select(Schablon::$yonListt)->get(); // файл для шаблона
      $lvl = Level::select(Level::$fileTaibl)->get();

      $TaimHelper = new TaimHelper();


        return view('gem.cart', [ 
          'laf' => $userList,
          'has' => $schablon,
          'minut' => $minut,
          'hour' => $hour,
          'day' => $day,
          'lvl' => $lvl,
          'prob' => $TaimHelper,
          'drinkList' => $drinkList,
          'count' => $count,
        ]);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('gem.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //процесс покупки камеры
      $validated = $request->validate([
        'user' => ['required', 'string']
      ]);

      $data = $request->only(['user']);
      //dd($request);
      $userList = Cart::create($data);


      if($userList){
        return redirect()->route('gem.gem.index')->with('success', 'камера успешно куплена');
      }

      return back()->withInput()->with('error', 'Не удолось купить камеру');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  Cart $gem
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $gem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  Cart $gem
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $gem)
    {

      $sList = Images::select(Images::$allowedFields)->get();

    //  dd($sList);
      return view('gem.edit',[
          'lis' => $gem,
          'npsListt' => $sList,

      ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  CartUpdateRequest  $request
     * @param  int  Cart $gem
     * @return \Illuminate\Http\Response
     */
    public function update(CartUpdateRequest $request, Cart $gem)
    {
    //  dd($validated = $request->validated());
      $lvls = Auth::user()->lvl;
      $lv = Level::select(Level::$fileyon)->where('lvl', $lvls)->value('exp_to_lvl');


      $gem->dat = $timestamp = date("Y-m-d H:i:s");
      $gem = $gem->fill($validated = $request->validated())->save();


      $TimeHelper = new TaimHelper();

      $TimeHelper->peremennaj = request()->input('total_time');
      $TimeHelper->updated_at = date("Y-m-d H:i:s");

      // прибавление опыта игроку
      $ex = Auth::user()->exp; // общее количество опыта у игрока
      $level = Auth::user()->lvl; //уровень игрока
      $accrual = request()->input('exp'); // количество получаемого опыта
      $addition = $ex + $accrual;
      $result = $addition;

      if ($ex <= $lv) {
        $user = Users::findOrFail(Auth::user()->id);
        $user->exp = $result;
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

      if($gem){
        return redirect()->route('gem.gem.index')->with('success', 'Вы совершили действия ' . $accrual . ' опыта');
      }

      return back()->withInput()->with('error', 'Заключённый сбежал');
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
