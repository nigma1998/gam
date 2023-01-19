<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Ambulance;
use App\Models\Level;
use App\Models\Users;
use App\Models\Drinks;
use App\Models\Images;
use App\Models\Schablon;
use App\Http\Requests\CartUpdateRequest;
use App\Helper\TimeHelper;
use App\Helper\TaimHelper;

class AmbulanceController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
    
        return view('ambulance.index');
    }

        /**
     * Update the specified resource in storage.
     *
     * @param  CartUpdateRequest  $request
     * @param  Ambulance $ambulance
     * @return \Illuminate\Http\Response
     */
    public function update(CartUpdateRequest $request, Ambulance $ambulance)
    {

  //    dd($validated = $request->validated());
     $ambulance = $request->validated();

      $ambulance = $ambulance->fill($validated)->save();


      $lvls = Auth::user()->lvl;
      $lv = Level::select(Level::$fileyon)->where('lvl', $lvls)->value('exp_to_lvl');
      // здесь реализована очищение таблицы игрока


    //  dd($gem);

    $ex = Auth::user()->exp; // общее количество опыта у игрока
    $monet = Auth::user()->coins; // общее количество монет у игрока
    $level = Auth::user()->lvl; //уровень игрока
    $accrual = request()->input('exp'); // количество получаемого опыта
    $coins = request()->input('coins'); // количество получаемых монет
    $addition = $ex + $accrual;
    $con = $monet + $coins;
    $result = $addition;

    if ($ex <= $lv) {
      $user = Users::findOrFail(Auth::user()->id);
      $user->exp = $result;
      $user->coins = $con;
      $user->save();
    }else{
      ++$level;
      $subtraction = $ex - $lv;
      $resul = $subtraction;
      $user = Users::findOrFail(Auth::user()->id);
      $user->exp = $resul;
      $user->coins = $con;
      $user->lvl = $level;
      $user->save();
    }

      if($ambulance){
        return redirect()->route('gem.gem.index')->with('success', 'вы совершили действия вы получили ' . $accrual . 'опыта');
     }

      return back()->withInput()->with('error', 'Заключённый сбежал');
    }
}
