<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Images;
use App\Http\Requests\CartUpdateRequest;
use App\Models\Level;
use App\Models\Users;


class NpsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
     * @param  int  Images $nonesk
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $nonesk)
    {


      return view('gem.naf',[
          'lis' => $nonesk,
      ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  CartUpdateRequest  $request
     * @param  Cart $nonesk
     * @return \Illuminate\Http\Response
     */
    public function update(CartUpdateRequest $request, Cart $nonesk)
    {

  //    dd($validated = $request->validated());
     $validated = $request->validated();

      $nonesk = $nonesk->fill($validated)->save();


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

      if($nonesk){
        return redirect()->route('gem.gem.index')->with('success', 'вы совершили действия вы получили ' . $accrual . 'опыта');
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
