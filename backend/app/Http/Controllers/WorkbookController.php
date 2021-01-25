<?php

namespace App\Http\Controllers;

use App\Models\Workbook;
use App\Models\Comment;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\User;
use Illuminate\Pagination\Paginator;

class WorkbookController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $workbooks = Auth::user()->workbooks;
    return view('workbooks.index', [ 'workbooks' => $workbooks ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('workbooks.create');
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
          'title' => ['bail', 'required', 'max:30'],
        ]);

        $workbook = new Workbook;
        $workbook->title = $request->title;
        $workbook->user_id = Auth::user()->id;
        $workbook->save();
        // $workbook->fill($request->all())->save();
        return redirect('topworkbook/');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
      $questions = Workbook::find($id)->questions()->paginate(1);
      dump($questions);
      $questions_count = count($questions);

      return view('workbooks.show', ['questions' => $questions, 'questions_count' => $questions_count, 'id' => $id]);
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function miss($id)
  {
      $questions = workbook::findOrFail($id)->questions()->where('status_num', 3)->paginate(1);
      $questions_count = count($questions);
      return view('workbooks.show', ['questions' => $questions, 'questions_count' => $questions_count, 'id' => $id]);
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function unanswered($id)
  {
      $questions = workbook::findOrFail($id)->questions()->where('status_num', 1)->paginate(1);
      $questions_count = count($questions);
      return view('workbooks.show', ['questions' => $questions, 'questions_count' => $questions_count, 'id' => $id]);
  }


  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
      $workbook = Workbook::find($id);
      return view('workbooks.edit', ['workbook' => $workbook]);
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
        'title' => ['bail', 'required', 'max:30'],
      ]);
      $workbook = Workbook::find($id)->update(['title' => $request->title]);
      $workbooks = Auth::user()->workbooks;
      return view('workbooks.index', [ 'workbooks' => $workbooks ]);

  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
      $workbook = Workbook::find($id)->delete();
      $workbooks = Auth::user()->workbooks;
      return view('workbooks.index', [ 'workbooks' => $workbooks ]);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function score($id)
  {
    $workbook = Workbook::find($id);
    $questions = $workbook->questions;
    $questions_count = count($questions);
    $un_answer_questions = $questions->where('status_num', 1);
    $un_answer_questions_count = count($un_answer_questions);
    $collect_questions = $questions->where('status_num', 2);
    $collect_questions_count = count($collect_questions);
    $failed_questions = $questions->where('status_num', 3);
    $failed_questions_count = count($failed_questions);

    return view('workbooks.score', ['workbook' => $workbook, 'questions' => $questions, 'questions_count' => $questions_count, 'failed_questions_count' => $failed_questions_count, 'collect_questions_count' => $collect_questions_count, 'un_answer_questions_count' => $un_answer_questions_count, 'id' => $id]);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function review($id)
  {
    $questions = Workbook::find($id)->questions()->where('status_num', 3)->paginate(1);
    $questions_count = count($questions);

    return view('workbooks.review', ['questions' => $questions, 'questions_count' => $questions_count, 'id' => $id]);
  }
}
