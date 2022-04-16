<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>E-commerce product detail</title>

    <link href="{{asset('backend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('backend/font-awesome/css/font-awesome.css')}}" rel="stylesheet">

    <link href="{{asset('backend/css/plugins/slick/slick.css')}}" rel="stylesheet">
    <link href="{{asset('backend/css/plugins/slick/slick-theme.css')}}" rel="stylesheet">

    <link href="{{asset('backend/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('backend/css/style.css')}}" rel="stylesheet">



    <style>
        .rating {
            font-size: 13px;
            line-height: 13px;
            display: inline-block;
        }

        .rating .star {
            position: relative;
            float: left;
            width: 14px;
            height: 13px;
            font-family: FontAwesome;
            font-weight: normal;
            font-style: normal;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, .4);
            border: 0;
            background: transparent;
        }

        .rating .star:before {
            position: absolute;
            top: 50%;
            left: 50%;
            width: 13px;
            height: 13px;
            transform: translate(-50%, -50%);
            content: "\f006";
            color: #777;
        }

        .rating--read-only .star--full:before {
            content: "\f005";
            color: #FFED85;
        }
    </style>

</head>

<body>

    <div id="wrapper">

        <div id="page-wrapper" style="width: 100%" class="gray-bg">

            <div class="wrapper wrapper-content animated fadeInRight">

                <div class="row">
                    <div class="col-lg-12">

                        <div class="ibox product-detail">
                            <div class="ibox-content">

                                <div class="row">
                                    <div class="col-md-5">

                                        <div class="product-images">
                                            <img src="{{URL::to($product->product_image)}}" width="300" alt="">
                                        </div>

                                    </div>
                                    <div class="col-md-7">

                                        <h2 class="font-bold m-b-xs">
                                            {{$product->product_name}}
                                        </h2>

                                        <?php
                                    $product_review = round(App\Models\ProductReview::where('product_id', $product->id)->avg('review_count'));
                                    $product_review_count = App\Models\ProductReview::where('product_id', $product->id)->count();
                                    ?>

                                        <div class="rating rating--read-only">
                                            @if($product_review == 0)
                                            <span class="star"></span>
                                            <span class="star"></span>
                                            <span class="star"></span>
                                            <span class="star"></span>
                                            <span class="star"></span>

                                            @elseif($product_review == 1)
                                            <span class="star star--full"></span>
                                            <span class="star"></span>
                                            <span class="star"></span>
                                            <span class="star"></span>
                                            <span class="star"></span>
                                            @elseif($product_review == 2)
                                            <span class="star star--full"></span>
                                            <span class="star star--full"></span>
                                            <span class="star"></span>
                                            <span class="star"></span>
                                            <span class="star"></span>
                                            @elseif($product_review == 3)
                                            <span class="star star--full"></span>
                                            <span class="star star--full"></span>
                                            <span class="star star--full"></span>
                                            <span class="star"></span>
                                            <span class="star"></span>
                                            @elseif($product_review == 4)
                                            <span class="star star--full"></span>
                                            <span class="star star--full"></span>
                                            <span class="star star--full"></span>
                                            <span class="star star--full"></span>
                                            <span class="star"></span>
                                            @elseif($product_review == 5)
                                            <span class="star star--full"></span>
                                            <span class="star star--full"></span>
                                            <span class="star star--full"></span>
                                            <span class="star star--full"></span>
                                            <span class="star star--full"></span>
                                            @endif

                                            <span class="reviews-link ml-1"> ({{$product_review_count}}
                                                reviews)</span>

                                        </div>

                                        <div class="m-t-md">
                                            <h2 class="product-main-price">$ {{$product->product_price}} <small
                                                    class="text-muted">Exclude
                                                    Tax</small> </h2>
                                        </div>
                                        <hr>

                                        <h4>Product Description</h4>

                                        <div class="small text-muted">
                                            {{$product->product_description}}
                                        </div>
                                        <dl class="small m-t-md">
                                            <p><b>Category:</b> {{$product->product_category}}</p>
                                            <p><b>Brand:</b> {{$product->product_brand}}</p>

                                        </dl>
                                        <hr>

                                        <div>
                                            <div class="btn-group">
                                                <button class="btn btn-primary btn-sm mr-1"><i
                                                        class="fa fa-cart-plus"></i>
                                                    Add to cart</button>
                                                <button class="btn btn-white btn-sm"><i class="fa fa-star"></i> Add to
                                                    wishlist </button>

                                            </div>
                                        </div>



                                    </div>
                                </div>

                            </div>
                            <div class="ibox-footer">
                                <span class="float-right">
                                    Stock In - <i class="fa fa-clock-o"></i>
                                    {{Carbon\Carbon::parse($product->created_at)->format('d.m.Y h:i A')}}
                                </span>
                                The generated Lorem Ipsum is therefore always free
                            </div>
                        </div>

                    </div>
                </div>



                <div class="product-review">

                </div>

                <div class="row">
                    <div class="col-lg-12">

                        <div class="ibox ">

                            <h1 class="font-bold m-b-xs mb-3 text-center">{{__('Product Reviews')}}</h1>

                            <div class="ibox-content">

                                <?php
                            $product_reviews = App\Models\ProductReview::where('product_id', $product->id)->get();
                            ?>

                                <div>
                                    <div class="chat-activity-list">

                                        @foreach($product_reviews as $product_review)
                                        <div class="chat-element">

                                            <div class="media-body ">
                                                <small
                                                    class="float-right text-navy">{{Carbon\Carbon::parse($product_review->created_at)->diffForHumans()}}</small>
                                                <h3>{{$product_review->customer_name}}</h3>
                                                <div class="rating rating--read-only">
                                                    @if($product_review->review_count == 0)
                                                    <span class="star"></span>

                                                    @elseif($product_review->review_count == 1)
                                                    <span class="star star--full"></span>
                                                    <span class="star"></span>
                                                    <span class="star"></span>
                                                    <span class="star"></span>
                                                    <span class="star"></span>
                                                    @elseif($product_review->review_count == 2)
                                                    <span class="star star--full"></span>
                                                    <span class="star star--full"></span>
                                                    <span class="star"></span>
                                                    <span class="star"></span>
                                                    <span class="star"></span>
                                                    @elseif($product_review->review_count == 3)
                                                    <span class="star star--full"></span>
                                                    <span class="star star--full"></span>
                                                    <span class="star star--full"></span>
                                                    <span class="star"></span>
                                                    <span class="star"></span>
                                                    @elseif($product_review->review_count == 4)
                                                    <span class="star star--full"></span>
                                                    <span class="star star--full"></span>
                                                    <span class="star star--full"></span>
                                                    <span class="star star--full"></span>
                                                    <span class="star"></span>
                                                    @elseif($product_review->review_count == 5)
                                                    <span class="star star--full"></span>
                                                    <span class="star star--full"></span>
                                                    <span class="star star--full"></span>
                                                    <span class="star star--full"></span>
                                                    <span class="star star--full"></span>
                                                    @endif


                                                </div>
                                                <p class="m-b-xs">
                                                    {{$product_review->message ?? ''}}
                                                </p>
                                                <small
                                                    class="text-muted">{{Carbon\Carbon::parse($product_review->created_at)->format('l h:i A - d.m.Y')}}</small>
                                            </div>
                                        </div>
                                        @endforeach


                                    </div>
                                </div>

                                <h2 class="font-bold m-b-xs mt-5 ml-2">Write Review</h2>

                                <div class="row ">
                                    <div class="col-col-8">


                                        <div class="chat-form m-3">

                                            <form action="{{route('product-review.store')}}" method="post"
                                                class="comment-form">
                                                @csrf

                                                <input type="hidden" name="product_id" value="{{$product->id}}">
                                                <input type="hidden" name="status" value="1">
                                                <input type="hidden" name="datetime"
                                                    value="{{Carbon\Carbon::now()->toDateTimeString();}}">

                                                <!-- rating start -->
                                                <div class="form-group" id="rating-ability-wrapper">
                                                    <label class="control-label" for="rating">
                                                        <span class="field-label-info"></span>
                                                        <input type="hidden" id="selected_rating" value=""
                                                            required="required">
                                                    </label>




                                                    <!-- rating button start -->
                                                    <button type="button" class="btnrating btn btn-grey btn-sm"
                                                        data-attr="1" id="rating-star-1">
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                    </button>
                                                    <button type="button" class="btnrating btn btn-grey btn-sm"
                                                        data-attr="2" id="rating-star-2">
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                    </button>
                                                    <button type="button" class="btnrating btn btn-grey btn-sm"
                                                        data-attr="3" id="rating-star-3">
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                    </button>
                                                    <button type="button" class="btnrating btn btn-grey btn-sm"
                                                        data-attr="4" id="rating-star-4">
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                    </button>
                                                    <button type="button" class="btnrating btn btn-grey btn-sm"
                                                        data-attr="5" id="rating-star-5">
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                    </button>
                                                    <!-- rating button end -->


                                                    <span class="ml-1">

                                                        <input type="text" name="review_count"
                                                            class="qty-input selected-rating" readonly
                                                            style="width:14px; border:none;">

                                                        <span>/ 5</span>

                                                    </span>

                                                </div>
                                                <!-- rating end -->

                                                <div class="form-group">
                                                    <div class="row vert-margin-middle">
                                                        <div class="col-lg">
                                                            <input type="text" name="customer_name"
                                                                class="form-control form-control--sm"
                                                                placeholder="Name">
                                                        </div>
                                                        <div class="col-lg">
                                                            <input type="email" name="email"
                                                                class="form-control form-control--sm"
                                                                placeholder="Email">
                                                        </div>

                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="row vert-margin-middle">
                                                        <div class="col-lg">
                                                            <input type="text" name="title"
                                                                class="form-control form-control--sm"
                                                                placeholder="Review Title">
                                                        </div>

                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <textarea class="form-control" name="message" rows="3"
                                                        placeholder="Message"></textarea>
                                                </div>

                                                <div class="text-right">
                                                    <button type="submit"
                                                        class="btn btn-sm btn-primary m-t-n-xs"><strong>Send
                                                            Message</strong></button>
                                                </div>
                                            </form>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>



                </div>
            </div>



            <!-- Mainly scripts -->
            <script src="{{asset('backend/js/jquery-3.1.1.min.js')}}"></script>
            <script src="{{asset('backend/js/popper.min.js')}}"></script>
            <script src="{{asset('backend/js/bootstrap.js')}}"></script>
            <script src="{{asset('backend/js/plugins/metisMenu/jquery.metisMenu.js')}}"></script>
            <script src="{{asset('backend/js/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>

            <!-- Custom and plugin -->
            <script src="{{asset('backend/js/inspinia.js')}}"></script>
            <script src="{{asset('backend/js/plugins/pace/pace.min.js')}}"></script>

            <!-- slick carousel-->
            <script src="{{asset('backend/js/plugins/slick/slick.min.js')}}"></script>

            <script>
                $(document).ready(function () {


                    $('.product-images').slick({
                        dots: true
                    });

                });

            </script>


            <!-- write review rating-->
            <script>
                $(document).ready(function ($) {

                    $(".btnrating").on('click', (function (e) {

                        var previous_value = $("#selected_rating").val();

                        var selected_value = $(this).attr("data-attr");
                        $("#selected_rating").val(selected_value);

                        $(".selected-rating").empty();
                        $(".selected-rating").val(selected_value);

                        for (i = 1; i <= selected_value; ++i) {
                            $("#rating-star-" + i).toggleClass('btn-primary');
                            $("#rating-star-" + i).toggleClass('btn-grey');
                        }

                        for (ix = 1; ix <= previous_value; ++ix) {
                            $("#rating-star-" + ix).toggleClass('btn-primary');
                            $("#rating-star-" + ix).toggleClass('btn-grey');
                        }

                    }));


                });

            </script>



</body>

</html>