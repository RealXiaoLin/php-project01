@extends('layouts.app')
@section('content')
<div class="container">
  <div class="top-tab row mb-4">
    <div class="col-12">
      <ul class="nav nav-pills nav-fill">
        <li class="nav-item">
          <a class="nav-link" href="http://localhost:10080">TOP</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="http://localhost:10080/workbook">問題集</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">ユーザー情報</a>
        </li>
      </ul>
    </div>
  </div>
  <div class="profile row ml-5 mr-5">
    <div class="col-2 profile-picture">
      <img src="..." class="rounded mx-auto d-block" alt="ユーザー画像表示欄">
    </div>
    <div class="col-10 profile-list">
      <ul class="list-group">
        <li class="list-group-item">ユーザーネーム</li>
        <li class="list-group-item">メールアドレス</li>
        <li class="list-group-item">登録日</li>
        <li class="list-group-item">投稿数</li>
        <li class="list-group-item">最終ログイン日</li>
      </ul>
    </div>
  </div>
  <div class="Post ml-5 mr-5 mt-5">
    <div class="Post-list row">
      <div class="col-12">
        <div class="p-2 bg-dark text-white">投稿</div>
      </div>
    </div>
    <div class="Post-list-tab row m-0">
      <div class="col-12">
        <div class="row">
          <div class="col-6 border p-2">
            投稿した問題
          </div>
          <div class="col-4 border p-2">
            投稿した問題に関する情報
          </div>
          <div class="col-2 border p-2">
            投稿した日時
          </div>
        </div>
        <div class="row">
          <div class="col-6 border p-2">
            投稿した問題
          </div>
          <div class="col-4 border p-2">
            投稿した問題に関する情報
          </div>
          <div class="col-2 border p-2">
            投稿した日時
          </div>
        </div>
        <div class="row">
          <div class="col-6 border p-2">
            投稿した問題
          </div>
          <div class="col-4 border p-2">
            投稿した問題に関する情報
          </div>
          <div class="col-2 border p-2">
            投稿した日時
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
