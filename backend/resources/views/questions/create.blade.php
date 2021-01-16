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
        <div class="mb-3">
          <p class="bg-dark text-white fw-bold pl-2 pt-2 pb-2 mt-1 mb-0">問題文</p>
          <textarea name="body" rows="5" class="form-control">{{ old('body') }}</textarea>
          @error('body')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="mb-3">
          <p class="bg-dark text-white fw-bold pl-2 pt-2 pb-2 mt-1 mb-0">選択肢</p>
          選択肢1<input type="text" name="choice_1" class="form-control" value="{{ old('choice_1') }}">
          @error('choice_1')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="mb-3">
          選択肢2<input type="text" name="choice_2" class="form-control" value="{{ old('choice_2') }}">
          @error('choice_2')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="mb-3">
          選択肢3<input type="text" name="choice_3" class="form-control" value="{{ old('choice_3') }}">
          @error('choice_3')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="mb-3">
          選択肢4<input type="text" name="choice_4" class="form-control" value="{{ old('choice_4') }}">
          @error('choice_4')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="mb-3">
          <p class="bg-dark text-white fw-bold pl-2 pt-2 pb-2 mt-1 mb-0">回答文</p>
          <textarea name="answer_body" rows="5" class="form-control">{{ old('answer_body') }}</textarea>
          @error('answer_body')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="mb-3">
          <p class="bg-dark text-white fw-bold pl-2 pt-2 pb-2 mt-1 mb-0">正解択</p>
          <select name="answer_choice" class="form-control"  value="{{ old('answer_choice') }}">
            <option selected>正解択を選択してください</option>
            <option value="1">選択肢1</option>
            <option value="2">選択肢2</option>
            <option value="3">選択肢3</option>
            <option value="4">選択肢4</option>
          </select>
          @error('answer_choice')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
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
