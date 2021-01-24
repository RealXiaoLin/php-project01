@extends('layouts.app')
@section('content')
<div class="container">
  <div class="select-questions row">
    <div class="col-8 mx-auto">
      <div class="description row">
        <div class="col-12 mb-3">
          <p class="text-center">問題の種別を選択してください。</p>
        </div>
      </div>
      <div class="row">
          <a class="btn btn-primary col-xs-12 col-sm-3 mx-auto mb-3" href="{{ route('workbook.show', ['workbook' => $id]) }}" role="button">全ての問題</a>
          <a class="btn btn-primary col-xs-12 col-sm-3 mx-auto mb-3" href="{{ route('workbook.miss', ['workbook' => $id]) }}" role="button">間違えた問題</a>
          <a class="btn btn-primary col-xs-12 col-sm-3 mx-auto mb-3" href="{{ route('workbook.unanswered', ['workbook' => $id]) }}" role="button">未回答の問題</a>
      </div>
    </div>
  </div>
</div>
@endsection
