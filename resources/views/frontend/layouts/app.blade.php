<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">



      

        <!--Dashboard-->
        <link rel="stylesheet" href="{{asset('frontend/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('frontend/plugins/fontawesome/css/fontawesome.min.css')}}">
        <link rel="stylesheet" href="{{asset('frontend/plugins/fontawesome/css/all.min.css')}}">
        <link rel="stylesheet" href="{{asset('frontend/css/feathericon.min.css')}}">
        <link rel="stylesheet" href="{{asset('frontend/css/animate.css')}}">
        <link rel="stylesheet" href="{{asset('frontend/plugins/morris/morris.css')}}">
        <link rel="stylesheet" href="{{asset('frontend/css/style.css')}}"> 

      


    </head>
    <body>

         @yield('dashboard_content')




        <!--App Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Mainly scripts -->
        <script src="{{asset('frontend/js/jquery-3.5.1.min.js')}}"></script>
        <script src="{{asset('frontend/js/popper.min.js')}}"></script>
        <script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('frontend/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>
        <script src="{{asset('frontend/plugins/raphael/raphael.min.js')}}"></script>
        <script src="{{asset('frontend/plugins/morris/morris.min.js')}}"></script>
        <script src="{{asset('frontend/js/chart.morris.js')}}"></script>
        <script src="{{asset('frontend/js/script.js')}}"></script>

        <!-- sweetalert -->
        <script src="{{asset('backend/js/plugins/sweetalert/sweetalert.min.js')}}"></script>
        
        <!-- toastr -->
        <script src="{{asset('backend/js/plugins/toastr/toastr.min.js')}}"></script>

       
        <!-- Delete Data Scripts -->
        <script>
            $('.delete').on('click', function(){

                let form_id = $(this).data('form-id');

                swal({
                    title: "Are you sure?",
                    text: "Once deleted, this will be deleted permanently!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $('#'+form_id).submit();
                        swal("File has been deleted!", {
                        icon: "success",
                        });

                    } else {
                        swal("File is safe!");
                    }
                }); 

            });

        </script>
  
    </body>
</html>
