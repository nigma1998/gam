<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Delivery;
use App\Services\UploadedService;

class MedicinesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $medicomentList = Delivery::select(Delivery::$allowedFields)->get();
    //    dd($npsList);
      return view('admin.medicoment.medicoment',
      ['medicomentList' => $medicomentList,
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
        return view('admin.medicoment.create');
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
        'product_name' => ['required', 'string']
      ]);

      if($request->hasFile('image_url')){
      $uploadedService = app(UploadedService::class);
      $validated['image_url'] = $uploadedService->fileUpload(
        $request->file('image_url')
      );
      }

      $data = $request->only(['image_url', 'total_time', 'exp', 'product_name', 'income',  'amount', 'price']);
      $npsList = Delivery::create($data);


      if($npsList){
        return redirect()->route('admin.medicines.index')->with('success', 'Медикомент успешно создан');
      }

      return back()->withInput()->with('error', 'Не удолось создать Медикомент');
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
     * @param  int  Delivery $medicine
     * @return \Illuminate\Http\Response
     */
    public function edit(Delivery $medicine)
    {
      return view('admin.medicoment.edit',[
          'medicine' => $medicine
      ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  Delivery $medicine
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Delivery $medicine)
    {
      $validated = $request->validate([
        'product_name' => ['required', 'string'],
        'exp' => ['required', 'string'],
        'total_time' => ['required', 'string'],
        'income' => ['required', 'string'],
      //  'description' => ['required', 'string'],
      ]);

      $data = $request->only(['product_name', 'total_time', 'exp', 'description', 'image_url']);

      if($request->hasFile('image_url')){
      $uploadedService = app(UploadedService::class);
      $validated['image_url'] = $uploadedService->fileUpload(
        $request->file('image_url')
      );
      }

      $medicine = $medicine->fill($validated)->save();

      if($medicine){
        return redirect()->route('admin.medicines.index')->with('success', 'Медикомент успешно отредактирован');
      }

      return back()->withInput()->with('error', 'Не удолось создать nps');
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
