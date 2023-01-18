<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Drinks;
use App\Services\UploadedService;
use App\Http\Requests\DrinksUpdateRequest;
use App\Http\Requests\DrinksStoreRequest;

class DrinksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $drinkList = Drinks::select(Drinks::$allowedFields)->get();
    //    dd($npsList);
      return view('admin.drink.drink',
      ['drinkList' => $drinkList,

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
        return view('admin.drink.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  DrinksStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DrinksStoreRequest $request)
    {
      $validated = $request->validated();
      if($request->hasFile('image_url')){
      $uploadedService = app(UploadedService::class);
      $validated['image_url'] = $uploadedService->fileUpload(
        $request->file('image_url')
      );
      }
      $drinkList = Drinks::create($validated);


      if($drinkList){
        return redirect()->route('admin.drinks.index')->with('success', 'продукт успешно создан');
      }

      return back()->withInput()->with('error', 'Не удолось создать продукт');
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
     * @param  int  Drinks $drink
     * @return \Illuminate\Http\Response
     */
    public function edit(Drinks $drink)
    {
      return view('admin.drink.edit',[
          'drink' => $drink
      ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  DrinksUpdateRequest  $request
     * @param  int  Drinks $drink
     * @return \Illuminate\Http\Response
     */
    public function update(DrinksUpdateRequest $request, Drinks $drink)
    {
      $validated = $request->validated();
    //  dd($validated = $request->validated());
      if($request->hasFile('image_url')){
      $uploadedService = app(UploadedService::class);
      $validated['image_url'] = $uploadedService->fileUpload(
        $request->file('image_url')
      );
      }

      $drink = $drink->fill($validated)->save();

      if($drink){
        return redirect()->route('admin.drinks.index')->with('success', 'продукт успешно отредактирован');
      }

      return back()->withInput()->with('error', 'Не удолось отредактировать продукт');
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
