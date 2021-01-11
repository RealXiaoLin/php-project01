@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row mb-3">
    <div class="col-8 mx-auto">
      <div class="progress">
        <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
      </div>
    </div>
  </div>
  <div class="question row">
    <div class="col-8 mx-auto border">
      <div class="row  question-num">
        <div class="col-12 mt-4">
          問題番号
        </div>
      </div>
      <div class="question-body row mt-4 p-3">
        <div class="col-12">
          あなたはソリューションアーキテクトとして、Amazon S3からサーバーに転送するデータ量を削減することで、データ取得処理のレイテンシーを低減しようとしています。 これを実現するには、シンプルなSQLステートメントを使用してAmazon S3オブジェクトのコンテンツをフィルタして、必要なデータのサブセットのみを取得する構成が必要です。この要件を満たすために利用するべきサービスを選択してください。
        </div>
      </div>
      <div class="question-choice row">
        <div class="col-12 p-5">
          <ul class="list-group">
            <li class="list-group-item pl-5">
              <input class="form-check-input me-1" type="checkbox" value="" aria-label="...">
              Cras justo odio
            </li>
            <li class="list-group-item pl-5">
              <input class="form-check-input me-1" type="checkbox" value="" aria-label="...">
              Dapibus ac facilisis in
            </li>
            <li class="list-group-item pl-5">
              <input class="form-check-input me-1" type="checkbox" value="" aria-label="...">
              Morbi leo risus
            </li>
            <li class="list-group-item pl-5">
              <input class="form-check-input me-1" type="checkbox" value="" aria-label="...">
              Porta ac consectetur ac
            </li>
            <li class="list-group-item pl-5">
              <input class="form-check-input me-1" type="checkbox" value="" aria-label="...">
              Vestibulum at eros
            </li>
          </ul>
        </div>
      </div>
      <div class="question-answer row p-3">
        <div class="col-12">
          回答
        </div>
      </div>
      <div class="question-answer-body row">
        <div class="col-12 p-5">
          <ul class="list-group list-group-flush">
            <li class="list-group-item">Cras justo odio</li>
            <li class="list-group-item">Dapibus ac facilisis in</li>
            <li class="list-group-item">Morbi leo risus</li>
            <li class="list-group-item">Porta ac consectetur ac</li>
            <li class="list-group-item">Vestibulum at eros</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="next-pre-btn row mt-3">
    <div class="col-8 mx-auto d-flex justify-content-between">
      <button type="button" class="btn btn-primary">戻る</button>
      <button type="button" class="btn btn-primary">進む</button>
    </div>
  </div>
</div>
@endsection
