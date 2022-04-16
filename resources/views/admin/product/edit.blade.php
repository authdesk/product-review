@extends('admin.dashboard')
@section('admin_content')
<div class="row wrapper border-bottom white-bg page-heading animated fadeInRight">
    <div class="col-lg-10">
        <h2>{{__('Create Product')}}</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{route('admin.dashboard')}}">{{__('Home')}}</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{route('admin.product.index')}}">{{__('Product')}}</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>{{__('Edit Product')}}</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2 align-self-center ">
        <div class="my-auto">
            <a class="btn btn-primary btn-md float-right" href="{{route('admin.product.index')}}">{{__('Product List')}}</a>
        </div>
    </div>

</div>

<div class="wrapper wrapper-content animated fadeInRight">

    
    <div class="row">
        
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>{{__('Create Product')}}</h5>
                    
                </div>
                <div class="ibox-content">
                    <form action="{{route('admin.product.update', $edit->id)}}" method="POST" enctype="multipart/form-data">  
                        @csrf
                        @method('PUT')
                        <div class="form-group  row">
                            
                            <label class="col-sm-3 col-form-label">{{__('Product Name')}} <span class="text-danger">*</span></label>

                            <div class="col-sm-9">
                                <input type="text" name="product_name" value="{{$edit->product_name}}" placeholder="Product Name" class="form-control">
                            </div>
                        </div>

                        <div class="form-group  row">
                            
                            <label class="col-sm-3 col-form-label">{{__('Price')}} <span class="text-danger">*</span></label>

                            <div class="col-sm-9">
                                <input type="text" name="product_price" value="{{$edit->product_price}}" placeholder="Price" class="form-control" >
                            </div>
                        </div>



                        <div class="form-group  row">
                            
                            <label class="col-sm-3 col-form-label">{{__('Brand')}}</label>

                            <div class="col-sm-9">
                                <input type="text" name="product_brand" value="{{$edit->product_brand}}" placeholder="Brand" class="form-control" >
                            </div>
                        </div>

                        

                        <div class="form-group  row">
                            
                            <label class="col-sm-3 col-form-label">{{__('Product Category')}}</label>

                            <div class="col-sm-9">
                                <input type="text" name="product_category" value="{{$edit->product_category}}" placeholder="Product Category" class="form-control" >
                            </div>
                        </div>

                        <div class="form-group  row">
                            
                            <label class="col-sm-3 col-form-label">{{__('Quantity')}} </label>

                            <div class="col-sm-9">
                                <input type="text" name="product_quantity" value="{{$edit->product_quantity}}" placeholder="Quantity"  class="form-control">
                               
                            </div>
                        </div>



                        <div class="form-group  row">
                            
                            <label class="col-sm-3 col-form-label">{{__('Description')}}</label>

                            <div class="col-sm-9">
                                <textarea name="product_description" placeholder="Description" class="form-control summernote" row="3"> {{$edit->product_description}} </textarea>
                            </div>
                        </div>

                        <div class="form-group  row">
                            
                            <label class="col-sm-3 col-form-label">{{__('Long Description')}} </label>

                            <div class="col-sm-9">
                                <textarea name="product_long_description" placeholder="Long Description"  class="form-control summernote" row="3">  {{$edit->product_long_description}} </textarea>
                               
                            </div>
                        </div>
                        

                        

                        

                        <div class="form-group  row">
                            
                            <label class="col-sm-3 col-form-label">{{__('Image')}}</label>

                            <div class="col-sm-9">
                                <div class="custom-file">
                                    
                                    <input id="product_image" type="file" name="product_image" class="custom-file-input" accept="image/*" onchange="readURL(this);" >
                                    <label for="product_image" class="custom-file-label">{{__('Choose file')}}...</label>
                                    
                                </div> 
                            </div>
                        </div>

                        <div class="form-group  row">
                            
                            <label class="col-sm-3 col-form-label"></label>

                            <div class="col-sm-9">
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