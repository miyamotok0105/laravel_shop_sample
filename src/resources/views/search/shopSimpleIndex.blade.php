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
        @foreach($shops as $shop)
          <div class="row">
            <div class="col-md-3">
              {{ $shop->getId() }}
            </div>
            <div class="col-md-3">
              {{ $shop->getName() }}
            </div>
          </div>
          
        @endforeach
      @endif
    @endif

</div>
@endsection
