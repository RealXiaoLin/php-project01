@extends('layouts.app')
@section('content')
<div class="container">
  <div class="col-8 mx-auto">
  @isset($workbooks)
    @foreach ($workbooks as $workbook)
    <div class="row">
      <div class="col-8">
        <ul class="list-group">
          <li class="list-group-item">{{ $workbook->title }}</li>
        </ul>
      </div>
      <div class="col-4">
        <div class="row">
          <div class="col-6">
            <a href="{{ route('workbook.edit', ['workbook' => $workbook->id]) }}" class="btn btn-primary" role="button">編集</a>
          </div>
          <div class="col-6">
            <form action="/workbook/{{$workbook->id}}" method="POST">
            @method('DELETE')
            @csrf
              <input class="btn btn-danger" type='submit' value='削除'>
            </form>
          </div>
        </div>
      </div>
    </div>
    @endforeach
  @endisset
  </div>
</div>
@endsection
