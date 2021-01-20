@extends('layouts.app')
@section('content')
<div class="container">
  <div class="category-form row">
    <div class="col-8 mx-auto">
      <form action="/workbook/{{$workbook->id}}" method="POST">
        @method('PUT')
        @csrf
        <div class="mb-3">
          <p class="bg-dark text-white fw-bold pl-2 pt-2 pb-2 mt-1 mb-0">フォルダ名（30文字以内）</p>
          <input type="text" name="title" class="form-control" value="{{$workbook->title}}">
          @error('title')
            <div class="alert alert-danger">{{ $workbook }}</div>
          @enderror
        </div>
        <button type="submit" class="btn btn-primary">フォルダを編集する</button>
      </form>
    </div>
  </div>
</div>
@endsection
