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
                <li>{{$product[0]->title}}</li>
            </ul>
        </div>
    </div>
</div>
<!-- //page -->

<!-- Single Page -->
<div class="banner-bootom-w3-agileits py-5">
    <div class="container py-xl-4 py-lg-2">
        <!-- tittle heading -->
        <h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
            <span>P</span>roduct
            <span>D</span>etails</h3>
        <!-- //tittle heading -->
        @if(session('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{session('message')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
        @foreach($product as $item)
        <div class="row">

            <div class="col-lg-5 col-md-8 single-right-left ">
                <div class="grid images_3_of_2">
                    <div class="flexslider">
                        <ul class="slides">
                            <li data-thumb="{{asset('uploads/'.$item->image)}}">
                                <div class="thumb-image">
                                    <img src="{{asset('uploads/'.$item->image)}}" data-imagezoom="true" class="img-fluid" alt=""> </div>
                            </li>
                            <li data-thumb="images/si2.jpg">
                                <div class="thumb-image">
                                    <img src="{{asset('images/si2.jpg')}}" data-imagezoom="true" class="img-fluid" alt=""> </div>
                            </li>
                            <li data-thumb="images/si3.jpg">
                                <div class="thumb-image">
                                    <img src="images/si3.jpg" data-imagezoom="true" class="img-fluid" alt=""> </div>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>

            <div class="col-lg-7 single-right-left simpleCart_shelfItem">
                <h3 class="mb-3">{{$item->title}}</h3>
                <p class="mb-3">
                    <span class="item_price">Ksh. {{$item->discount_price}}</span>
                    <del class="mx-2 font-weight-light">Ksh.{{$item->original_price}}</del>
                    <label>Free delivery</label>
                </p>
                <div class="single-infoagile">
                    <ul>
                        <li class="mb-3">
                            Cash on Delivery Eligible.
                        </li>
                        <li class="mb-3">
                            Shipping Speed to Delivery.
                        </li>

                    </ul>
                </div>
                <div class="product-single-w3l">
                    <p class="my-3">
                        <i class="far fa-hand-point-right mr-2"></i>
                        <label>1 Year</label>Manufacturer Warranty</p>
                    <p class="my-sm-4 my-3">
                        <i class="fas fa-retweet mr-3"></i>Net banking & Credit/ Debit/ ATM card
                    </p>
                </div>
                <div class="occasion-cart">
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
                                <input type="hidden" name="item_id" value="{{$item->id}}" />
                                <input type="hidden" name="item_image" value="{{$item->image}}" />
                                <input type="hidden" name="return" value=" " />
                                <input type="hidden" name="cancel_return" value=" " />
                                <input type="submit" name="submit" value="Add to cart" class="button" />

                            </fieldset>
                        </form>
                        <p style="margin-top:10px" >
                                <a href="{{route('edit-product',$item->id)}}" class="btn btn-warning">
                                <span class="fa fa-edit"></span>Edit</a>
                                {!! Form::open(['method'=>'DELETE','route'=>['delete-product',$item->id],
                                'style'=>'display:inline;float:right;margin-top:-25px','id'=>'delForm']) !!}
                                {!!Form::submit('Delete',['class'=>'btn btn-xs btn-danger',]) !!}
                                {!! Form::close()!!}
                                    </p>
                    </div>
                </div>
            </div>
            <script type="text/javascript">
                $(document).ready({
                        $('#delForm').on('submit',function (event) {
                            event.preventDefault();
                            confirm('Are you sure to delete '+{{$item->title}},function(btn){

                            })
                          })
                });
            </script>
        </div>
        @endforeach
    </div>
</div>
<!-- //Single Page -->
@stop
