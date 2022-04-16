@extends('admin.layouts.app')
@section('admin_dashboard_content')

<!--dashboard wrapper start-->
<div id="wrapper">

    <!--sidebar start-->
    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <!-- Brand Logo -->
                    <?php
                    $settings = App\Models\Setting::where("Status",1)->first();
                    ?>
                    <a href="{{route('admin.dashboard')}}" class="brand-link">
                        <img src="{{URL::to($settings->Logo ?? '')}}" class="brand-image img-circle" style="opacity: .8">
                        <span class="brand-text text-white">{{$settings->Name ?? ''}} </span>
                    </a>                    
                </li>
                <?php
                $admin = App\Models\Admin::find(Auth::guard('admin')->user()->id); 
                ?>
                
                
                <li >
                <a  href="{{route('admin.dashboard')}}" ><i class="fa fa-th-large"></i> <span class="nav-label">Dashboard</span></a>
                </li>

                @if($admin->isMain == 1)
                <li>
                    <a  href="{{route('admin.super-admin.index')}}" ><i class="fa fa-user"></i> <span class="nav-label">Super Admin Settings</span></a>
                </li>
                @else
                <li>
                    <a  href="{{route('admin.super-admin.index')}}" ><i class="fa fa-user"></i> <span class="nav-label">Admin Settings</span></a>
                </li>
                @endif

                <li class="{{Route::is('admin.settings.*') ? 'active' : ''}}">
                <a href="{{route('admin.settings.index')}}" ><i class="fa fa-diamond"></i> <span class="nav-label">Site Settings</span></a>
                </li>

                
                


                

                <li>
                        <a href="#"><i class="fa fa-shopping-cart"></i> <span class="nav-label">Product</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li class="{{Route::is('admin.product.*') ? 'active' : ''}}">
                            <a href="{{route('admin.product.index')}}" >Product</a>
                            </li>
                            <li class="{{Route::is('admin.product-image.*') ? 'active' : ''}}">
                            <a href="{{route('admin.product-image.index')}}" >Product Image</a>
                            </li>
                            <li class="{{Route::is('admin.product-color.*') ? 'active' : ''}}">
                            <a href="{{route('admin.product-color.index')}}" >Product Color</a>
                            </li>

                            <li class="{{Route::is('admin.product-review.*') ? 'active' : ''}}">
                            <a href="{{route('admin.product-review.index')}}" >Product Review</a>
                            </li>
                            
                        </ul>
                    </li>
 

            </ul>

        </div>
    </nav>
    <!--sidebar end-->


    <!--page wrapper start-->
    <div id="page-wrapper" class="gray-bg">

       <!--topbar start-->
        <div class="row border-bottom">
            <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                </div>

                <ul class="nav navbar-top-links navbar-right">
                    <li class="mr-3">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="block m-t-xs font-bold">{{ Auth::guard('admin')->user()->name ?? '' }}  <b class="caret"></b></span>
                        </a>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li class="dropdown-item mt-1" >{{__('Name:')}} {{ Auth::guard('admin')->user()->name ?? '' }} </li>
                            <li class="dropdown-item mt-1" >{{__('Email:')}} {{ Auth::guard('admin')->user()->email ?? '' }} </li>
                         
                           
                            <li class="dropdown-divider"></li>
                            <li>
                                <!-- Authentication -->
                                <form method="POST" action="{{ route('admin.logout') }}">
                                    @csrf
                                    <a class="dropdown-item mb-2 text-center" href="{{ route('admin.logout') }}"
                                            onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </a>
                                </form>
                            </li>
                        </ul>
                    </li>
            
                </ul>

            </nav>
        </div>
        <!--topbar end-->
   

        <!--content start-->
        @yield('admin_content')
        <!--content start-->


        <!--footer start-->
        <div class="footer">
            <div>
                <strong>{{ __('Copyright') }}</strong> &copy;  {{ __('2022') }}
            </div>
        </div>
        <!--footer end-->

    </div>
    <!--page wrapper start-->

    

</div>
<!--dashboard wrapper end-->

@endsection