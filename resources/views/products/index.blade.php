@extends('layouts.app')

@section('content')
    <h1>this is products page</h1>
    
    @if (count($products) > 0)
        @foreach ($products as $item)
            <!-- First product box start here-->
            <div class="prod-info-main prod-wrap clearfix">
                <div class="row">
                        <div class="col-md-5 col-sm-12 col-xs-12">
                            <div class="product-image">
                                <img src="assets/images/download.jpg" alt="194x228" class="img-responsive">
                            </div>
                        </div>
                        <div class="col-md-7 col-sm-12 col-xs-12">
                        <div class="product-deatil">
                                <h5 class="name">
                                <a href="/Products/{{$item->id}}">
                                        {{ $item->name }} <span>Product Category</span>
                                    </a>
                                </h5>
                                <p class="price-container">
                                    <span>$50</span>
                                </p>
                                <span class="tag1"></span>
                        </div>
                        <div class="description">
                            <p>A Short product description here </p>
                        </div>
                        <div class="product-info smart-form">
                            <div class="row">
                                <div class="col-md-12">
                                    <a href="javascript:void(0);" class="btn btn-danger">Add to cart</a>
                                    <a href="javascript:void(0);" class="btn btn-info">More info</a>
                                </div>
                                <div class="col-md-12">
                                    <div class="rating">Rating:
                                        <label for="stars-rating-5"><i class="fa fa-star text-danger"></i></label>
                                        <label for="stars-rating-4"><i class="fa fa-star text-danger"></i></label>
                                        <label for="stars-rating-3"><i class="fa fa-star text-danger"></i></label>
                                        <label for="stars-rating-2"><i class="fa fa-star text-warning"></i></label>
                                        <label for="stars-rating-1"><i class="fa fa-star text-warning"></i></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end product -->
        @endforeach
    @else
        <p>No Products Available</p>
    @endif
@endsection
