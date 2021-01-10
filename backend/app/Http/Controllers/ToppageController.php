<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ToppageController extends Controller
{
  public function index()
  {
    return view('toppages.index');
  }

  public function workbook()
  {
    return view('toppages.workbook');
  }
}
