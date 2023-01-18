<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Users;
use App\Models\Schablon;
use App\Models\Cart;
use App\Models\Bonus;
use App\Models\Medezine;
use App\Models\Delivery;
use App\Http\Requests\PharmaceuticalsUpdateRequest;
use App\Models\Level;
use App\Models\Pharmaceuticals;
use App\Helper\TimeHelper;
use App\Helper\TaimHelper;

class ButtonController extends Controller
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
     * @param  int  Pharmaceuticals $button
     * @return \Illuminate\Http\Response
     */
     public function edit(Pharmaceuticals $button)
    {
       
        $bonus = Bonus::select(Bonus::$allowedFields)->get();

        return view('pharmaceuticals.bonus',[
            'button' => $button,
            'bonus' => $bonus,
          ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  Pharmaceuticals $button
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pharmaceuticals $button)
    {

    //  dd($button->identifier);
      $button->dat = $timestamp = date("Y-m-d H:i:s");


      $button = $button->fill($request->only([ 'total_time', 'dat', 'identifier', 'delivery']))->save();



      if($button){
        return redirect()->route('pharmaceuticals.pharmaceuticals.index')->with('success', 'время сокращено');
      }

      return back()->withInput()->with('error', 'произошла ошибка');
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
