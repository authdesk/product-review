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
                <a href="{{route('admin.product-color.index')}}">{{__('Product Index')}}</a>
            </li>
            
            <li class="breadcrumb-item active">
                <strong>{{__('Product Color Index')}}</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-6 align-self-center ">
        <div class="my-auto">
        <a class="btn btn-primary btn-md float-right mx-1" href="{{route('admin.product-color.create')}}">{{__('Create Product Color')}}</a>
        </div>
    </div>


</div>


<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
        <div class="ibox ">
            <div class="ibox-title">
                <h5>{{__('Product Color List')}}</h5>
           
            </div>
            <div class="ibox-content">

                <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover dataTables-example" >
            <thead>
            <tr>
            
                <th>{{__('#SL')}}</th>
                <th>{{__('Product Name')}}</th>
                
                <th>{{__('Color')}}</th>
                <th>{{__('Product Image')}}</th>

                <th>{{__('Status')}}</th>
                <th>{{__('Action')}}</th>
            </tr>
            </thead>
            <?php
            $sl=1;
            ?>

            <tbody>
            
            @foreach($product_colors as $product_color)
            <tr class="gradeX">
                <td>{{$sl++}}</td>
                <td>{{$product_color->product_name}}</td>
                <td>{{$product_color->product_color}} <img style="height: 10px; width:30px;" src="{{URL::to($product_color->color_image)}}" ></td>
                <td><img src="{{URL::to($product_color->product_image)}}" width="50px" ></td>
                
                <td class="text-center">
                @if($product_color->status ==1)
                    <span class="badge">{{__('Active')}}</span>
                @else
                    <span class="badge">{{__('Inactive')}}</span>
                @endif

                
                @if($product_color->status ==1)
                    <label class="switch">
                        <input type="checkbox" class="input_status" checked value="{{URL::to('/admin/inactive-product-color/'.$product_color->id)}}">
                        <span class="slider round"></span>
                    </label>
                @else
                    <label class="switch">
                        <input type="checkbox" class="input_status" value="{{URL::to('/admin/active-product-color/'.$product_color->id)}}">
                        <span class="slider round"></span>
                    </label>
                @endif
                
                </td>
                
                <td>
                <a class="btn btn-success btn-sm mb-1" href="{{route('admin.product-color.edit', $product_color->id)}}">{{__('Edit')}}</a>
                <a href="javascript:;" class="btn btn-sm btn-danger delete mb-1" data-form-id="product-color-delete-{{$product_color->id}}">{{__('Delete')}} </a>
                <form action="{{route('admin.product-color.destroy', $product_color->id)}}" id="product-color-delete-{{$product_color->id}}" method="post">
                @csrf
                @method('DELETE')
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