@extends('layouts.admin')

@section('title')
Dentist Section Settings
@endsection
@section('content')

                        

<div class="page-body">
           <div class="row">
             <div class="col-sm-12" >
               <div class="card"> 
                 
                    <div class="container">
                    <br />
                    <form action="{{route('dentist.update')}}" method="post" enctype="multipart/form-data" id="upload-image">
                          @csrf
                        <input type="hidden" name="id" value="{{$dentist->id}}" />
                         <h5>Site Banner</h5>
                         <!--About Banner forms-->
                        <div class="form-group row">
                                 <label class="col-sm-2">Dentist Banner <span style="color:red">*</span></label>
                          <div class="col-sm-4">
                                <input type="file" class="form-control-file" name="dentistbanner" id="dentistbanner">
                                <img id="preview-dentist-banner" class="img-thumbnail" alt="About Image" src="{{asset('images')}}/{{$dentist->dentistbanner}}" style="max-width:500px; margin-top:20px;"/>
                                <span style="color:red">@error('dentistbanner'){{$message}}@enderror</span>
                          </div>

                           <label class="col-sm-2 col-form-label">Banner Title <span style="color:red">*</span></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="dentistbannertitle" value="{{$dentist->dentistbannertitle}}" placeholder="Banner Title">
                                <span style="color:red">@error('dentistbannertitle'){{$message}}@enderror</span>
                            </div>  
                        </div>
                       
                        
                        <hr style="border: 1px solid gray;"/>
                        <h5>Meet Our Experience Dentist Section</h5>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Title <span style="color:red">*</span></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="titletext" value="{{$dentist->titletext}}" placeholder="Title" />
                                <span style="color:red">@error('titletext'){{$message}}@enderror</span>
                            </div>
                            <label class="col-sm-2 col-form-label">Short Description <span style="color:red">*</span></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="shortdesc" value="{{$dentist->shortdesc}}" placeholder="Short Description">
                                <span style="color:red">@error('shortdesc'){{$message}}@enderror</span>
                            </div>
                        </div>

                        <hr style="border: 1px solid gray;"/>
                        <!--STAFF SECTION-->
                        <h5>Staff Section</h5>
                         <div class="form-group row">
                                 <label class="col-sm-2">Staff 1 Picture <span style="color:red">*</span></label>
                          <div class="col-sm-4">
                                <input type="file" class="form-control-file" name="staff1image" id="staff1image">
                                <img id="preview-staff1" class="img-thumbnail" alt="Staff 1 Image" src="{{asset('images')}}/{{$dentist->staff1image}}" style="max-width:150px; margin-top:20px;"/>
                                <span style="color:red">@error('staff1image'){{$message}}@enderror</span>
                          </div>
                        </div>
                         <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Staff 1 Name <span style="color:red">*</span></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="staff1name" value="{{$dentist->staff1name}}" placeholder="First Name, Middle Initial, Surname">
                                <span style="color:red">@error('staff1name'){{$message}}@enderror</span>
                            </div>

                            <label class="col-sm-2 col-form-label">Staff 1 Position <span style="color:red">*</span></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="staff1position" value="{{$dentist->staff1position}}" placeholder="Staff 1 Position">
                                <span style="color:red">@error('staff1position'){{$message}}@enderror</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Staff 1 Description <span style="color:red">*</span></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="staff1desc" value="{{$dentist->staff1desc}}" placeholder="Staff 1 Description">
                                <span style="color:red">@error('staff1desc'){{$message}}@enderror</span>
                            </div>
                        </div>
                        <h6 style="font-weight:bold;">Staff 1 Social Media Links</h6>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Staff 1 Twitter Link <span style="color:red">*</span></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="staff1twitterlink" value="{{$dentist->staff1twitterlink}}" placeholder="Staff 1 Twitter Link">
                                <span style="color:red">@error('staff1twitterlink'){{$message}}@enderror</span>
                            </div>

                            <label class="col-sm-2 col-form-label">Staff 1 Fb Link <span style="color:red">*</span></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="staff1fblink" value="{{$dentist->staff1fblink}}" placeholder="Staff 1 Facebook Link">
                                <span style="color:red">@error('staff1fblink'){{$message}}@enderror</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Staff 1 IG Link <span style="color:red">*</span></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="staff1instalink" value="{{$dentist->staff1instalink}}" placeholder="Staff 1 Instagram Link">
                                <span style="color:red">@error('staff1tinstalink'){{$message}}@enderror</span>
                            </div>

                            <label class="col-sm-2 col-form-label">Staff 1 Gmail <span style="color:red">*</span></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="staff1gmail" value="{{$dentist->staff1gmail}}" placeholder="Staff 1 Gmail">
                                <span style="color:red">@error('staff1gmail'){{$message}}@enderror</span>
                            </div>
                        </div>
                        <hr style="border: 1px solid gray; width:500px; margin:auto;" />
                        <br />

                        <!--Staff 2-->
                         <div class="form-group row">
                                 <label class="col-sm-2">Staff 2 Picture <span style="color:red">*</span></label>
                          <div class="col-sm-4">
                                <input type="file" class="form-control-file" name="staff2image" id="staff2image">
                                <img id="preview-staff2" class="img-thumbnail" alt="Staff 2 Image" src="{{asset('images')}}/{{$dentist->staff2image}}"style="max-width:150px; margin-top:20px;"/>
                                <span style="color:red">@error('staff2image'){{$message}}@enderror</span>
                          </div>
                        </div>
                         <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Staff 2 Name <span style="color:red">*</span></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="staff2name" value="{{$dentist->staff2name}}"placeholder="First Name, Middle Initial, Surname">
                                <span style="color:red">@error('staff2name'){{$message}}@enderror</span>
                            </div>

                            <label class="col-sm-2 col-form-label">Staff 2 Position <span style="color:red">*</span></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="staff2position" value="{{$dentist->staff2position}}" placeholder="Staff 2 Position">
                                <span style="color:red">@error('staff2position'){{$message}}@enderror</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Staff 2 Description <span style="color:red">*</span></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="staff2desc" value="{{$dentist->staff2desc}}" placeholder="Staff 2 Description">
                                <span style="color:red">@error('staff2desc'){{$message}}@enderror</span>
                            </div>
                        </div>
                        <h6 style="font-weight:bold;">Staff 2 Social Media Links</h6>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Staff 2 Twitter Link <span style="color:red">*</span></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="staff2twitterlink" value="{{$dentist->staff2twitterlink}}" placeholder="Staff 2 Twitter Link">
                                <span style="color:red">@error('staff2twitterlink'){{$message}}@enderror</span>
                            </div>

                            <label class="col-sm-2 col-form-label">Staff 2 Fb Link <span style="color:red">*</span></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="staff2fblink" value="{{$dentist->staff2fblink}}" placeholder="Staff 2 Facebook Link">
                                <span style="color:red">@error('staff2fblink'){{$message}}@enderror</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Staff 2 IG Link <span style="color:red">*</span></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="staff2instalink" value="{{$dentist->staff2instalink}}" placeholder="Staff 2 Instagram Link">
                                <span style="color:red">@error('staff2tinstalink'){{$message}}@enderror</span>
                            </div>

                            <label class="col-sm-2 col-form-label">Staff 2 Gmail <span style="color:red">*</span></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="staff2gmail" value="{{$dentist->staff2gmail}}" placeholder="Staff 2 Gmail">
                                <span style="color:red">@error('staff2gmail'){{$message}}@enderror</span>
                            </div>
                        </div>
                       <!--<hr style="border: 1px solid gray; width:500px; margin:auto;" />
                        <br />
                        
                        <div class="form-group row">
                                 <label class="col-sm-2">Staff 3 Picture <span style="color:red">*</span></label>
                          <div class="col-sm-4">
                                <input type="file" class="form-control-file" name="staff3image" id="staff3image">
                                <img id="preview-staff3" class="img-thumbnail" alt="Staff 3 Image" style="max-width:150px; margin-top:20px;"/>
                                <span style="color:red">@error('staff3image'){{$message}}@enderror</span>
                          </div>
                        </div>
                         <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Staff 3 Name <span style="color:red">*</span></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="staff3name" placeholder="First Name, Middle Initial, Surname">
                                <span style="color:red">@error('staff3name'){{$message}}@enderror</span>
                            </div>

                            <label class="col-sm-2 col-form-label">Staff 3 Position <span style="color:red">*</span></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="staff2position" placeholder="Staff 3 Position">
                                <span style="color:red">@error('staff3position'){{$message}}@enderror</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Staff 3 Description <span style="color:red">*</span></label>
                            <div class="col-sm-4">
                                <textarea class="form-control" name="staff3desc" placeholder="Staff 3 Description"></textarea>
                                <span style="color:red">@error('staff3desc'){{$message}}@enderror</span>
                            </div>
                        </div>
                        <h6 style="font-weight:bold;">Staff 3 Social Media Links</h6>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Staff 3 Twitter Link <span style="color:red">*</span></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="staff3twitterlink" placeholder="Staff 3 Twitter Link">
                                <span style="color:red">@error('staff3twitterlink'){{$message}}@enderror</span>
                            </div>

                            <label class="col-sm-2 col-form-label">Staff 3 Fb Link <span style="color:red">*</span></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="staff3fblink" placeholder="Staff 3 Facebook Link">
                                <span style="color:red">@error('staff3fblink'){{$message}}@enderror</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Staff 3 IG Link <span style="color:red">*</span></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="staff3instalink" placeholder="Staff 3 Instagram Link">
                                <span style="color:red">@error('staff3tinstalink'){{$message}}@enderror</span>
                            </div>

                            <label class="col-sm-2 col-form-label">Staff 3 Gmail <span style="color:red">*</span></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="staff3gmail" placeholder="Staff 3 Gmail">
                                <span style="color:red">@error('staff3gmail'){{$message}}@enderror</span>
                            </div>
                        </div>
                        <hr style="border: 1px solid gray; width:500px; margin:auto;" />
                        <br />
                       
                        <div class="form-group row">
                                 <label class="col-sm-2">Staff 4 Picture <span style="color:red">*</span></label>
                          <div class="col-sm-4">
                                <input type="file" class="form-control-file" name="staff4image" id="staff4image">
                                <img id="preview-staff4" class="img-thumbnail" alt="Staff 4 Image" style="max-width:150px; margin-top:20px;"/>
                                <span style="color:red">@error('staff4image'){{$message}}@enderror</span>
                          </div>
                        </div>
                         <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Staff 4 Name <span style="color:red">*</span></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="staff4name" placeholder="First Name, Middle Initial, Surname">
                                <span style="color:red">@error('staff4name'){{$message}}@enderror</span>
                            </div>

                            <label class="col-sm-2 col-form-label">Staff 4 Position <span style="color:red">*</span></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="staff4position" placeholder="Staff 4 Position">
                                <span style="color:red">@error('staff4position'){{$message}}@enderror</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Staff 4 Description <span style="color:red">*</span></label>
                            <div class="col-sm-4">
                                <textarea class="form-control" name="staff4desc" placeholder="Staff 4 Description"></textarea>
                                <span style="color:red">@error('staff4desc'){{$message}}@enderror</span>
                            </div>
                        </div>
                        <h6 style="font-weight:bold;">Staff 4 Social Media Links</h6>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Staff 4 Twitter Link <span style="color:red">*</span></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="staff4twitterlink" placeholder="Staff 4 Twitter Link">
                                <span style="color:red">@error('staff4twitterlink'){{$message}}@enderror</span>
                            </div>

                            <label class="col-sm-2 col-form-label">Staff 4 Fb Link <span style="color:red">*</span></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="staff4fblink" placeholder="Staff 4 Facebook Link">
                                <span style="color:red">@error('staff4fblink'){{$message}}@enderror</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Staff 4 IG Link <span style="color:red">*</span></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="staff4instalink" placeholder="Staff 4 Instagram Link">
                                <span style="color:red">@error('staff4tinstalink'){{$message}}@enderror</span>
                            </div>

                            <label class="col-sm-2 col-form-label">Staff 4 Gmail <span style="color:red">*</span></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="staff4gmail" placeholder="Staff 4 Gmail">
                                <span style="color:red">@error('staff4gmail'){{$message}}@enderror</span>
                            </div>
                        </div>-->
                          
                        <div class="form-group row" style="float: right;">
                            <div class="col-sm-12">
                                <button type="submit" name="btn_submit" class="btn btn-primary m-b-0"><i class="fas fa-save"></i> Save</button>
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
           //logo preview
           $('#logo').change(function () {

               let reader = new FileReader();

               reader.onload = (e) => {

                   $('#previewImg').attr('src', e.target.result);
               }

               reader.readAsDataURL(this.files[0]);
           });
           //banner 1 preview
           $('#banner1').change(function () {

               let reader = new FileReader();

               reader.onload = (e) => {

                   $('#preview-banner1').attr('src', e.target.result);
               }
               reader.readAsDataURL(this.files[0]);
           });

           //banner 2 preview
           $('#banner2').change(function () {

               let reader = new FileReader();

               reader.onload = (e) => {

                   $('#preview-banner2').attr('src', e.target.result);
               }
               reader.readAsDataURL(this.files[0]);
           });

           //banner 3 preview
           $('#banner3').change(function () {

               let reader = new FileReader();

               reader.onload = (e) => {

                   $('#preview-banner3').attr('src', e.target.result);
               }
               reader.readAsDataURL(this.files[0]);
           });

           //picture preview
           $('#picture').change(function () {

               let reader = new FileReader();

               reader.onload = (e) => {

                   $('#preview-picture').attr('src', e.target.result);
               }
               reader.readAsDataURL(this.files[0]);
           });

           //staff 1 Image preview
           $('#staff1image').change(function () {

               let reader = new FileReader();

               reader.onload = (e) => {

                   $('#preview-staff1').attr('src', e.target.result);
               }
               reader.readAsDataURL(this.files[0]);
           });

           //staff 2 Image preview
           $('#staff2image').change(function () {

               let reader = new FileReader();

               reader.onload = (e) => {

                   $('#preview-staff2').attr('src', e.target.result);
               }
               reader.readAsDataURL(this.files[0]);
           });

           //staff 3 Image preview
           $('#staff3image').change(function () {

               let reader = new FileReader();

               reader.onload = (e) => {

                   $('#preview-staff3').attr('src', e.target.result);
               }
               reader.readAsDataURL(this.files[0]);
           });

           //staff 4 Image preview
           $('#staff4image').change(function () {

               let reader = new FileReader();

               reader.onload = (e) => {

                   $('#preview-staff4').attr('src', e.target.result);
               }
               reader.readAsDataURL(this.files[0]);
           });
       });

</script>
@if(Session::has('dentist_updated'))
        <script>
              swal("Great Job!", "{!! Session::get('dentist_updated') !!}", "success", {
                  button: true,
              })                               
        </script>                            
@endif
@endpush
@endsection


    






