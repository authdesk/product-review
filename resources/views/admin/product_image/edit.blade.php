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
                <a href="{{route('admin.product-image.index')}}">{{__('Product Index')}}</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{route('admin.product-images', $edit->product_name)}}">{{__('Product Image Index')}}</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>{{__('Edit Product Image')}}</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2 align-self-center ">
        <div class="my-auto">
            <a class="btn btn-primary btn-md float-right" href="{{route('admin.product-image.index')}}">{{__('Product Image Index')}}</a>
        </div>
    </div>

</div>

<div class="wrapper wrapper-content animated fadeInRight">

    
    <div class="row">
        
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>{{__('Edit Product')}}</h5>
                    
                </div>
                <div class="ibox-content">
                    <form action="{{route('admin.product-image.update', $edit->id)}}" method="POST" enctype="multipart/form-data">  
                        @csrf
                        @method('PUT')
                        <div class="form-group  row">
                            
                            <label class="col-sm-2 col-form-label">{{__('Product Name')}} <span class="text-danger">*</span></label>

                            <div class="col-sm-10">
                                <input type="text" name="product_name" value="{{$edit->product_name}}" placeholder="Product Name" class="form-control">
                            </div>
                        </div>



                  

                        <div class="form-group  row">
                            
                            <label class="col-sm-2 col-form-label">{{__('Product Image')}}</label>

                            <div class="col-sm-10">
                                <div class="custom-file">
                                    
                                    <input id="product_image" type="file" name="product_image" class="custom-file-input" accept="image/*" onchange="readURL(this);" >
                                    <label for="product_image" class="custom-file-label">{{__('Choose file')}}...</label>
                                    
                                </div> 
                            </div>
                        </div>

                        <div class="form-group  row">
                            
                            <label class="col-sm-2 col-form-label"></label>

                            <div class="col-sm-10">
                                <img id="image" src="{{URL::to($edit->product_image)}}" style="width:80px; height:80px;" >
                                <img id="image" src="" >
                            </div>
                        </div>


                        <div class="hr-line-dashed"></div>
                       
                        <div class="form-group row">
                            <div class="col-sm-4 col-sm-offset-2">

                                <button class="btn btn-primary btn-md" type="submit">{{__('Update')}}</button>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>


<script>
    function readURL(input)
    {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#image')
                .attr('src', e.target.result)
                .width(80)
                .height(80);
                
            };
            reader.readAsDataURL(input.files[0]);
        }

    }
</script>

@endsection