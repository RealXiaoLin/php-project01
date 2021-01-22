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
    <div class="search-tab row">
      <div class="col-12">
        <div class="p-2 bg-dark text-white">検索</div>
      </div>
      <div class="col-12">
        <form action="{{ route('question.search') }}" method="POST">
          @method('POST')
          @csrf
          <div class="row">
            <div class="col-11">
              <input type="text" class="form-control" name="keyword">
              ※問題文の内容を検索します。
            </div>
            <div class="col-1">
              <input type="submit" class="btn btn-primary" value="検索">
            </div>
          </div>
        </form>
      </div>
    </div>
    <div class="Membership-function row  mt-5">
      <div class="col-12">
        <div class="p-2 bg-dark text-white">会員機能</div>
      </div>
    </div>
    <div class="Membership-function-tab row m-0">
      <div class="col-3 border p-2">
        <a href="{{ route('question.index') }}">問題一覧</a>
      </div>
      <div class="col-3 border p-2">
        <a href="{{ route('question.unanswered') }}">未回答</a>
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
        <div class="p-2 bg-dark text-white d-flex">
        フォルダ
        <a class="nav-link p-0 pl-2 m-0" href={{ $workbook_create_url }}>(新規フォルダ登録)</a>
        <a class="nav-link p-0 pl-2 m-0" href="{{ route('workbook.index') }}">(フォルダ編集)</a>
        </div>
      </div>
    </div>
    @isset($workbooks)
      <div class="workbook-function-tab row m-0">
        @foreach ($workbooks as $workbook)
        <div class="col-3 border p-2">
          <a class="nav-link p-0 pl-2 m-0" href="{{ route('workbook.show', ['workbook' => $workbook->id]) }}">{{ $workbook->title }}</a>
        </div>
        @endforeach
      </div>
    @endisset
  </div>
  <div class="tag mt-5">
    <div class="tag-function row">
      <div class="col-12">
        <div class="p-2 bg-dark text-white d-flex">
        タグ別
        <a class="nav-link p-0 pl-2 m-0" href={{ $category_create_url }}>(新規タグ登録)</a>
        </div>
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
