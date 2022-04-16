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

        <!-- App Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

      
            <!-- Gritter -->
            <link href="{{asset('backend/js/plugins/gritter/jquery.gritter.css')}}" rel="stylesheet">


        <!--Dashboard-->
        <link href="{{asset('backend/css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{asset('backend/font-awesome/css/font-awesome.css')}}" rel="stylesheet">
        <link href="{{asset('backend/css/animate.css')}}" rel="stylesheet">
        <link href="{{asset('backend/css/plugins/dataTables/datatables.min.css')}}" rel="stylesheet">
        <link href="{{asset('backend/css/plugins/iCheck/custom.css')}}" rel="stylesheet">
        <link href="{{asset('backend/css/style.css')}}" rel="stylesheet">
        <link href="{{asset('backend/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css')}}" rel="stylesheet">
        <link href="{{asset('backend/css/plugins/sweetalert/sweetalert.css')}}" rel="stylesheet">
        <link href="{{asset('backend/css/plugins/toastr/toastr.min.css')}}" rel="stylesheet">
        <link href="{{asset('backend/css/plugins/summernote/summernote-bs4.css')}}" rel="stylesheet" >    
      


    </head>
    <body>

         @yield('admin_dashboard_content')




        <!--App Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Mainly scripts -->
        <script src="{{asset('backend/js/jquery-3.1.1.min.js')}}"></script>
        <script src="{{asset('backend/js/popper.min.js')}}"></script>
        <script src="{{asset('backend/js/bootstrap.js')}}"></script>
        <script src="{{asset('backend/js/plugins/metisMenu/jquery.metisMenu.js')}}"></script>
        <script src="{{asset('backend/js/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>
        <script src="{{asset('backend/js/plugins/chosen/chosen.jquery.js')}}"></script>

        <!-- Flot -->
        <script src="{{asset('backend/js/plugins/flot/jquery.flot.js')}}"></script>
        <script src="{{asset('backend/js/plugins/flot/jquery.flot.tooltip.min.js')}}"></script>
        <script src="{{asset('backend/js/plugins/flot/jquery.flot.spline.js')}}"></script>
        <script src="{{asset('backend/js/plugins/flot/jquery.flot.resize.js')}}"></script>
        <script src="{{asset('backend/js/plugins/flot/jquery.flot.pie.js')}}"></script>
        <script src="{{asset('backend/js/plugins/flot/jquery.flot.symbol.js')}}"></script>
        <script src="{{asset('backend/js/plugins/flot/curvedLines.js')}}"></script>

        <script src="{{asset('backend/js/plugins/dataTables/datatables.min.js')}}"></script>
        <script src="{{asset('backend/js/plugins/dataTables/dataTables.bootstrap4.min.js')}}"></script>

        <!-- Peity -->
        <script src="{{asset('backend/js/plugins/peity/jquery.peity.min.js')}}"></script>
        <script src="{{asset('backend/js/demo/peity-demo.js')}}"></script>

        <!-- Custom and plugin javascript -->
        <script src="{{asset('backend/js/inspinia.js')}}"></script>
        <script src="{{asset('backend/js/plugins/pace/pace.min.js')}}"></script>

        <!-- jQuery UI -->
        <script src="{{asset('backend/js/plugins/jquery-ui/jquery-ui.min.js')}}"></script>

        <!-- GITTER -->
        <script src="{{asset('backend/js/plugins/gritter/jquery.gritter.min.js')}}"></script>

        <!-- Jvectormap -->
        <script src="{{asset('backend/js/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js')}}"></script>
        <script src="{{asset('backend/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>

        <!-- Sparkline -->
        <script src="{{asset('backend/js/plugins/sparkline/jquery.sparkline.min.js')}}"></script>

        <!-- Sparkline demo data  -->
        <script src="{{asset('backend/js/demo/sparkline-demo.js')}}"></script>

        <!-- ChartJS-->
        <script src="{{asset('backend/js/plugins/chartJs/Chart.min.js')}}"></script>
        
        <!-- iCheck -->
        <script src="{{asset('backend/js/plugins/iCheck/icheck.min.js')}}"></script>
         
        <!-- sweetalert -->
        <script src="{{asset('backend/js/plugins/sweetalert/sweetalert.min.js')}}"></script>
        
        <!-- toastr -->
        <script src="{{asset('backend/js/plugins/toastr/toastr.min.js')}}"></script>
        {!! Toastr::message() !!}

        <!-- Summernote -->
        <script src="{{asset('backend/js/plugins/summernote/summernote-bs4.min.js')}}"></script>

        <script>
            $(document).ready(function() {

                var lineData = {
                    labels: ["January", "February", "March", "April", "May", "June", "July"],
                    datasets: [
                        {
                            label: "Example dataset",
                            backgroundColor: "rgba(26,179,148,0.5)",
                            borderColor: "rgba(26,179,148,0.7)",
                            pointBackgroundColor: "rgba(26,179,148,1)",
                            pointBorderColor: "#fff",
                            data: [28, 48, 40, 19, 86, 27, 90]
                        },
                        {
                            label: "Example dataset",
                            backgroundColor: "rgba(220,220,220,0.5)",
                            borderColor: "rgba(220,220,220,1)",
                            pointBackgroundColor: "rgba(220,220,220,1)",
                            pointBorderColor: "#fff",
                            data: [65, 59, 80, 81, 56, 55, 40]
                        }
                    ]
                };

                var lineOptions = {
                    responsive: true
                };


                var ctx = document.getElementById("lineChart").getContext("2d");
                new Chart(ctx, {type: 'line', data: lineData, options:lineOptions});

            });
        </script>

        <script>
            $(document).ready(function () {
                $('.i-checks').iCheck({
                    checkboxClass: 'icheckbox_square-green',
                    radioClass: 'iradio_square-green',
                });
            });
        </script>

        <!-- Sidebar Menu Active Script -->
        <script>
            $(function(){
                var current = location.pathname;

                $('ul.metismenu li a').each(function(){
                    if($(this).attr('href').indexOf(current) !== -1){
                        $(this).closest('li').addClass('active');
                    }
                });

                $('ul.metismenu .nav-second-level a').each(function(){
                    console.log($(this).attr('href').indexOf(current));
                    if($(this).attr('href').indexOf(current) == -1)  {
                        $(this).parent().parent().closest('li').addClass('active');
                        $(this).closest('ul').addClass('in');
                    }
                });
            });
        </script>

        <!-- Cusrtom File Input Select Script -->
        <script>
            $('.custom-file-input').on('change', function() {
            let fileName = $(this).val().split('\\').pop();
            $(this).next('.custom-file-label').addClass("selected").html(fileName);
            }); 
        </script>
        

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
       
       <!-- Active Inactive Scripts -->
        <script>
            $(function(){
                $("input:checkbox.input_status").change(function() {
                if(this.checked) {
                    window.location = this.value;
                }
            });
            });

            $(function(){
                $("input:checkbox.input_status").change(function() {
                if(this.checked == false) {
                    window.location = this.value;
                }
            });
            });
        </script>



<script>
        //I added event handler for the file upload control to access the files properties.
        document.addEventListener("DOMContentLoaded", init, false);
        //To save an array of attachments
        var AttachmentArray = [];
        //counter for attachment array
        var arrCounter = 0;
        //to make sure the error message for number of files will be shown only one time.
        var filesCounterAlertStatus = false;
        //un ordered list to keep attachments thumbnails
        var ul = document.createElement("ul");
        ul.className = "thumb-Images";
        ul.id = "imgList";
        function init() {
        //add javascript handlers for the file upload event
        document
            .querySelector("#files")
            .addEventListener("change", handleFileSelect, false);
        }
        //the handler for file upload event
        function handleFileSelect(e) {
        //to make sure the user select file/files
        if (!e.target.files) return;
        //To obtaine a File reference
        var files = e.target.files;
        // Loop through the FileList and then to render image files as thumbnails.
        for (var i = 0, f; (f = files[i]); i++) {
            //instantiate a FileReader object to read its contents into memory
            var fileReader = new FileReader();
            // Closure to capture the file information and apply validation.
            fileReader.onload = (function(readerEvt) {
            return function(e) {
                //Apply the validation rules for attachments upload
                ApplyFileValidationRules(readerEvt);
                //Render attachments thumbnails.
                RenderThumbnail(e, readerEvt);
                //Fill the array of attachment
                FillAttachmentArray(e, readerEvt);
            };
            })(f);
            // Read in the image file as a data URL.
            // readAsDataURL: The result property will contain the file/blob's data encoded as a data URL.
            // More info about Data URI scheme https://en.wikipedia.org/wiki/Data_URI_scheme
            fileReader.readAsDataURL(f);
        }
        document
            .getElementById("files")
            .addEventListener("change", handleFileSelect, false);
        }
        //To remove attachment once user click on x button
        jQuery(function($) {
        $("div").on("click", ".img-wrap .close", function() {
            var id = $(this)
            .closest(".img-wrap")
            .find("img")
            .data("id");
            //to remove the deleted item from array
            var elementPos = AttachmentArray.map(function(x) {
            return x.FileName;
            }).indexOf(id);
            if (elementPos !== -1) {
            AttachmentArray.splice(elementPos, 1);
            }
            //to remove image tag
            $(this)
            .parent()
            .find("img")
            .not()
            .remove();
            //to remove div tag that contain the image
            $(this)
            .parent()
            .find("div")
            .not()
            .remove();
            //to remove div tag that contain caption name
            $(this)
            .parent()
            .parent()
            .find("div")
            .not()
            .remove();
            //to remove li tag
            var lis = document.querySelectorAll("#imgList li");
            for (var i = 0; (li = lis[i]); i++) {
            if (li.innerHTML == "") {
                li.parentNode.removeChild(li);
            }
            }
        });
        });
        //Apply the validation rules for attachments upload
        function ApplyFileValidationRules(readerEvt) {
        //To check file type according to upload conditions
        if (CheckFileType(readerEvt.type) == false) {
            alert(
            "The file (" +
                readerEvt.name +
                ") does not match the upload conditions, You can only upload jpg/png/gif files"
            );
            e.preventDefault();
            return;
        }
        //To check file Size according to upload conditions
        if (CheckFileSize(readerEvt.size) == false) {
            alert(
            "The file (" +
                readerEvt.name + 
                ") does not match the upload conditions, The maximum file size for uploads should not exceed 300 KB"
            );
            e.preventDefault();
            return;
        }
        //To check files count according to upload conditions
        if (CheckFilesCount(AttachmentArray) == false) {
            if (!filesCounterAlertStatus) {
            filesCounterAlertStatus = true;
            alert(
                "You have added more than 10 files. According to upload conditions you can upload 10 files maximum"
            );
            }
            e.preventDefault();
            return;
        }
        }
        //To check file type according to upload conditions
        function CheckFileType(fileType) {
        if (fileType == "image/jpeg") {
            return true;
        } else if (fileType == "image/png") {
            return true;
        } else if (fileType == "image/gif") {
            return true;
        } else {
            return false;
        }
        return true;
        }
        //To check file Size according to upload conditions
        function CheckFileSize(fileSize) {
        if (fileSize < 300000) {
            return true;
        } else {
            return false;
        }
        return true;
        }
        //To check files count according to upload conditions
        function CheckFilesCount(AttachmentArray) {
        //Since AttachmentArray.length return the next available index in the array,
        //I have used the loop to get the real length
        var len = 0;
        for (var i = 0; i < AttachmentArray.length; i++) {
            if (AttachmentArray[i] !== undefined) {
            len++;
            }
        }
        //To check the length does not exceed 10 files maximum
        if (len > 9) {
            return false;
        } else {
            return true;
        }
        }
        //Render attachments thumbnails.
        function RenderThumbnail(e, readerEvt) {
        var li = document.createElement("li");
        ul.appendChild(li);
        li.innerHTML = [
            '<div class="img-wrap "> <span class="close">&times;</span>' +
            '<img class="thumb" src="',
            e.target.result,
            '" title="',
            escape(readerEvt.name),
            '" data-id="',
            readerEvt.name,
            '"/>' + "</div>"
        ].join("");
        var div = document.createElement("div");
        div.className = "FileNameCaptionStyle";
        li.appendChild(div);
        div.innerHTML = [readerEvt.name].join("");
        document.getElementById("Filelist").insertBefore(ul, null);
        }
        //Fill the array of attachment
        function FillAttachmentArray(e, readerEvt) {
        AttachmentArray[arrCounter] = {
            AttachmentType: 1,
            ObjectType: 1,
            FileName: readerEvt.name,
            FileDescription: "Attachment",
            NoteText: "",
            MimeType: readerEvt.type,
            Content: e.target.result.split("base64,")[1],
            FileSizeInBytes: readerEvt.size
        };
        arrCounter = arrCounter + 1;
        }
        </script>

        <style>
        .overflow-text{
           
            overflow: hidden;
            width: 100px;
            
        }
        </style>



<script>  
        $(document).ready(function(){        

        var i=1;    
    
        $('#add_btn').click(function(){    

            i++;    

            $('#add_color').append(`

                <tr id="row`+i+`" class="dynamic-added">
                <td>
                <label for="color[]">Color Name</label>
                <input type="text" id="product_color[]" name="addmore[`+i+`][product_color]" placeholder="Color Name" class="form-control name_list" />
                </td>
                
                <td>
                <label for="color_image[]">Choose Color Image</label>
                <input id="color_image[]" type="file" name="addmore[`+i+`][color_image]" class="form-control" accept="image/*" " >
                </td>

                <td>
                <label for="product_image[]">Choose Color Product Image</label>
                <input id="product_image[]" type="file" name="addmore[`+i+`][product_image]" class="form-control" accept="image/*" " >
                </td>

                <td>
                <button type="button" name="remove" id="`+i+`" class="btn btn-sm btn-secondary btn_remove"><i class="fa fa-minus"></i></button>
                </td>
                </tr>`
                
            );    
        });  

                        
    
        $(document).on('click', '.btn_remove', function(){    
            var button_id = $(this).attr("id");     
            $('#row'+button_id+'').remove();    
        });    
    
        
    
        });    
    </script>  


    <script>
      $('.summernote').summernote({
        tabsize: 2,
        height: 100
      });
    </script>


    </body>
</html>
