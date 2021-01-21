@extends('layouts.app')
@section('content')
<div class="container">
  <div class="question-form row">
    <div class="col-8 mx-auto">
      <form action="/question" method="POST">
        @csrf
        <div class="mb-3">
          @isset($workbooks)
            <p class="bg-dark text-white fw-bold pl-2 pt-2 pb-2 mt-1 mb-0">フォルダ</p>
            @foreach ($workbooks as $workbook)
              <div class="form-check mt-1">
                <input class="form-check-input" type="radio" value="{{ $workbook->id }}", id="flexCheckDefault" name="workbook_id">
                <label class="form-check-label" for="flexCheckDefault">
                  {{ $workbook->title }}
                </label>
              </div>
            @endforeach
          @endisset
        </div>
        @component('components.set-question')
          @slot('btn_mark')
            決定
          @endslot
        @endcomponent
      </form>
    </div>
    <div class="col-4">
      <p class="bg-dark text-white fw-bold pl-2 pt-2 pb-2 mt-1 mb-0">投稿のススメ</p>
      <ul class="list-group">
        <li class="list-group-item">問題文は500文字以内</li>
        <li class="list-group-item">選択肢は2以上を設定</li>
        <li class="list-group-item">問題を作成後、フォルダやタグを設定できます</li>
        <li class="list-group-item">予備欄</li>
        <li class="list-group-item">予備欄</li>
      </ul>
    </div>
  </div>
</div>
@endsection
