<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Canteen;
use App\Models\Level;
use App\Models\Cart;
use App\Models\Users;
use App\Models\Dish;
use App\Models\Schablon;
use App\Helper\TimeHelper;


class CanteenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      // данные взяты с файла хелпер
      $TimeHelper = new TimeHelper();
      $minut = TimeHelper::SECONDS_PER_MINUTE;
      $hour = TimeHelper::SECONDS_PER_HOUR;
      $day = TimeHelper::SECONDS_PER_DAY;
      $schablon = Schablon::select(Schablon::$yonListt)->get(); // файл для шаблона
      $user = Auth::user()->name;

      $userrList =  DB::table('Canteen')->where('user', $user)->get();
        return view('canteen.canteen', [
          'userlist' => $userrList,
          'has' => $schablon,
          'day' => $day,
          'minut' => $minut,
          'hour' => $hour,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('gem.nevCanteen');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //процесс покупки столовой
      $validated = $request->validate([
        'user' => ['required', 'string']
      ]);

      $data = $request->only(['user']);
//dd($request);
      $userList = Canteen::create($data);


      if($userList){
        return redirect()->route('gem.canteen.index')->with('success', 'кухня успешно куплена');
      }

      return back()->withInput()->with('error', 'Не удолось купить кухню');
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
     * @param  int  Canteen $canteen
     * @return \Illuminate\Http\Response
     */
    public function edit(Canteen $canteen)
    {
      $dishList = Dish::select(Dish::$allowedFields)->get();

        return view('canteen.edit', [
          'canteen' => $canteen,
          'dishList' => $dishList,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  Canteen $canteen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Canteen $canteen)
    {

      $lvls = Auth::user()->lvl;
      $lv = Level::select(Level::$fileyon)->where('lvl', $lvls)->value('exp_to_lvl');

      

      $request->validate([
        'product_name' => ['required', 'string']
      ]);

      $canteen->dat = $timestamp = date("Y-m-d H:i:s");
      $canteen = $canteen->fill($request->only(['id', 'image_url', 'product_name', 'ingredient_one', 'amount_one', 'ingredient_two',
      'amount_two', 'ingredient_three', 'amount_three', 'dat',
      'ingredient_four', 'ingredient_five', 'amount_five', 'ingredient_six', 'amount_six', 'exp', 'total_time' ]))->save();




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

      if($canteen){
        return redirect()->route('canteen.canteen.index')->with('success', 'рецепт успешно попал на кухню ' . $accrual . ' опыта');
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
