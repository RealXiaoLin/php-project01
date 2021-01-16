<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;

class WorkbookController extends Controller
{
    public function index()
  {
    return view('toppages.index', [ 'mypage_url' => $mypage_url, 'workbook_url' => $workbook_url ]);
  }
}
