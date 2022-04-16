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
                <a href="{{route('admin.product-color.index')}}">{{__('Product Index')}}</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>{{__('Create Product Color')}}</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2 align-self-center ">
        <div class="my-auto">
            <a class="btn btn-primary btn-md float-right" href="{{route('admin.product-color.index')}}">{{__('Product Color Index')}}</a>
        </div>
    </div>

</div>

<div class="wrapper wrapper-content animated fadeInRight">

    
    <div class="row">
        
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>{{__('Create Product Color')}}</h5>
                    
                </div>
                <div class="ibox-content">
                    <form action="{{route('admin.product-color.store')}}" method="POST" enctype="multipart/form-data">  
                        @csrf
                        <div class="form-group  row">
                            
                            <label class="col-sm-3 col-form-label">{{__('Producte Name')}} <span class="text-danger">*</span></label>

                            <div class="col-sm-9">
                                <input type="text" name="product_name" placeholder="Product Name" class="form-control">
                            </div>
                        </div>


                        <div class="form-group  row">
                            
                            <label class="col-sm-3 col-form-label">{{__('Producte Color')}} <span class="text-danger">*</span></label>

                            
                        </div>

                        

                        <div class="table-responsive text-center">    
                            <table class="table table-bordered" id="add_color">    
                                <tr>    
                                    <td>
                                        <label for="product_color[]">Color Name</label>
                                        <input type="text"  id="product_color[]"name="addmore[0][product_color]" placeholder="Color Name" class="form-control name_list" required="" /></td>    
                                    <td>
                                        <label for="color_image[]">Choose Color Image</label>
                                        <input id="color_image[]" type="file" name="addmore[0][color_image]" class="form-control" accept="image/*" onchange="readURL(this);" >
                                            
                                    </td>   

                                    <td>
                                        <label for="product_image[]">Choose Color Product Image</label>
                                        <input id="product_image[]" type="file" name="addmore[0][product_image]" class="form-control" accept="image/*" onchange="readURL(this);" >
                                            
                                    </td>    
                                    <td><button type="button" name="add" id="add_btn" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i></button></td>    
                                </tr>    
                            </table>    
                            
                        </div>  


                        <div class="form-group row">
                            
                            <label class="col-sm-3 col-form-label">{{__('Active Status')}} <span class="text-danger">*</span></label>


                            <div class="col-sm-9">
                                <select class="form-control custom-select" name="status">
                                    <option value="1">{{__('Active')}}</option>
                                    <option value="0">{{__('Inacive')}}</option>
                                </select>


                            </div>
                        </div>

                        

                        <div class="hr-line-dashed"></div>
                       
                        <div class="form-group row">
                            <div class="col-sm-4 col-sm-offset-2">

                                <button class="btn btn-primary btn-md" type="submit">{{__('Create')}}</button>
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
<style>
/*Copied from bootstrap to handle input file multiple*/
.btn {
  display: inline-block;
  padding: 6px 12px;
  margin-bottom: 0;
  font-size: 14px;
  font-weight: normal;
  line-height: 1.42857143;
  text-align: center;
  white-space: nowrap;
  vertical-align: middle;
  cursor: pointer;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
  background-image: none;
  border: 1px solid transparent;
  border-radius: 4px;
}
/*Also */
.btn-success {
  border: 1px solid #c5dbec;
  background: #d0e5f5;
  font-weight: bold;
  color: #2e6e9e;
}
/* This is copied from https://github.com/blueimp/jQuery-File-Upload/blob/master/css/jquery.fileupload.css */
.fileinput-button {
  position: relative;
  overflow: hidden;
}
.fileinput-button input {
  position: absolute;
  top: 0;
  right: 0;
  margin: 0;
  opacity: 0;
  -ms-filter: "alpha(opacity=0)";
  font-size: 200px;
  direction: ltr;
  cursor: pointer;
}
.thumb {
  height: 80px;
  width: 100px;
  border: 1px solid #000;
}
ul.thumb-Images li {
  width: 120px;
  float: left;
  display: inline-block;
  vertical-align: top;
  height: 120px;
}
.img-wrap {
  position: relative;
  display: inline-block;
  font-size: 0;
}
.img-wrap .close {
  position: absolute;
  top: 2px;
  right: 2px;
  z-index: 100;
  background-color: #d0e5f5;
  padding: 2px 2px 2px;
  color: #000;
  font-weight: bolder;
  cursor: pointer;
  opacity: 0.5;
  font-size: 23px;
  line-height: 10px;
  border-radius: 50%;
}
.img-wrap:hover .close {
  opacity: 1;
  background-color: lightgrey;
}
.FileNameCaptionStyle {
  font-size: 12px;
}
</style>

@endsection