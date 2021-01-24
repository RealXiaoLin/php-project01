<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MypageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $user = Auth::user();
      $workbook_url = action([ToppageController::class, 'workbook']);
      $toppage_url = action([ToppageController::class, 'index']);
      return view('mypages.index', [ 'user' => $user, 'toppage_url' => $toppage_url, 'workbook_url' => $workbook_url ]);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Auth::user();
        return view('mypages.edit', [ 'user' => $user ]);
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
        $validated = $request->validate([
            'name' => ['bail', 'required', 'max:20'],
            'email' => ['bail', 'required', 'max:100'],
            'image' => ['bail', 'file',  'image', 'mimes:jpeg,png'],
          ]);

        $workbook_url = action([ToppageController::class, 'workbook']);
        $toppage_url = action([ToppageController::class, 'index']);
        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;
        $path = $request->file('image')->store('public');
        $user->image_path = basename($path);
        $user->save();
        return view('mypages.index', [ 'user' => $user, 'toppage_url' => $toppage_url, 'workbook_url' => $workbook_url ]);
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
