<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Workbook;
use App\Models\Comment;
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
      $questions = Auth::user()->questions()->paginate(5);
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
        $validated = $request->validate([
          'body' => ['bail', 'required', 'max:500'],
          'choice_1' => ['bail', 'required', 'max:100'],
          'choice_2' => ['bail', 'required', 'max:100'],
          'choice_3' => ['max:100'],
          'choice_4' => ['max:100'],
          'answer_body' => ['bail', 'required', 'max:500'],
          'answer_choice' => ['bail', 'required', 'in:1,2,3,4'],
        ]);

        $question = Question::find($id);
        $question->body = $request->body;
        $question->choice_1 = $request->choice_1;
        $question->choice_2 = $request->choice_2;
        $question->choice_3 = $request->choice_3;
        $question->choice_4 = $request->choice_4;
        $question->answer_body = $request->answer_body;
        $question->answer_choice = $request->answer_choice;
        $question->update();

        $question_count = Auth::user()->questions()->count();
        $page = floor($question_count / 5);
        return redirect('/question?page='.$page)->with('message', "[問題ID:$id]を編集しました");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Question::find($id)->delete();
        return redirect('/question?page='.$id)->with('message', '削除しました');
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

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function comment(Request $request)
  {
      $validated = $request->validate([
        'comment_body' => ['bail', 'required', 'max:500'],
      ]);
      $question = Question::find($request->question_id);
      $comment = new Comment;
      $comment->body = $request->comment_body;
      $comment->user_id = Auth::user()->id;
      $comment->save();

      $question->comments()->attach(
        ['question_id' => $question->id],
        ['comment_id' => $comment->id],
      );

      $comment_data = [];
      $comment_data = [$comment->body, $comment->id];
      return response()->json($comment_data);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function search(Request $request)
  {
      $keyword = $request->keyword;
      if (!empty($keyword)) {
        $query = Auth::user()->questions()->where('body', 'LIKE', "%{$keyword}%");
      } else {
        $query = Auth::user()->questions();
      }
      $questions = $query->get();
      return view('questions.search',['questions' => $questions]);
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function unanswered()
  {
    $query = Auth::user()->questions()->where('status_num', 1);
    $questions = $query->get();
    return view('questions.unanswered',['questions' => $questions]);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function miss($id)
  {
    $questions = workbook::findOrFail($id)->questions;
    return view('questions.miss', ['question' => $questions]);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function select($id)
  {
    return view('questions.select', ['id' => $id]);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function deleteComment(Request $request)
  {
    Comment::find($request->comment_id)->delete();
    return response()->json("success");
  }
}
