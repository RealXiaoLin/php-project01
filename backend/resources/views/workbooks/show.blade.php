@extends('layouts.app')
@section('content')
<div class="container">
  @if(!isset($questions[0]))
  <div class="row mb-3">
    <div class="col-12 mx-auto mb-3">
      <h3 class="text-center mt-3">問題がありません。</h3>
    </div>
      <a class="btn btn-primary col-xs-12 col-sm-4 mx-auto mb-3" href="{{ route('toppage.workbook') }}">問題集に戻る</a>
  </div>
  @endif
  @isset($questions)
  @foreach ($questions as $question)
    <div class="row mb-3">
      <div class="col-8 mx-auto">
        <div class="progress">
          <!-- 進捗バーの％表示 -->
          <?php
            $current_page = intval($questions->currentPage());
            $total_page = intval($questions->lastPage());
            $percentage = ( $current_page / $total_page ) * 100;
          ?>
          <!-- 進捗バーの％表示 -->
          <div class="progress-bar" role="progressbar" style="width:{{floor($percentage)}}%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">{{ $questions->firstItem() }} / {{ $questions->lastPage() }}</div>
        </div>
      </div>
    </div>
    <div class="question row">
      <div class="col-8 mx-auto border">
        <div class="row question-num">
          <div class="col-sm-8 col-xs-12 mt-4">
            <p class="question-id p-0 m-0">問題ID：{{ $question->id }}</p>
            <p class="p-0 m-0">出題番号：{{ $questions->currentPage() }}</p>
          </div>
          <div class="col-sm-4 col-xs-12 mt-4">
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
              <!-- 回答の内容を取得 -->
              <?php
                $ary = [];
                $ary[] = $question->choice_1;
                $ary[] = $question->choice_2;
                if ($question->choice_3 != null){
                  $ary[] = $question->choice_3;
                };
                if ($question->choice_4 != null){
                  $ary[] = $question->choice_4;
                };
                $answer_title = $ary[$question->answer_choice];
              ?>
              <!-- 回答の内容を取得 -->
              <ul class="list-group list-group-flush pl-3 pr-3">
                <li class="list-group-item border">{{ $answer_title }}</li>
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
    <div class="next-pre-btn row mt-3 mb-5">
      <div class="col-sm-8 col-xs-12 mx-auto d-flex justify-content-between">
      @if ($questions->onFirstPage())
        <button type="button" class="btn btn-link"></button>
      @else
        <a href="{{ $questions->previousPageUrl() }}" class="text-reset"><button type="button" class="btn btn-primary">戻る</button></a>
      @endif
      @if ($questions->hasMorePages())
        <a href="{{ $questions->nextPageUrl() }}" class="text-reset"><button type="button" class="btn btn-primary">進む</button></a>
      @else
        <a href="{{ route('workbook.score', ['workbook' => $id]) }}" class="text-reset"><button type="button" class="btn btn-info">終了</button></a>
      @endif
      </div>
    </div>
    <div class="comments-log row">
      <div class="col-8 mx-auto">
        <h3>MEMO</h3>
        <div class="row border">
          <div class="col-12 p-0">
            <ul class="list-group list-group-flush" id="comment">
              @foreach($question->comments as $comment)
              <li class="list-group-item" id="comment-area-{{$comment->id}}">
                <div class="row p-0">
                  <div class="col-sm-11 col-xs-12">
                    {{ $comment->body }}
                  </div>
                  <button type="button" class="btn btn-primary col-sm-1 col-xs-12" id="delete-btn-{{$comment->id}}">削除</button>
                </div>
              </li>
              <!-- ajax -->
              <script>
                $('#delete-btn-{{$comment->id}}').on('click', function () {
                  $comment_id = {{ $comment->id }};
                  console.log($comment_id);
                  $.ajax({
                    type: "POST",
                    url: "/question/comment/delete",
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                    data: { 'comment_id': $comment_id },
                    dataType: 'json',
                  }).done(function(data){
                    $('li').remove("#comment-area-{{$comment->id}}");
                  }).fail(function(XMLHttpRequest, textStatus, errorThrown){
                    alert(errorThrown);
                  })
                })
              </script>
              <!-- ajax -->
              @endforeach
            </ul>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-10 col-xs-12 p-0">
              <input type="text" name="comment_body" class="form-control" id="comment-form">
          </div>
          <button type="button" class="btn btn-primary col-sm-2 col-xs-12 mb-5 mx-auto" id="comment-btn">メモする</button>
        </div>
      </div>
    </div>
    <div class="comment-btn row mt-5">
    </div>
    <!-- ajax -->
    <script>
      $('#comment-btn').on('click', function () {
        $question_id = {{ $question->id }};
        $comment_body = $('#comment-form').val();
        $.ajax({
          type: "POST",
          url: "/question/comment",
          headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
          data: { 'comment_body': $comment_body, 'question_id': $question_id },
          dataType: 'json',
        }).done(function(data){
          $obj = document.getElementById('comment-form');
          $obj.value = '';
          $('#comment').append(
            `
            <li class="list-group-item" id="comment-area-${data[1]}">
              <div class="row p-0">
                <div class="col-sm-11 col-xs-12">
                  ${data[0]}
                </div>
                <button type="button" class="btn btn-primary col-sm-1 col-xs-12" id="delete-btn-${data[1]}">削除</button>
              </div>
            </li>
            `
            );
        }).fail(function(XMLHttpRequest, textStatus, errorThrown){
            alert(errorThrown);
        })
      })
    </script>
    <!-- ajax -->
  @endforeach
  @endisset
</div>
@endsection
