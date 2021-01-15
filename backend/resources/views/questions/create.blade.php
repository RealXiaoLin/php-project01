@extends('layouts.app')
@section('content')
<div class="container">
  <div class="question-form row">
    <div class="col-8 mx-auto">
      <form action="/question" method="POST">
        @csrf
        <div class="mb-3">
          <p class="bg-dark text-white fw-bold pl-2 pt-2 pb-2 mt-1 mb-0">問題文</p>
          <textarea name="body" rows="5" class="form-control"></textarea>
        </div>
        <div class="mb-3">
          <p class="bg-dark text-white fw-bold pl-2 pt-2 pb-2 mt-1 mb-0">選択肢</p>
          選択肢1<input type="text" name="choice_1" class="form-control">
        </div>
        <div class="mb-3">
          選択肢2<input type="text" name="choice_2" class="form-control">
        </div>
        <div class="mb-3">
          選択肢3<input type="text" name="choice_3" class="form-control">
        </div>
        <div class="mb-3">
          選択肢4<input type="text" name="choice_4" class="form-control">
        </div>
        <div class="mb-3">
          <p class="bg-dark text-white fw-bold pl-2 pt-2 pb-2 mt-1 mb-0">回答文</p>
          <textarea name="answer_body" rows="5" class="form-control"></textarea>
        </div>
        <div class="mb-3">
          <p class="bg-dark text-white fw-bold pl-2 pt-2 pb-2 mt-1 mb-0">正解択</p>
          <select name="answer_choice" class="form-control">
            <option selected>正解択を選択してください</option>
            <option value="1">選択肢1</option>
            <option value="2">選択肢2</option>
            <option value="3">選択肢3</option>
            <option value="4">選択肢4</option>
          </select>
        </div>
        <button type="submit" class="btn btn-primary">投稿する</button>
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
