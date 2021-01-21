@extends('layouts.app')
@section('content')
<div class="container">
  <div class="question row">
    <div class="col-8 mx-auto border">
      <div class="row question-num">
        <div class="col-12 mt-4">
          問題番号：{{ $question->id }}
        </div>
      </div>
      <div class="question-body row mt-4 p-3">
        <div class="col-12">
          {{ $question->body }}
        </div>
      </div>
      <div class="question-choice row">
        <div class="col-12 p-5">
          <ul class="list-group">
            <li class="list-group-item pl-5">
              <input class="form-check-input me-1" type="checkbox" value="" aria-label="...">
              {{ $question->choice_1 }}
            </li>
            <li class="list-group-item pl-5">
              <input class="form-check-input me-1" type="checkbox" value="" aria-label="...">
              {{ $question->choice_2 }}
            </li>
            @isset($question->choice_3)
            <li class="list-group-item pl-5">
              <input class="form-check-input me-1" type="checkbox" value="" aria-label="...">
              {{ $question->choice_3 }}
            </li>
            @endisset
            @isset($question->choice_4)
            <li class="list-group-item pl-5">
              <input class="form-check-input me-1" type="checkbox" value="" aria-label="...">
              {{ $question->choice_4 }}
            </li>
            @endisset
          </ul>
        </div>
      </div>
      <div class="answer-body row p-3">
        <p>回答</p>
        <div class="col-12">
          <ul class="list-group list-group-flush pl-3 pr-3">
            <li class="list-group-item border">{{ $question->answer_choice }}</li>
          </ul>
        </div>
      </div>
      <div class="answer row p-3">
        <div class="col-12">
          {{ $question->answer_body }}
        </div>
      </div>
    </div>
  </div>
  <div class="next-pre-btn row mt-3">
    <div class="col-8 mx-auto">
      <a class="nav-link p-0 pl-2 m-0" href="{{ route('toppage.workbook') }}">問題集ページに戻る</a>
    </div>
  </div>
</div>
@endsection
