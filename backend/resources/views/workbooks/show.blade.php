@extends('layouts.app')
@section('content')
@isset($questions)
<div class="container">
@foreach ($questions as $question)
  <div class="row mb-3">
    <div class="col-8 mx-auto">
      <div class="progress">
        <?php
          $current_page = intval($questions->currentPage());
          $total_page = intval($questions->lastPage());
          $percentage = ($current_page / $total_page);
        ?>
        <div class="progress-bar" role="progressbar" style="width:33%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">{{ $questions->firstItem() }} / {{ $questions->lastPage() }}</div>
      </div>
    </div>
  </div>
  <div class="question row">
    <div class="col-8 mx-auto border">
      <div class="row question-num">
        <div class="col-12 mt-4">
          問題番号：{{ $questions->currentPage() }}
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
      <div class="answer-btn row">
        <button type="button" class="btn btn-primary col-6 mx-auto">回答する</button>
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
    <div class="col-8 mx-auto d-flex justify-content-between">
    @if ($questions->onFirstPage())
      <button type="button" class="btn btn-link"></button>
    @else
      <button type="button" class="btn btn-primary"><a href="{{ $questions->previousPageUrl() }}" class="text-reset">戻る</a></button>
    @endif
    @if ($questions->hasMorePages())
      <button type="button" class="btn btn-primary"><a href="{{ $questions->nextPageUrl() }}" class="text-reset">進む</a></button>
    @endif
    </div>
  </div>
  @endforeach
  @endisset
</div>
@endsection
