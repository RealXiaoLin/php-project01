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
        <div class="col-8 mt-4">
          <p class="question-id p-0 m-0">問題ID：{{ $question->id }}</p>
          <p class="p-0 m-0">出題番号：{{ $questions->currentPage() }}</p>
        </div>
        <div class="col-4 mt-4">
          @if($question->status_num == 1)
            <p class="p-0 m-0 text-end">前回のステータス：<span class="btn btn-light pl-1 pr-1 pt-0 pb-0 m-0">未回答</span></p>
          @elseif($question->status_num == 2)
            <p class="p-0 m-0 text-end">前回のステータス：<span class="btn btn-primary pl-1 pr-1 pt-0 pb-0 m-0">正解</span></p>
          @elseif($question->status_num == 3)
            <p class="p-0 m-0 text-end">前回のステータス：<span class="btn btn-danger pl-1 pr-1 pt-0 pb-0 m-0">不正解</span></p>
          @endif
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
              <input name="answer" class="form-check-input me-1" type="radio" value="1" aria-label="...">
              {{ $question->choice_1 }}
            </li>
            <li class="list-group-item pl-5">
              <input name="answer" class="form-check-input me-1" type="radio" value="2" aria-label="...">
              {{ $question->choice_2 }}
            </li>
            @isset($question->choice_3)
            <li class="list-group-item pl-5">
              <input name="answer" class="form-check-input me-1" type="radio" value="3" aria-label="...">
              {{ $question->choice_3 }}
            </li>
            @endisset
            @isset($question->choice_4)
            <li class="list-group-item pl-5">
              <input name="answer" class="form-check-input me-1" type="radio" value="4" aria-label="...">
              {{ $question->choice_4 }}
            </li>
            @endisset
          </ul>
        </div>
      </div>
      <div class="answer-btn row">
        <button type="button" class="btn btn-primary col-6 mb-5 mx-auto" id="answer-btn">回答する</button>
      </div>
      <!-- ajax -->
      <script>
        $('#answer-btn').on('click', function () {
          $("#answer-row").show(300);
          $question_id = {{ $question->id }};
          $answer_choice = {{ $question->answer_choice }};
          $answered_choice = Number($('input[name="answer"]:checked').val());
          console.log($answered_choice);
          console.log($answer_choice);
          console.log($question_id);
          $.ajax({
            type: "POST",
            url: "/question/choice",
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            data: { 'answered_choice': $answered_choice, 'question_id': $question_id },
          });
        })
      </script>
      <!-- ajax -->
      <div class="answer-row hidden" id="answer-row" style="display: none;">
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
  </div>
  <div class="next-pre-btn row mt-3">
    <div class="col-8 mx-auto d-flex justify-content-between">
    @if ($questions->onFirstPage())
      <button type="button" class="btn btn-link"></button>
    @else
      <a href="{{ $questions->previousPageUrl() }}" class="text-reset"><button type="button" class="btn btn-primary">戻る</button></a>
    @endif
    @if ($questions->hasMorePages())
      <a href="{{ $questions->nextPageUrl() }}" class="text-reset"><button type="button" class="btn btn-primary">進む</button></a>
    @endif
    </div>
  </div>
  @endforeach
  @endisset
</div>
@endsection
