<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Workbook;
use App\Models\Question_workbook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\Paginator;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $questions = Auth::user()->questions()->paginate(1);
      return view('questions.index',['questions' => $questions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $user = Auth::user();
      $workbooks = $user->workbooks;
      return view('questions.create', ['workbooks' => $workbooks]);
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
        $question->user_id = Auth::user()->id;
        $question->save();

        if($request->workbook_id != null) {
          $question_id = $question->id;
          $question->workbooks()->attach(
            ['question_id' => $question_id],
            ['workbook_id' => $request->workbook_id],
          );
        }
        return redirect('question/'.$question->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('questions.show', [
            'question' => Question::findOrFail($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $question = Question::findOrFail($id);
      $workbooks = Auth::user()->workbooks;
      return view('questions.edit', ['question' => $question, 'workbooks' => $workbooks]);
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
        $question = Question::find($id);
        $question->body = $request->body;
        $question->choice_1 = $request->choice_1;
        $question->choice_2 = $request->choice_2;
        $question->choice_3 = $request->choice_3;
        $question->choice_4 = $request->choice_4;
        $question->answer_body = $request->answer_body;
        $question->answer_choice = $request->answer_choice;
        $question->update();
        return view('questions.show', ['question' => $question]);
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

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function choice(Request $request)
  {
      $answered_choice = $request->answered_choice;
      $question_id = $request->question_id;
      $question = Question::find($question_id);
      if($answered_choice == $question->answer_choice){
        $question->update(["status_num" => 2]);
      } else {
        $question->update(["status_num" => 3]);
      }
  }
}
