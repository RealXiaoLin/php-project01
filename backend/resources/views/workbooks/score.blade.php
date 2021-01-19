@extends('layouts.app')
@section('content')

<div class="container">
  <div class="col-8 mx-auto">
    <div class="workbook-title row border-bottom mb-3">
      <div class="col-12">
        <h3>{{$workbook->title}} - 結果</h3>
      </div>
    </div>
    <!-- 正答率表示用 -->
    <?php
      $correct_answer_rate = floor(($collect_questions_count / $questions_count) * 100);
      $failed_answer_rate = floor(($failed_questions_count / $questions_count) * 100);
      $un_answer_rate = floor(($un_answer_questions_count / $questions_count) * 100);
      $max_rate = $correct_answer_rate + $failed_answer_rate + $un_answer_rate;
      ?>
    <!-- 正答率表示用 -->
    <div class="middle-contents border p-4 mb-5">
      <div class="row">
        <div class="col-12">
          <h5>
            問題数：{{$questions_count}} |
            未回答：{{$un_answer_questions_count}} |
            正解：{{$collect_questions_count}} |
            不正解：{{$failed_questions_count}}
          </h5>
        </div>
      </div>
      <div class="correct-answer-rate row mb-4">
        <div class="col-12">
          <div class="progress">
            <div class="progress-bar" role="progressbar" style="width:{{$correct_answer_rate}}%;" aria-valuenow="{{$correct_answer_rate}}" aria-valuemin="0" aria-valuemax="{{$max_rate}}">{{$correct_answer_rate}}%</div>
            <div class="progress-bar bg-success" role="progressbar" style="width: {{$failed_answer_rate}}%" aria-valuenow="{{$failed_answer_rate}}" aria-valuemin="0" aria-valuemax="{{$max_rate}}">{{$failed_answer_rate}}%</div>
            @if($un_answer_questions_count >= 1)
            <div class="progress-bar bg-info" role="progressbar" style="width: {{$un_answer_rate}}%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="{{$max_rate}}">{{$un_answer_rate}}%</div>
            @endif
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <h1>正答率：{{$correct_answer_rate}}%</h1>
        </div>
      </div>
    </div>
    <div class="check-failed-answer-btn row">
    @if($failed_questions_count == 0 && $un_answer_questions_count == 0)
      <a href="{{ route('toppage.workbook') }}" class="text-reset col-4 mx-auto"><button type="button" class="btn btn-primary">問題集ページに戻る</button></a>
    @else
      <a href="{{ route('workbook.review', ['workbook' => $id]) }}" class="text-reset col-4 mx-auto"><button type="button" class="btn btn-primary">不正解と未回答を見直す</button></a>
      <a href="{{ route('toppage.workbook') }}" class="text-reset col-4 mx-auto"><button type="button" class="btn btn-primary">問題集ページに戻る</button></a>
    @endif
    </div>
  </div>
</div>
@endsection
