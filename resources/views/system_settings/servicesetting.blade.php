@extends('layouts.admin')

@section('title')
Service Section Settings
@endsection
@section('content')

<div class="page-body">
           <div class="row">
             <div class="col-sm-12" >
               <div class="card">
                 
                    <div class="container">
                    <br />
                    <form action="{{route('service.update')}}" method="post" enctype="multipart/form-data" id="upload-image">
                          @csrf
                        <input type="hidden" name="id" value="{{$service->id}}" />
                        <!--SERVICE SECTION-->
                        <h5>Banner and Title</h5>
                          <div class="form-group row">
                                 <label class="col-sm-2">Dentist Banner <span style="color:red">*</span></label>
                          <div class="col-sm-4">
                                <input type="file" class="form-control-file" name="servicebanner" id="servicebanner">
                                <img id="preview-service-banner" class="img-thumbnail" alt="Banner Image" src="{{asset('images')}}/{{$service->servicebanner}}" style="max-width:500px; margin-top:20px;"/>
                                <span style="color:red">@error('servicebanner'){{$message}}@enderror</span>
                          </div>

                           <label class="col-sm-2 col-form-label">Banner Title <span style="color:red">*</span></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="servicebannertitle" value="{{$service->servicebannertitle}}" placeholder="Banner Title">
                                <span style="color:red">@error('servicebannertitle'){{$message}}@enderror</span>
                            </div>  
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Title <span style="color:red">*</span></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="servicetitle" value="{{$service->servicetitle}}" placeholder="Title">
                                <span style="color:red">@error('servicetitle'){{$message}}@enderror</span>
                            </div>

                            <label class="col-sm-2 col-form-label">Description <span style="color:red">*</span></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="servicedescription" value="{{$service->servicedescription}}"placeholder="Description">
                                <span style="color:red">@error('servicedescription'){{$message}}@enderror</span>
                            </div>
                        </div>
                         <h5>Service Section</h5>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Teeth Whitening Description <span style="color:red">*</span></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="twdesc" value="{{$service->twdesc}}" placeholder="Teeth Whitening Description">
                                <span style="color:red">@error('twdesc'){{$message}}@enderror</span>
                            </div>

                            <label class="col-sm-2 col-form-label">Teeth Cleaning Description <span style="color:red">*</span></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="tcdesc" value="{{$service->tcdesc}}" placeholder=" Teeth Cleaning Description">
                                <span style="color:red">@error('tcdesc'){{$message}}@enderror</span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Quality Brackets Description <span style="color:red">*</span></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="qbdesc" value="{{$service->qbdesc}}" placeholder="Quality Brackets Description">
                                <span style="color:red">@error('qbdesc'){{$message}}@enderror</span>
                            </div>

                            <label class="col-sm-2 col-form-label">Modern Anesthetic Description <span style="color:red">*</span></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="madesc" value="{{$service->madesc}}" placeholder="Modern Anesthetic Description">
                                <span style="color:red">@error('madesc'){{$message}}@enderror</span>
                            </div>
                        </div>

                        <!--Ohter 4 Services-->
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Dental Calculus Description <span style="color:red">*</span></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="dcdesc" value="{{$service->dcdesc}}" placeholder="Dental Calculus Description">
                                <span style="color:red">@error('dcdesc'){{$message}}@enderror</span>
                            </div>
                              <label class="col-sm-2 col-form-label">Dental Implants Description <span style="color:red">*</span></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="didesc" value="{{$service->didesc}}" placeholder="Dental Implants Description">
                                <span style="color:red">@error('didesc'){{$message}}@enderror</span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Tooth Braces Description <span style="color:red">*</span></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="tbdesc" value="{{$service->tbdesc}}" placeholder="Tooth Braces Description">
                                <span style="color:red">@error('tbdesc'){{$message}}@enderror</span>
                            </div>
                        </div>

                        <div class="form-group row" style="float: right;">
                            <div class="col-sm-12">
                                <button type="submit" name="btn_submit" class="btn btn-primary"><i class="fas fa-save"></i> Save</button>
                            </div>
                        </div>
                     </form>                  
                   </div>
            </div>
             </div>
           </div>  
         </div>  
 

@push('scripts')
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>        
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
       $(document).ready(function (e) {
           //banner service preview
           $('#servicebanner').change(function () {

               let reader = new FileReader();

               reader.onload = (e) => {

                   $('#preview-service-banner').attr('src', e.target.result);
               }
               reader.readAsDataURL(this.files[0]);
           });
       });
</script>
@if(Session::has('service_updated'))
                            <script>
                                            swal("Great Job!", "{!! Session::get('service_updated') !!}", "success", {
                                                button: true,
                                                
                                            })
                                          
                                        </script>
                        @endif
@endpush
@endsection

    






