@extends('layouts.app')
@section('content')
<div class="container">
  <div class="top-tab row mb-4">
    <div class="col-12">
      <ul class="nav nav-pills nav-fill">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">TOP</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="http://localhost:10080/workbook">問題集</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">ユーザー情報</a>
        </li>
      </ul>
    </div>
  </div>
  <div class="row top-descriptions">
    <div class="col-8 mr-1 border border-3">
      <div class="row">
        <div class="col-12">
          <h4 class="border-bottom fw-bold pt-2 pb-2">本サイトについて</h4>
        </div>
        <div class="col-12 border-bottom-0">
          問題をカテゴリーやサービス毎に掲載しています。
          全問解説付きなので、問題を解きながら理解を深めることができます。
          ぜひ当サイトで学習して効率的に学習を進めてください。
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <h4 class="border-bottom fw-bold pt-2 pb-2">お知らせ</h4>
        </div>
        <div class="col-12 border-bottom-0">
          <p>2021-01-04　◯◯◯◯さんが「◯◯◯◯」を追加</p>
          <p>2021-01-04　◯◯◯◯さんが「◯◯◯◯」を追加</p>
          <p>2021-01-04　◯◯◯◯さんが「◯◯◯◯」を追加</p>
          <p>2021-01-04　◯◯◯◯さんが「◯◯◯◯」を追加</p>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <h4 class="border-bottom fw-bold pt-2 pb-2">効果的な使い方</h4>
        </div>
        <div class="col-12 border-bottom-0">
          根拠となる画像などを表示
        </div>
      </div>
    </div>
    <div class="col-3 ml-1 border border-3">
      <div class="row">
        <div class="col-12 p-2">
          <p class="bg-dark text-white fw-bold pl-2 pt-2 pb-2 mt-1 mb-0">お役立ち情報</p>
          <ul class="list-group">
            <li class="list-group-item">Cras justo odio</li>
            <li class="list-group-item">Dapibus ac facilisis in</li>
            <li class="list-group-item">Morbi leo risus</li>
            <li class="list-group-item">Porta ac consectetur ac</li>
            <li class="list-group-item">Vestibulum at eros</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
