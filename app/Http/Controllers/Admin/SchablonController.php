<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Schablon;
use App\Services\UploadedService;

class SchablonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      $list = Schablon::select(Schablon::$allowedFields)->get();
        return view('admin.schablon.index', [
          'schbList' => $list,
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
      return view('admin.schablon.create');
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

        ]);

        if($request->hasFile('url')){
        $uploadedService = app(UploadedService::class);
        $validated['url'] = $uploadedService->fileUpload(
          $request->file('url')
        );
        }

        $data = $request->only(['url']);
        $list = Schablon::create($data);


        if($list){
          return redirect()->route('admin.schablon.index')->with('success', 'schablon успешно создан');
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
     * @param  int  Schablon $schablon
     * @return \Illuminate\Http\Response
     */
    public function edit(Schablon $schablon)
    {
      return view('admin.schablon.edit',[
          'lis' => $schablon
      ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  Schablon $schablon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Schablon $schablon)
    {
      $validated = $request->validate([

      ]);

      $data = $request->only(['url']);

      if($request->hasFile('url')){
      $uploadedService = app(UploadedService::class);
      $validated['url'] = $uploadedService->fileUpload(
        $request->file('url')
      );
      }

      $schablon = $schablon->fill($validated)->save();

      if($schablon){
        return redirect()->route('admin.nps.index')->with('success', 'nps успешно отредактирован');
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
