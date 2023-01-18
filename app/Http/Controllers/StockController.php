<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Medezine;
use Illuminate\Support\Facades\Auth;
use App\Helper\TimeHelper;
use App\Models\Users;

class StockController extends Controller
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
    //  $status = DB::table('Stock')->where('name', $user)->get();

    //  $stockList = Delivery::select(Delivery::$allowedFields)->get();
      $stockList =  Medezine::where('user', $user)->get();


      return view('stock.stock', [
        'stockList' => $stockList,
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('stock.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      $validated = $request->validate([
        'name' => ['required', 'string']
      ]);

      $data = $request->only(['name']);
      //dd($request);
      $stocList = Stock::create($data);
//dd($stocList);
      $stoc = Auth::user()->stock;
      $room = '1';
      $addition = $stoc + $room;
      $result = $addition;

      $user = Users::findOrFail(Auth::user()->id);
      $user->stock = $result;
      $user->save();


      if($stocList){
        return redirect()->route('stock.stock.index')->with('success', 'склад успешно орендован');
      }

      return back()->withInput()->with('error', 'Не удолось орендовать склад');
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
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
