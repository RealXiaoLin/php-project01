@extends('layouts.app')
@section('content')
<div class="container">
  <div class="category-form row">
    <div class="col-8 mx-auto">
      <form action="/workbook" method="POST">
        @csrf
        <div class="mb-3">
          <p class="bg-dark text-white fw-bold pl-2 pt-2 pb-2 mt-1 mb-0">フォルダ名（30文字以内）</p>
          <input type="text" name="title" class="form-control">
          @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
        <button type="submit" class="btn btn-primary">フォルダを追加する</button>
      </form>
    </div>
  </div>
  <div class="tag-function-tab row m-0">
    <div class="col-8 mx-auto">
    <div class="row">
    <p class="col-12 bg-dark text-white fw-bold pl-2 pt-2 pb-2 mt-5 mb-0">フォルダ一覧</p>
    </div>
      <div class="row">
        <div class="col-3 border p-2">
          フォルダ1
        </div>
        <div class="col-3 border p-2">
          フォルダ2
        </div>
        <div class="col-3 border p-2">
          フォルダ3
        </div>
        <div class="col-3 border p-2">
          フォルダ4
        </div>
        <div class="col-3 border p-2">
          フォルダ1
        </div>
        <div class="col-3 border p-2">
          フォルダ2
        </div>
        <div class="col-3 border p-2">
          フォルダ3
        </div>
        <div class="col-3 border p-2">
          フォルダ4
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
