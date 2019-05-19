@extends('frontEnd.layouts.master')
@section('title','Detalles Page')
@section('slider')
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                @include('frontEnd.layouts.category_menu')
            </div>
            <div class="col-sm-9 padding-right">
                @if(Session::has('message'))
                    <div class="alert alert-success text-center" role="alert">
                        {{Session::get('message')}}
                    </div>
                @endif
        <div class="product-details"><!--product-details-->

            <div class="col-sm-5">
                <div class="easyzoom easyzoom--overlay easyzoom--with-thumbnails">
                    <a href="{{url('products/large',$detail_product->image)}}">
                        <img src="{{url('products/small',$detail_product->image)}}" alt="" id="dynamicImage"/>
                    </a>
                </div>

                <ul class="thumbnails" style="margin-left: -10px;">
                    <li>
                        @foreach($imagesGalleries as $imagesGallery)
                            <a href="{{url('products/large',$imagesGallery->image)}}" data-standard="{{url('products/small',$imagesGallery->image)}}">
                                <img src="{{url('products/small',$imagesGallery->image)}}" alt="" width="75" style="padding: 8px;">
                            </a>
                        @endforeach
                    </li>
                </ul>
            </div>
            <div class="col-sm-7">
                <form action="{{route('addToCart')}}" method="post" role="form">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <input type="hidden" name="products_id" value="{{$detail_product->id}}">
                    <input type="hidden" name="product_name" value="{{$detail_product->p_name}}">
                    <input type="hidden" name="product_code" value="{{$detail_product->p_code}}">
                    <input type="hidden" name="product_color" value="{{$detail_product->p_color}}">
                    <input type="hidden" name="price" value="{{$detail_product->price}}" id="dynamicPriceInput">
                    <div class="product-information"><!--/product-information-->
                        <img src="{{asset('frontEnd/images/product-details/new.jpg')}}" class="newarrival" alt="" />
                        <h2>{{$detail_product->p_name}}</h2>
                        <p>Code ID: {{$detail_product->p_code}}</p>
                        <span>
                            <select name="size" id="idSize" class="form-control">
                        	<option value="">Select Size</option>
                            @foreach($detail_product->attributes as $attrs)
                                <option value="{{$detail_product->id}}-{{$attrs->size}}">{{$attrs->size}}</option>
                            @endforeach
                        </select>
                        </span><br>
                        <span>
                            <span id="dynamic_price">MX ${{$detail_product->price}}</span>
                            <label>Cantidad:</label>
                            <input type="text" name="quantity" value="{{$totalStock}}" id="inputStock"/>
                            @if($totalStock>0)
                            <button type="submit" class="btn btn-fefault cart" id="buttonAddToCart">
                                <i class="fa fa-shopping-cart"></i>
                                Add to cart
                            </button>
                            @endif
                        </span>
                        <p><b>Availability:</b>
                            @if($totalStock>0)
                                <span id="availableStock">En Stock</span>
                            @else
                                <span id="availableStock">Agotado</span>
                            @endif
                        </p>
                        <p><b>Condicion:</b> New</p>

                    </div><!--/product-information-->
                </form>

            </div>
        </div><!--/product-details-->

        <div class="category-tab shop-details-tab"><!--category-tab-->
            <div class="col-sm-12">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#details" data-toggle="tab">Detalles</a></li>

                    <li><a href="#reviews" data-toggle="tab">Opiniones (No Disponible)</a></li>
                </ul>
            </div>
            <div class="tab-content">
                <div class="tab-pane fade active in" id="details" >
                    {{$detail_product->description}}
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
