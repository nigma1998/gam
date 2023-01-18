<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Users;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $usersList = Users::select(Users::$allowedFields)->get();
        return view('admin.users.index', [
          'usersList' => $usersList
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
     * @param  int  Users $user
     * @return \Illuminate\Http\Response
     */
    public function edit(Users $user)
    {
        return view('admin.users.edit', [
          'usersList' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  Users $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Users $user)
    {
      $validated = $request->validate([
        'name' => ['required', 'string']
      ]);

      $user = $user->fill($validated)->save();

      if($user){
        return redirect()->route('admin.users.index')->with('success', 'игрок успешно отредактирован');
      }

      return back()->withInput()->with('error', 'Не удолось отредактировать игрока');

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
