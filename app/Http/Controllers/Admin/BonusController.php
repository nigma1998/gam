<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bonus;
use App\Services\UploadedService;

class BonusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $bonusList = Bonus::select(Bonus::$allowedFields)->get();

      return view('admin.bonus.bonus',
      ['bonusList' => $bonusList,

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
        return view('admin.bonus.create');
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
      $data = $request->only(['image_url', 'total_time', 'exp', 'name', 'price']);
      $dishList = Bonus::create($data);


      if($dishList){
        return redirect()->route('admin.dish.index')->with('success', 'Бонус успешно создан');
      }

      return back()->withInput()->with('error', 'Не удолось создать Бонус');
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
