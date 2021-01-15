@extends('layouts.app')
@section('content')
<div class="container">
  <div class="top-tab row  mb-4">
    <div class="col-12">
      <ul class="nav nav-pills nav-fill">
        <li class="nav-item">
          <a class="nav-link" href={{ $toppage_url }}>TOP</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page">問題集</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href={{ $mypage_url }}>ユーザー情報</a>
        </li>
      </ul>
    </div>
  </div>
  <div class="Membership">
    <div class="Membership-function row">
      <div class="col-12">
        <div class="p-2 bg-dark text-white">会員機能</div>
      </div>
    </div>
    <div class="Membership-function-tab row m-0">
      <div class="col-3 border p-2">
        成績表
      </div>
      <div class="col-3 border p-2">
        未回答
      </div>
      <div class="col-3 border p-2">
        間違えた問題
      </div>
      <div class="col-3 border p-2">
        <a href={{ $question_url }}>問題の登録</a>
      </div>
    </div>
  </div>
  <div class="workbook">
    <div class="workbook-function row">
      <div class="col-12">
        <div class="p-2 bg-dark text-white">問題集</div>
      </div>
    </div>
    <div class="workbook-function-tab row m-0">
      <div class="col-3 border p-2">
        問題集タイトル1
      </div>
      <div class="col-3 border p-2">
        問題集タイトル2
      </div>
      <div class="col-3 border p-2">
        問題集タイトル3
      </div>
      <div class="col-3 border p-2">
        問題集タイトル4
      </div>
    </div>
  </div>
  <div class="tag mt-5">
    <div class="tag-function row">
      <div class="col-12">
        <div class="p-2 bg-dark text-white">タグ別</div>
      </div>
    </div>
    <div class="tag-function-tab row m-0">
      <div class="col-3 border p-2">
        タグ1
      </div>
      <div class="col-3 border p-2">
        タグ2
      </div>
      <div class="col-3 border p-2">
        タグ3
      </div>
      <div class="col-3 border p-2">
        タグ4
      </div>
      <div class="col-3 border p-2">
        タグ1
      </div>
      <div class="col-3 border p-2">
        タグ2
      </div>
      <div class="col-3 border p-2">
        タグ3
      </div>
      <div class="col-3 border p-2">
        タグ4
      </div>
    </div>
  </div>
  <div class="favorite mt-5">
    <div class="favorite-function row">
      <div class="col-12">
        <div class="p-2 bg-dark text-white">お気に入り別</div>
      </div>
    </div>
    <div class="favorite-function-tab row m-0">
      <div class="col-3 border p-2">
        お気に入り1
      </div>
      <div class="col-3 border p-2">
        お気に入り2
      </div>
      <div class="col-3 border p-2">
        お気に入り3
      </div>
      <div class="col-3 border p-2">
        お気に入り4
      </div>
      <div class="col-3 border p-2">
        お気に入り1
      </div>
      <div class="col-3 border p-2">
        お気に入り2
      </div>
      <div class="col-3 border p-2">
        お気に入り3
      </div>
      <div class="col-3 border p-2">
        お気に入り4
      </div>
    </div>
  </div>
</div>
@endsection
