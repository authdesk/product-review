@extends('admin.dashboard')
@section('admin_content')
<div class="row wrapper border-bottom white-bg page-heading animated fadeInRight">
    <div class="col-lg-10">
        <h2>{{__('Product')}}</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{route('admin.dashboard')}}">{{__('Home')}}</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{route('admin.product.index')}}">{{__('Product')}}</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>{{__('Product Details')}}</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2 align-self-center ">
        <div class="my-auto">
            <a class="btn btn-primary btn-md float-right" href="{{route('admin.product.index')}}">{{__('product List')}}</a>
        </div>
    </div>

</div>

<div class="wrapper wrapper-content animated fadeInRight">

    
    <div class="row">
        
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>{{__('Product Details')}}</h5>
                    
                </div>
                <div class="ibox-content">
                    <dl class="row">
                           
                            <dt class="col-sm-3" >{{__('ID')}} <span class="float-right">:</span></dt>
                            <dd class="col-sm-9">{{$product->id}}</dd>
                            <dt class="col-sm-3" >{{__('Product Name')}} <span class="float-right">:</span></dt>
                            <dd class="col-sm-9">{{$product->product_name}}</dd>
                            <dt class="col-sm-3" >{{__('Product Image')}} <span class="float-right">:</span></dt>
                            <dd class="col-sm-9"> <img src="{{URL::to($product->product_image)}}" width="70px" height="70px"></dd>
                            <dt class="col-sm-3" >{{__('Product Brand')}} <span class="float-right">:</span></dt>
                            <dd class="col-sm-9">{{$product->product_brand}}</dd>
                            <dt class="col-sm-3" >{{__('Product Price')}} <span class="float-right">:</span></dt>
                            <dd class="col-sm-9">{{$product->product_price}}</dd>
                            <dt class="col-sm-3" >{{__('Product Category')}} <span class="float-right">:</span></dt>
                            <dd class="col-sm-9">{{$product->product_category}}</dd>
                            <dt class="col-sm-3" >{{__('Description')}} <span class="float-right">:</span></dt>
                            <dd class="col-sm-9">{!!$product->product_description!!}</dd>
                            <dt class="col-sm-3" >{{__('Product Long Description')}} <span class="float-right">:</span></dt>
                            <dd class="col-sm-9">{!!$product->product_long_description!!}</dd>
                            <dt class="col-sm-3" >{{__('Product Quantity')}} <span class="float-right">:</span></dt>
                            <dd class="col-sm-9">{{$product->product_quantity}}</dd>
                            			
                           

                        </dl>


                </div>
            </div>
        </div>
    </div>
</div>




@endsection