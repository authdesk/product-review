@extends('admin.dashboard')
@section('admin_content')
<div class="row wrapper border-bottom white-bg page-heading animated fadeInRight">
    <div class="col-lg-6">
        <h2>{{__('Product')}}</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{route('admin.dashboard')}}">{{__('Home')}}</a>
            </li>

            <li class="breadcrumb-item">
                <a href="{{route('admin.product-review.index')}}">{{__('Product Index')}}</a>
            </li>
            
            <li class="breadcrumb-item active">
                <strong>{{__('Product Review Index')}}</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-6 align-self-center ">
        <div class="my-auto">
        <a class="btn btn-primary btn-md float-right mx-1" href="{{route('admin.product-review.index')}}">{{__(' Product Index')}}</a>
        </div>
    </div>


</div>


<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
        <div class="ibox ">
            <div class="ibox-title">
                
                <h5>{{__('Product Review List')}}</h5>
           
            </div>
            <div class="ibox-content">

                <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover dataTables-example" >
            <thead>
            <tr>
            
            <th>{{__('#SL')}}</th>
            <th>{{__('Reviewer Name')}}</th>
            <th>{{__('Email')}}</th>

            
            <th>{{__('Review Count')}}</th>
            <th>{{__('Review Title')}}</th>
            <th>{{__('Review Message')}}</th>



            <th>{{__('Action')}}</th>
            </tr>
            </thead>
            <?php
            $sl=1;
            ?>

            <tbody>
            
            @foreach($product_reviews as $product_review)
            <tr>
                <td>{{$sl++}}</td>
                <td>{{$product_review->customer_name ?? ''}}</td>
                
                

                <td>{{$product_review->email ?? ''}}</td>
                
                <td>
                @if($product_review->review_count == 1)
                <i class="fa fa-star text-warning"></i>
                @elseif($product_review->review_count == 2)
                <i class="fa fa-star text-warning"></i>
                <i class="fa fa-star text-warning"></i>
                @elseif($product_review->review_count == 3)
                <i class="fa fa-star text-warning"></i>
                <i class="fa fa-star text-warning"></i>
                <i class="fa fa-star text-warning"></i>
                @elseif($product_review->review_count == 4)
                <i class="fa fa-star text-warning"></i>
                <i class="fa fa-star text-warning"></i>
                <i class="fa fa-star text-warning"></i>
                <i class="fa fa-star text-warning"></i>
                @elseif($product_review->review_count == 5)
                <i class="fa fa-star text-warning"></i>
                <i class="fa fa-star text-warning"></i>
                <i class="fa fa-star text-warning"></i>
                <i class="fa fa-star text-warning"></i>
                <i class="fa fa-star text-warning"></i>

                @endif
                </td>
                
                <td>{{$product_review->title ?? ''}}</td>

                <td>{{$product_review->message ?? ''}}</td>
                
                <td>


                    <a href="javascript:;" class="btn btn-sm btn-danger delete" data-form-id="review-delete-{{$product_review->id}}">{{__('Delete')}} </a>
                    <form action="{{route('admin.product-review.destroy', $product_review->id)}}review" id="review-delete-{{$product_review->id}}" method="post">
                    @csrf
                    
                    </form>
            
                    

                    
                </td>
        
            </tr>
            @endforeach
           
            </tbody>
           
            </table>
                </div>

            </div>
        </div>
    </div>
    </div>
</div>






<style>
.switch {
  position: relative;
  display: inline-block;
  width: 35px;
  height: 20px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 16px;
  width: 16px;
  left: 3px;
  bottom: 2px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #1AB394;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(13px);
  -ms-transform: translateX(13px);
  transform: translateX(13px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 20px;
}

.slider.round:before {
  border-radius: 50%;
}
</style>


@endsection