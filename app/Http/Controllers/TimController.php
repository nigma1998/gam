<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Cart;
use App\Models\Users;
use App\Models\Drinks;
use App\Http\Requests\DrinksUpdateRequest;

class TimController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $drinks = Drinks::select(Drinks::$allowedFields)->get();
        return view('gem.tim',[
            'drinks' => $drinks,
        ]);
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
     * @param  int  Cart $taim
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $taim)
    {
      return view('gem.tim',[
          'buton' => $taim,
      ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  DrinksUpdateRequest  $request
     * @param  int  Cart $taim
     * @return \Illuminate\Http\Response
     */
    public function update(DrinksUpdateRequest $request, Cart $taim)
    {

      $user = Users::findOrFail(Auth::user()->id);
      $user->drink = request()->input('drinks');
      $user->save();

      if($taim){
        return redirect()->route('gem.gem.index')->with('success', 'Напиток выбран');
      }

      return back()->withInput()->with('error', 'Неудалось выбрать напиток');
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
