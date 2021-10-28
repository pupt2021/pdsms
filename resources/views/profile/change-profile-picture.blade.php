@extends('layouts.admin')

@section('title')
Change Profile Picture
@endsection
@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.min.css">
@endpush
@section('content')
     <section>
        <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3" style="margin-left:310px;">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{route('pic.update')}}" enctype="multipart/form-data">
                            @csrf
                        <div class="form-group">
                                <input type="hidden" name="id" value="{{$user->id}}" />
                                <img id="previewImg" class="img-thumbnail" alt="profile image" src="{{asset('img')}}/{{$user->photo}}" style="max-width:150px; display: block; margin-left: auto; margin-right: auto;"/>
                                    <br />

                                <label>Choose an Image <span style="color:red">*</span></label>
                                <input type="file" name="photo" class="form-control-file image" id="upload" onchange="previewFile(this)" />
                               <br />
                                <span style="color:red">@error('photo'){{$message}}@enderror</span>
<!--<div class="col-md-4 text-center">
                                <div id="cropie-demo" style="width:250px"></div>
                            </div>
                            <br />
                                <button class="btn btn-success upload-result">Upload Image</button>-->
                        </div>
                             <button type="submit" class="btn btn-primary" style="float:right;"><i class="fas fa-save"></i> Save</button>
                           <!--<div class="col-md-4">
                                <div id="image-preview" style="max-width:300px;"></div>
                            </div>-->
                            </form>
                      </div>
                </div>
            </div>
        </div>
    </div>
     
    
</section>
       
    
 @push('scripts')
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.js"></script>-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.js"></script>

 <script>
        function previewFile(input){
            var file=$("input[type=file]").get(0).files[0];
            if (file)
            {
                var reader = new FileReader();
                reader.onload = function() {
                    $('#previewImg').attr("src",reader.result);
                }
                reader.readAsDataURL(file);
            }
        }   


    /* $(document).ready(function () {
       
             //image crop
         $.noConflict();
             $uploadCrop = $('#cropie-demo').croppie({
                    enableExif: true,
                    viewport: {
                        width: 200,
                        height: 200,
                        type: 'square'
                    },
                    boundary: {
                        width: 300,
                        height: 300
                    }
                });


                $('#upload').on('change', function() {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $uploadCrop.croppie('bind', {
                            url: e.target.result
                        }).then(function() {
                            console.log('jQuery bind complete');
                        });
                    }
                    reader.readAsDataURL(this.files[0]);
                });


                $('.upload-result').on('click', function(e) {
                    $uploadCrop.croppie('result', {
                        type: 'canvas',
                        size: 'viewport'
                    }).then(function(resp) {
                        $.ajax({
                            url: "{{ route('pic.update') }}",
                            type: "POST",
                            data: {
                                "_token": "{{ csrf_token() }}",
                                "image": resp
                            },
                            success: function(data) {
                                html = '<img src="' + resp + '" />';
                                $("#image-preview").html(html);
                            }
                        });
                    });
                });
         });*/
    </script>
@if(Session::has('picture_updated'))
           <script>
              swal("Great Job!", "{!! Session::get('picture_updated') !!}", "success", {
                  button: true,
              })
           </script>              
@endif
@endpush
@endsection
  
