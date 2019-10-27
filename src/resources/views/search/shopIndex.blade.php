@extends('layouts.app')

@section('content')
<div class="container">

  <div class="container">
    <div class="row">
        <h4 class="col-md-3 mx-auto">店舗検索</h4>
        <div class="col-md-3 mx-auto">
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
        <div class="row">
          <div class="col-lg-8 mx-auto">

            <!-- List group-->
            <ul class="list-group shadow">
            @foreach($shops as $shop)
              <!-- list group item-->
              <li class="list-group-item">
                <!-- Custom content-->
                <div class="media align-items-lg-center flex-column flex-lg-row p-3">
                  <div class="media-body order-2 order-lg-1">
                    <h5 class="mt-0 font-weight-bold mb-2">{{ $shop->getId() }}</h5>
                    <p class="font-italic text-muted mb-0 small">{{ $shop->getName() }}</p>
                    <div class="d-flex align-items-center justify-content-between mt-1">
                      <h6 class="font-weight-bold my-2"></h6>
                      <ul class="list-inline small">
                        <li class="list-inline-item m-0"><i class="fa fa-star text-success"></i></li>
                        <li class="list-inline-item m-0"><i class="fa fa-star text-success"></i></li>
                        <li class="list-inline-item m-0"><i class="fa fa-star text-success"></i></li>
                        <li class="list-inline-item m-0"><i class="fa fa-star text-success"></i></li>
                        <li class="list-inline-item m-0"><i class="fa fa-star-o text-gray"></i></li>
                      </ul>
                    </div>
                  </div><img src="https://res.cloudinary.com/mhmd/image/upload/v1556485076/shoes-1_gthops.jpg" alt="Generic placeholder image" width="200" class="ml-lg-5 order-1 order-lg-2">
                </div>
                <!-- End -->
              </li>
              <!-- End -->
            @endforeach
            </div>
          </div>
        </div>
      @endif
    @endif

</div>
@endsection
