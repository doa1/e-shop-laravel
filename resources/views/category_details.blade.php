@extends('master')
@section('content')
<!-- banner-2 -->
<div class="page-head_agile_info_w3l">

</div>
<!-- //banner-2 -->
<!-- page -->
<div class="services-breadcrumb">
    <div class="agile_inner_breadcrumb">
        <div class="container">
            <ul class="w3_short">
                <li>
                    <a href="{{route('home')}}">Home</a>
                    <i>|</i>
                </li>
                <li>{{$category->name}}</li>
            </ul>
        </div>
    </div>
</div>
<!-- //page -->

<!-- top Products -->
<div class="ads-grid py-sm-5 py-4">
    <div class="container py-xl-4 py-lg-2">
        <!-- tittle heading -->
        <h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
           Products under <span>{{$category->name}}</span> Category</h3>
        <!-- //tittle heading -->
        <div class="row">
            <!-- product left -->
            <div class="agileinfo-ads-display col-lg-9">
                <div class="wrapper">
                    <!-- first section -->
                    <div class="product-sec1 px-sm-4 px-3 py-sm-5  py-3 mb-4">
                    @if($category->products->isNotEmpty())
                        <div class="row">
                        @foreach($category->products as $item)
                            <div class="col-md-4 product-men mt-md-0 mt-5">
                                <div class="men-pro-item simpleCart_shelfItem">
                                    <div class="men-thumb-item text-center">
                                        @if(!$item->image)<img src="{{asset('images/m1.jpg')}}" alt="" class="img-thumbnail img-fluid">
                                        @else
                                        <img src="{{asset('uploads/'.$item->image)}}" alt="" class="img-thumbnail img-fluid">
                                        @endif
                                        <div class="men-cart-pro">
                                            <div class="inner-men-cart-pro">
                                                <a href="{{route('product-details',$item->id)}}" class="link-product-add-cart">Quick View</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item-info-product text-center border-top mt-4">
                                        <h4 class="pt-1">
                                            <a href="{{route('product-details',$item->id)}}">{{$item->title}}</a>
                                        </h4>
                                        <div class="info-product-price my-2">
                                            <span class="item_price">Ksh {{$item->discount_price}}</span>
                                            <del>Ksh {{$item->original_price}}</del>
                                        </div>
                                        <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
                                            <form action="#" method="post">
                                                <fieldset>
                                                    <input type="hidden" name="cmd" value="_cart" />
                                                    <input type="hidden" name="add" value="1" />
                                                    <input type="hidden" name="business" value=" " />
                                                    <input type="hidden" name="item_name" value="{{$item->title}}" />
                                                    <input type="hidden" name="item_id" value="{{$item->id}}" />
                                                    <input type="hidden" name="item_image" value="{{$item->image}}" />
                                                    <input type="hidden" name="amount" value="{{$item->original_price}}" />
                                                    <input type="hidden" name="discount_amount" value="{{$item->discount_amount()}}" />
                                                    <input type="hidden" name="currency_code" value="KSH" />
                                                    <input type="hidden" name="return" value=" " />
                                                    <input type="hidden" name="cancel_return" value=" " />
                                                    <input type="submit" name="submit" value="Add to cart" class="button btn" />
                                                </fieldset>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        @endforeach
                        </div>
                    @else
                        <h2 class="text-capitalize text-danger text-center">Currently there are no products under this category</h2>
                    @endif
                    </div>

                </div>
            </div>
            <!-- //product left -->
            <!-- product right -->

        </div>
    </div>
</div>
<!-- //top products -->
@stop()
