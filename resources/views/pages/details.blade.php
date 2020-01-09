@extends('layouts.app')

@section('title', 'Detail Tour')

@section('content')
    
<div class="hero-wrap js-fullheight" style="background-image: url('{{ url('frontend/images/bg_5.jpg')}}');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center" data-scrollax-parent="true">
          <div class="col-md-9 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
            <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="index.html">Home</a></span> <span class="mr-2"><a href="hotel.html">Wisata</a></span> <span>Single Wisata</span></p>
            <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Wisata Details</h1>
          </div>
        </div>
      </div>
    </div>


    <section class="ftco-section ftco-degree-bg">
      <div class="container">
        <div class="row">
        	<div class="col-lg-3 sidebar">
        		<div class="card card-details">
                    <h3 class="heading mb-4">Trip Informations</h3>
                    <table class="trip-informations">
                        <tr>
                        <th width="50%">Date of Ticket</th>
                        <td width="50%" class="text-right">{{ \Carbon\Carbon::create($item->date)->format('F n, Y') }}</td>
                        </tr>
                        <tr>
                        <th width="50%">Type</th>
                        <td width="50%" class="text-right">{{ $item->type }}</td>
                        </tr>
                        <tr>
                        <th width="50%">Price</th>
                        <td width="50%" class="text-right">Rp {{ $item->price }} / person</td>
                        </tr>
                    </table>
                </div>
                
                <div class="join-container">
                    @auth
                        <form action="{{ route('checkout_process', $item->id) }}" method="POST">
                            @csrf
                            <button class="btn btn-block btn-join-now mt-3 py-2" type="submit">
                                Join Now
                            </button>
                        </form>
                    @endauth
                    @guest
                        <a href="{{ route('login') }}" class="btn btn-block btn-join-now mt-3 py-2">
                            Login or Register to Join
                        </a>
                    @endguest
                </div>

        		<div class="card card-details">
        			<h3 class="heading mb-4">Star Rating</h3>
        			<form method="post" class="star-rating">
							  <div class="form-check">
									<input type="checkbox" class="form-check-input" id="exampleCheck1">
									<label class="form-check-label" for="exampleCheck1">
										<p class="rate"><span><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i></span></p>
									</label>
							  </div>
							  <div class="form-check">
						      <input type="checkbox" class="form-check-input" id="exampleCheck1">
						      <label class="form-check-label" for="exampleCheck1">
						    	   <p class="rate"><span><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star-o"></i></span></p>
						      </label>
							  </div>
							  <div class="form-check">
						      <input type="checkbox" class="form-check-input" id="exampleCheck1">
						      <label class="form-check-label" for="exampleCheck1">
						      	<p class="rate"><span><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star-o"></i><i class="icon-star-o"></i></span></p>
						     </label>
							  </div>
							  <div class="form-check">
							    <input type="checkbox" class="form-check-input" id="exampleCheck1">
						      <label class="form-check-label" for="exampleCheck1">
						      	<p class="rate"><span><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star-o"></i><i class="icon-star-o"></i><i class="icon-star-o"></i></span></p>
						      </label>
							  </div>
							  <div class="form-check">
						      <input type="checkbox" class="form-check-input" id="exampleCheck1">
						      <label class="form-check-label" for="exampleCheck1">
						      	<p class="rate"><span><i class="icon-star"></i><i class="icon-star-o"></i><i class="icon-star-o"></i><i class="icon-star-o"></i><i class="icon-star-o"></i></span></p>
							    </label>
							  </div>
							</form>
        		</div>
          </div>
          <div class="col-lg-9">
          	<div class="row">
          		<div class="col-md-12 ftco-animate">
          			<div class="single-slider owl-carousel">
                  @if($item->galleries->count() > 0)
                    <div class="item">
                      <div class="hotel-img" style="background-image: url({{Storage::url($item->galleries->first()->image)}});"></div>
                    </div>
                    <div class="item">
                    @foreach ($item->galleries as $gallery)
                        <a href="{{ Storage::url($gallery->image) }}">
                            <img
                                class="item"
                                width="128"
                                src="{{ Storage::url($gallery->image) }}"
                                xpreview="{{ Storage::url($gallery->image) }}"
                            />
                        </a>
                    @endforeach
                    </div>
                  @endif
          			</div>
          		</div>
          		<div class="col-md-12 hotel-single mt-4 mb-5 ftco-animate">
          			<span>Our Best hotels &amp; Rooms</span>
          			<h2>{{ $item->title }}</h2>
          			<p class="rate mb-5">
          				<span class="loc"><a href="#"><i class="icon-map"></i>{{ $item->location }}</a></span>
          				<span class="star">
    							<i class="icon-star"></i>
    							<i class="icon-star"></i>
    							<i class="icon-star"></i>
    							<i class="icon-star"></i>
    							<i class="icon-star-o"></i>
    							8 Rating</span>
                    </p>
                    <h5>Tentang Wisata</h5>
                    <p>{!! $item->about !!}</p>
          		</div>
          	</div>
          </div> <!-- .col-md-8 -->
        </div>
      </div>
    </section> <!-- .section -->

@endsection

@push('prepend-style')
<link rel="stylesheet" href="{{ url('frontend/libraries/xzoom/dist/xzoom.css') }}" />
@endpush

@push('addon-script')
<script src="{{ url('frontend/libraries/xzoom/dist/xzoom.min.js') }}"></script>
<script>
    $(document).ready(function() {
    $('.xzoom, .xzoom-gallery').xzoom({
        zoomWidth: 500,
        title: false,
        tint: '#333',
        Xoffset: 15
    });
    });
    </script>
    @endpush
