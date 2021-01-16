<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\MypageController;
use Illuminate\Support\Facades\Auth;

class ToppageController extends Controller
{
  public function index()
  {
    $mypage_url = action([MypageController::class, 'index']);
    $workbook_url = action([ToppageController::class, 'workbook']);
    return view('toppages.index', [ 'mypage_url' => $mypage_url, 'workbook_url' => $workbook_url ]);
  }

  public function workbook()
  {
    $mypage_url = action([MypageController::class, 'index']);
    $toppage_url = action([ToppageController::class, 'index']);
    $question_url = action([QuestionController::class, 'create']);
    $category_create_url = action([CategoryController::class, 'create']);
    $workbook_create_url = action([WorkbookController::class, 'create']);

    $user = Auth::user();
    $workbooks = $user->workbooks;

    return view('toppages.workbook', [ 'mypage_url' => $mypage_url, 'toppage_url' => $toppage_url, 'question_url' => $question_url, 'category_create_url' => $category_create_url, 'workbook_create_url' => $workbook_create_url, 'workbooks' => $workbooks]);
  }
}
