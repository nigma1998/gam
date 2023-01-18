<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Users;
use App\Models\Schablon;
use App\Models\Cart;
use App\Models\Delivery;
use App\Models\Level;
use App\Models\Pharmaceuticals;
use App\Helper\TimeHelper;
use App\Helper\TaimHelper;

class GeneralController extends Controller
{
  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  Pharmaceuticals $button
   * @return \Illuminate\Http\Response
   */
  public function updat(Request $request, Pharmaceuticals $button)
  {

    dd($button);
    $button->dat = $timestamp = date("Y-m-d H:i:s");


    $button = $button->fill($request->only([ 'total_time', 'dat', 'identifier']))->save();



    if($button){
      return redirect()->route('pharmaceuticals.pharmaceuticals.index')->with('success', 'время сокращено');
    }

    return back()->withInput()->with('error', 'Заключённый сбежал');
  }
}
