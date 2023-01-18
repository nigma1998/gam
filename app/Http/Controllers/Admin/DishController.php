<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Dish;
use App\Services\UploadedService;

class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $dishList = Dish::select(Dish::$allowedFields)->get();

      return view('admin.dish.dish',
      ['dishList' => $dishList,

    ]
    );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.dish.create');
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
        'name' => ['required', 'string'],
      ]);



      if($request->hasFile('image_url')){
      $uploadedService = app(UploadedService::class);
      $validated['image_url'] = $uploadedService->fileUpload(
        $request->file('image_url')
      );
      }
//dd($request);
      $data = $request->only(['id', 'name', 'ingredient_one', 'amount_one', 'ingredient_two',
      'amount_two', 'ingredient_three', 'amount_three',
      'ingredient_four', 'ingredient_five', 'amount_five', 'ingredient_six', 'amount_six']);
      $dishList = Dish::create($data);


      if($dishList){
        return redirect()->route('admin.dish.index')->with('success', 'Блюдо успешно создано');
      }

      return back()->withInput()->with('error', 'Не удолось создать nps');
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
     * @param  int  Dish $dish
     * @return \Illuminate\Http\Response
     */
    public function edit(Dish $dish)
    {
        return view('admin.dish.edit',[
          'dishList' => $dish
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  Dish $dish
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dish $dish)
    {

//dd($dish);
      $validated = $request->validate([
        'name' => ['required', 'string'],
        'ingredient_two' => ['required', 'string'],
        'ingredient_three' => ['required', 'string'],
        'exp' => ['required', 'string'],
        'total_time' => ['required', 'string'],

      ]);

      $data = $request->only(['id', 'name', 'ingredient_one', 'amount_one', 'ingredient_two',
      'amount_two', 'ingredient_three', 'amount_three',
      'ingredient_four', 'ingredient_five', 'amount_five', 'ingredient_six', 'amount_six', 'exp', 'total_time']);

      if($request->hasFile('image_url')){
      $uploadedService = app(UploadedService::class);
      $validated['image_url'] = $uploadedService->fileUpload(
        $request->file('image_url')
      );
      }

      $dish = $dish->fill($validated)->save();

      if($dish){
        return redirect()->route('admin.dish.index')->with('success', 'блюдо успешно отредактирован');
      }

      return back()->withInput()->with('error', 'Не удолось отредактировать');
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
