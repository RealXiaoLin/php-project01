@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-8 mx-auto">
      <form action="/mypage/{{$user->id}}" method="POST" enctype='multipart/form-data'>
      @method('PUT')
      @csrf
        <div class="row">
          <div class="col-8 mx-auto">
            @if($user->image_path != null)
            <img src="{{ asset('storage/'.$user->image_path) }}" class="img-thumbnail"  alt="プロフィール画像">
            @endif
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="mb-3">
              <input class="form-control" type="file" name="image" id="formFile">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="mb-3">
              <label for="user-name" class="form-label">ユーザーネーム</label>
              <input type="text" name="name" class="form-control" id="user-name" value="{{$user->name}}">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Email</label>
              <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$user->email}}">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary">更新</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
