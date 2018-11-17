@extends('layouts.app')
@section('content')
<center><h2>Products</h2></center>
<section class="gray-bg section-padding" id="service-page">
        <div class="container">
            <div class="row">
              @foreach($products as $product)
                <div class="col-xs-12 col-sm-4">
                    <div class="box">
                        <div class="box-icon">
                            <img src='{{ asset("product_image/$product->product_img") }}' alt="">
                        </div><br><br><br><br><br>
                        <div class="row" style="background-color:#c0a6f414; padding:20px">
                          <h3>{{ $product->name }}</h3>
                          <p>{{ $product->product_code }}</p>
                          <p>{{(isset( $product->category->name ))? $product->category->name : ""}}</p>

                        </div>
                        <br>
                        <div class="caption-button" data-animation="animated fadeInUp">
                            <a href="{{url('buy/'.$product->id)}}" class=" button" >Buy</a>
                        </div><br>
                        <p class="">{{ $product->created_at }}</p>
                    </div>
                </div>

                @endforeach
            </div>
        </div>
    </section>


@endsection
