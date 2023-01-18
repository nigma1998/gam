<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Images;
use App\Http\Requests\NpsUpdateRequest;
use App\Http\Requests\NpsStoreRequest;
use App\Services\UploadedService;

class NpsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $npsList = Images::select(Images::$allowedFields)->get();
      //    dd($npsList);
        return view('admin.user.nps',
        ['npsList' => $npsList,

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
      return view('admin.user.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  NpsStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NpsStoreRequest $request)
    {

      $validated = $request->validated();
      if($request->hasFile('image_url')){
      $uploadedService = app(UploadedService::class);
      $validated['image_url'] = $uploadedService->fileUpload(
        $request->file('image_url')
      );
      }
      $npsList = Images::create($validated);


      if($npsList){
        return redirect()->route('admin.nps.index')->with('success', 'nps успешно создан');
      }

      return back()->withInput()->with('error', 'Не удолось создать nps');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $np
     * @return \Illuminate\Http\Response
     */
    public function show(Images $np)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  Images $np
     * @return \Illuminate\Http\Response
     */
    public function edit(Images $np)
    {


    return view('admin.user.edit',[
        'npsLis' => $np
    ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  NpsUpdateRequest  $request
     * @param  int  Images $np
     * @return \Illuminate\Http\Response
     */
    public function update(NpsUpdateRequest $request, Images $np)
    {
      $validated = $request->validated();
      if($request->hasFile('image_url')){
      $uploadedService = app(UploadedService::class);
      $validated['image_url'] = $uploadedService->fileUpload(
        $request->file('image_url')
      );
      }

      $np = $np->fill($validated)->save();

      if($np){
        return redirect()->route('admin.nps.index')->with('success', 'nps успешно отредактирован');
      }

      return back()->withInput()->with('error', 'Не удолось отредактировать nps');
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
