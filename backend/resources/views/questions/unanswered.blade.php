@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-8 mx-auto">
    @if(!isset($questions[0]))
      <h3 class="text-center mt-3">問題が登録されていません。</h3>
    @endif
    </div>
  </div>
@isset($questions)
  <div class="alert-massages row">
    <div class="col-8 mx-auto">
    @if (session('message'))
      <div class="alert alert-danger">
          {{ session('message') }}
      </div>
    @endif
    </div>
  </div>
  @foreach ($questions as $question)
    <div class="question row">
      <div class="col-8 mx-auto border">
        <div class="row question-num">
          <div class="col-8 mt-4">
            <p class="question-id p-0 m-0">問題ID：{{ $question->id }}</p>
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
        <div class="answer-row hidden" id="answer-row">
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
          <div class="edit-btn row mx-auto">
            <a href="{{ route('question.edit', ['question' => $question->id]) }}"><button type="button" class="btn btn-primary mb-5" id="answer-btn">編集する</button></a>
            <form action="/question/{{$question->id}}" method="POST">
              @method('DELETE')
              @csrf
              <input class="btn btn-danger" type='submit' value='削除する'>
            </form>
          </div>
        </div>
      </div>
    </div>
  @endforeach
@endisset
</div>
@endsection
