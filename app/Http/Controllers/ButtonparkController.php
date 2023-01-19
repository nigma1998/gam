<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ButtonparkRequest;
use App\Models\Ambulance;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Level;
use App\Models\Users;

class ButtonparkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ButtonparkRequest  $request
     * @param  int  Ambulance $buttonpark
     * @return \Illuminate\Http\Response
     */
    public function update(ButtonparkRequest $request, Ambulance $buttonpark)
    {
        $validated = $request->validated();

        $buttonpark = $buttonpark->fill($validated)->save();
  
  
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
  
        if($buttonpark){
          return redirect()->route('ambulance.ambulance.index')->with('success', 'вы совершили действия вы получили ' . $accrual . 'опыта');
       }
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
