@extends('layouts.app')

@section('content')
<div class="container">

  <div class="container">
    <div class="row">
        <h4 class="col-md-3 ">店舗検索</h4>
        <div class="col-md-3 ">
            <form class="form-inline">
                <div class="form-group">
                <input type="text" name="keyword" value="{{ $keyword }}"
                placeholder="検索したいキーワードを入力">
                <input type="submit" value="検索" >
                </div>
            </form>
        </div>
    </div>
  </div>
  <div class="container">

    @if($shops != null)
      @if(count($shops) > 0)
        <table class="table table-striped table-bordered" style="width:100%">
          <thead>
              <tr>
                  <th>ID</th>
                  <th>店舗名</th>
              </tr>
          </thead>
          <tbody>
          @foreach($shops as $shop)
              <tr>
                  <td>{{ $shop->getId() }}</td>
                  <td>{{ $shop->getName() }}</td>
              </tr>
          @endforeach
          </tbody>
        </table>
      @endif
    @endif

</div>
@endsection
