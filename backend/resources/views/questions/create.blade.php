@extends('layouts.app')
@section('content')
<div class="container">
  <div class="question-form row">
    <div class="col-8 mx-auto">
      <form>
        <div class="mb-3">
          <p class="bg-dark text-white fw-bold pl-2 pt-2 pb-2 mt-1 mb-0">問題文</p>
          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
          <p class="bg-dark text-white fw-bold pl-2 pt-2 pb-2 mt-1 mb-0">選択肢</p>
          <input type="password" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
          <input type="password" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
          <input type="password" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
          <input type="password" class="form-control" id="exampleInputPassword1">
        </div>
        <button type="submit" class="btn btn-primary">投稿する</button>
      </form>
    </div>
    <div class="col-4">
      <p class="bg-dark text-white fw-bold pl-2 pt-2 pb-2 mt-1 mb-0">投稿のススメ</p>
      <ul class="list-group">
        <li class="list-group-item">Cras justo odio</li>
        <li class="list-group-item">Dapibus ac facilisis in</li>
        <li class="list-group-item">Morbi leo risus</li>
        <li class="list-group-item">Porta ac consectetur ac</li>
        <li class="list-group-item">Vestibulum at eros</li>
      </ul>
    </div>
  </div>
</div>
@endsection
