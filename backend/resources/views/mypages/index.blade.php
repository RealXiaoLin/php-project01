@extends('layouts.app')
@section('content')
<div class="container">
  <div class="top-tab row mb-4">
    <div class="col-12">
      <ul class="nav nav-pills nav-fill">
        <li class="nav-item">
          <a class="nav-link" href={{ $toppage_url }}>TOP</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href={{ $workbook_url }}>問題集</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page">ユーザー情報</a>
        </li>
      </ul>
    </div>
  </div>
  <div class="profile row ml-5 mr-5 mb-3">
    <div class="col-6 profile-picture">
      @if($user->image_path != null)
        <img src="{{ asset('storage/'.$user->image_path) }}" class="img-thumbnail" alt="プロフィール画像">
      @else
        <img src="{{ asset('storage/def_image.jpeg') }}" class="img-thumbnail" alt="デフォルトプロフィール画像">
      @endif
    </div>
    <div class="col-6 profile-list">
      <ul class="list-group">
        <li class="list-group-item">ニックネーム：{{ $user->name }}</li>
        <li class="list-group-item">メールアドレス：{{ $user->email }}</li>
        <li class="list-group-item">登録日：{{ $user->created_at }}</li>
        <!-- <li class="list-group-item">投稿数</li>
        <li class="list-group-item">最終ログイン日</li> -->
      </ul>
    </div>
  </div>
  <div class="row">
    <div class="col-3 ml-auto">
    <a href="{{ route('mypage.edit', ['mypage' => $user->id]) }}"class="btn btn-primary" aria-current="page">ユーザー情報編集</a>
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
