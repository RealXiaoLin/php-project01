@extends('layouts.app')
@section('content')
<div class="container">
  @csrf
  <div class="mb-3">
    @isset($questions)
      <p class="bg-dark text-white fw-bold pl-2 pt-2 pb-2 mt-1 mb-0">仮表示</p>
      @foreach ($questions as $question)
        <div class="form-check mt-1">
            {{ $question->body }}
            {{ $question->choice_1 }}
            {{ $question->choice_2 }}
        </div>
      @endforeach
    @endisset
  </div>
</div>
@endsection
