<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view('questions.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('questions.create');
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
          'body' => ['bail', 'required', 'max:500'],
          'choice_1' => ['bail', 'required', 'max:100'],
          'choice_2' => ['bail', 'required', 'max:100'],
          'choice_3' => ['max:100'],
          'choice_4' => ['max:100'],
          'answer_body' => ['bail', 'required', 'max:500'],
          'answer_choice' => ['bail', 'required', 'in:1,2,3,4'],
        ]);

        $question = new Question;
        $question->body = $request->body;
        $question->choice_1 = $request->choice_1;
        $question->choice_2 = $request->choice_2;
        $question->choice_3 = $request->choice_3;
        $question->choice_4 = $request->choice_4;
        $question->answer_body = $request->answer_body;
        $question->answer_choice = $request->answer_choice;
        $question->save();
        return redirect('question/show'.$question->id);
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
