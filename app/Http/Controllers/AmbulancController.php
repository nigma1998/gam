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

class AmbulancController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user()->name;
        $drinks = Auth::user()->drink;
        $userList =  Ambulance::where('user', $user)->get();
    
        $drinkList =  Drinks::where('id', $drinks)->get();
    
          // данные взяты с файла хелпер
          $TimeHelper = new TimeHelper();
          $minut = TimeHelper::SECONDS_PER_MINUTE;
          $hour = TimeHelper::SECONDS_PER_HOUR;
          $day = TimeHelper::SECONDS_PER_DAY;
    
          $amout = DB::table('cart')->count();
          $count = DB::table('cart')->where('user', $user)->count(); 
          $lvl = Level::select(Level::$fileTaibl)->get();
    
          $TaimHelper = new TaimHelper();
    
    
            return view('ambulance.ambulance', [ 
              'laf' => $userList,
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
         //процесс покупки камеры
      $validated = $request->validate([
        'user' => ['required', 'string']
      ]);

      $data = $request->only(['user']);
      //dd($request);
      $userList = Ambulance::create($data);


      if($userList){
        return redirect()->route('ambulance.ambulance.index')->with('success', 'парк успешно куплен');
      }

      return back()->withInput()->with('error', 'Не удолось купить парк');
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
     * @param  int  Ambulance $ambulance
     * @return \Illuminate\Http\Response
     */
    public function edit(Ambulance $ambulance)
    {
        $sList = Images::select(Images::$allowedFields)->get();

        //  dd($sList);
          return view('ambulance.edit',[
              'ambulance' => $ambulance,
              'npsListt' => $sList,
    
          ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  CartUpdateRequest  $request
     * @param  int  Ambulance $ambulance
     * @return \Illuminate\Http\Response
     */
    public function update(CartUpdateRequest $request, Ambulance $ambulance)
    {
        $lvls = Auth::user()->lvl;
        $lv = Level::select(Level::$fileyon)->where('lvl', $lvls)->value('exp_to_lvl');
  
        
        $ambulance->dat = $timestamp = date("Y-m-d H:i:s");
       //
        $ambulance = $ambulance->fill($validated = $request->validated())->save();
  
  
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
  
        if($ambulance){
          return redirect()->route('ambulance.ambulance.index')->with('success', 'Вы совершили действия ' . $accrual . ' опыта');
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
