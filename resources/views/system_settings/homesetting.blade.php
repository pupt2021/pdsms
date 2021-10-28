@extends('layouts.admin')

@section('title')
Home Section Settings
@endsection
@section('content')
         <div class="page-body">
           <div class="row">
             <div class="col-sm-12" >
               <div class="card">
                 
                    <div class="container">
                    <br />
                    <form action="{{route('home.update')}}" method="post" enctype="multipart/form-data" id="upload-image">
                          @csrf
                        <input type="hidden" name="id" value="{{$home->id}}" />
                         <h5>Site Logo</h5>
                         <!--Site logo forms-->
                        <div class="form-group row">
                          <label class="col-sm-2">Logo <span style="color:red">*</span></label>
                          <div class="col-sm-4">
                                <input type="file" class="form-control-file" name="logo" id="logo">
                                <img id="previewImg" class="img-thumbnail" alt="logo image" src="{{asset('images')}}/{{$home->logo}}" style="max-width:130px; margin-top:20px;"/>
                                <span style="color:red">@error('logo'){{$message}}@enderror</span>
                          </div>
                        </div>
                        <hr style="border: 1px solid gray;"/>
                        <h5>Site Banner</h5>
                         <!--Banner 1 forms-->
                        <div class="form-group row">
                                 <label class="col-sm-2">Banner 1 <span style="color:red">*</span></label>
                          <div class="col-sm-4">
                                <input type="file" class="form-control-file" name="banner1" id="banner1">
                                <img id="preview-banner1" class="img-thumbnail" alt="Banner 1 Image" src="{{asset('images')}}/{{$home->banner1}}" style="max-width:500px; margin-top:20px;"/>
                                <span style="color:red">@error('banner1'){{$message}}@enderror</span>
                          </div>
                        </div>
                         <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Banner 1 Title <span style="color:red">*</span></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="banneronetitle" value="{{$home->banneronetitle}}" placeholder="Banner 1 title">
                                <span style="color:red">@error('banneronetitle'){{$message}}@enderror</span>
                            </div>

                            <label class="col-sm-2 col-form-label">Banner 1 Desc. <span style="color:red">*</span></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="banneronedescription" value="{{$home->banneronedescription}}" placeholder="Banner 1 Description">
                                <span style="color:red">@error('banneronedescription'){{$message}}@enderror</span>
                            </div>
                        </div>
                         <hr style="border: 1px solid gray; width:500px; margin:auto;" />
                        <br />
                        <!--Banner 2 forms-->
                        <div class="form-group row">
                                 <label class="col-sm-2">Banner 2 <span style="color:red">*</span></label>
                          <div class="col-sm-4">
                                <input type="file" class="form-control-file" name="banner2" id="banner2">
                                <img id="preview-banner2" class="img-thumbnail" alt="Banner 2 Image" src="{{asset('images')}}/{{$home->banner2}}" style="max-width:500px; margin-top:20px;"/>
                                <span style="color:red">@error('banner2'){{$message}}@enderror</span>
                          </div>
                        </div>
                         <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Banner 2 Title <span style="color:red">*</span></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="bannertwotitle" value="{{$home->bannertwotitle}}" placeholder="Banner 2 title">
                                <span style="color:red">@error('bannertwotitle'){{$message}}@enderror</span>
                            </div>

                            <label class="col-sm-2 col-form-label">Banner 2 Desc. <span style="color:red">*</span></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="bannertwodescription" value="{{$home->bannertwodescription}}" placeholder="Banner 2 Description">
                                <span style="color:red">@error('bannertwodescription'){{$message}}@enderror</span>
                            </div>
                        </div>
                         <hr style="border: 1px solid gray; width:500px; margin:auto;" />
                        <br />
                        <!--Banner 3 forms-->
                        <div class="form-group row">
                                 <label class="col-sm-2">Banner 3 <span style="color:red">*</span></label>
                          <div class="col-sm-4">
                                <input type="file" class="form-control-file" name="banner3" id="banner3">
                                <img id="preview-banner3" class="img-thumbnail" alt="Banner 3 Image" src="{{asset('images')}}/{{$home->banner3}}" style="max-width:500px; margin-top:20px;"/>
                                <span style="color:red">@error('banner3'){{$message}}@enderror</span>
                          </div>
                        </div>
                         <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Banner 3 Title <span style="color:red">*</span></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="bannerthreetitle" value="{{$home->bannerthreetitle}}" placeholder="Banner 3 title">
                                <span style="color:red">@error('bannerthreetitle'){{$message}}@enderror</span>
                            </div>

                            <label class="col-sm-2 col-form-label">Banner 3 Desc. <span style="color:red">*</span></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="bannerthreedescription" value="{{$home->bannerthreedescription}}" placeholder="Banner 3 Description">
                                <span style="color:red">@error('bannerthreedescription'){{$message}}@enderror</span>
                            </div>
                        </div>
                  
                        <hr style="border: 1px solid gray;" />
                        <h5>Gallery Section</h5>
                         <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Gallery Description <span style="color:red">*</span></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="gallerydesc" value="{{$home->gallerydesc}}" placeholder="Gallery Description">
                                <span style="color:red">@error('gallerydesc'){{$message}}@enderror</span>
                            </div>
                        </div>
                         <div class="form-group row">
                          <label class="col-sm-2">Picture 1 <span style="color:red">*</span></label>
                          <div class="col-sm-4">
                                <input type="file" class="form-control-file" name="picture1" id="picture1">
                                <img id="preview-picture1" class="img-thumbnail" alt="pic 1 preview image" src="{{asset('images')}}/{{$home->picture1}}" style="max-width:170px; margin-top:20px;"/>
                                <span style="color:red">@error('picture1'){{$message}}@enderror</span>
                          </div>

                           <label class="col-sm-2">Picture 2 <span style="color:red">*</span></label>
                          <div class="col-sm-4">
                                <input type="file" class="form-control-file" name="picture2" id="picture2">
                                <img id="preview-picture2" class="img-thumbnail" alt="pic 2 preview image" src="{{asset('images')}}/{{$home->picture2}}" style="max-width:170px; margin-top:20px;"/>
                                <span style="color:red">@error('picture2'){{$message}}@enderror</span>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-2">Picture 3 <span style="color:red">*</span></label>
                          <div class="col-sm-4">
                                <input type="file" class="form-control-file" name="picture3" id="picture3">
                                <img id="preview-picture3" class="img-thumbnail" alt="pic 3 preview image" src="{{asset('images')}}/{{$home->picture3}}" style="max-width:170px; margin-top:20px;"/>
                                <span style="color:red">@error('picture3'){{$message}}@enderror</span>
                          </div>

                           <label class="col-sm-2">Picture 4 <span style="color:red">*</span></label>
                          <div class="col-sm-4">
                                <input type="file" class="form-control-file" name="picture4" id="picture4">
                                <img id="preview-picture4" class="img-thumbnail" alt="pic 4 preview image" src="{{asset('images')}}/{{$home->picture4}}" style="max-width:170px; margin-top:20px;"/>
                                <span style="color:red">@error('picture4'){{$message}}@enderror</span>
                          </div>
                        </div>
                        <hr style="border: 1px solid gray;" />
                        <h5>Contact Section</h5>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Contact Desc. <span style="color:red">*</span></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="contactdesc" value="{{$home->contactdesc}}" placeholder="Contact Description">
                                <span style="color:red">@error('contactdesc'){{$message}}@enderror</span>
                            </div>
                        </div>

                        <hr style="border: 1px solid gray;" />
                        <h5>Footer Section</h5>
                        <h6 style="font-weight:bold;">System Title and Description</h6>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">System Title <span style="color:red">*</span></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="systemtitle" value="{{$home->systemtitle}}" placeholder="System Title">
                                <span style="color:red">@error('systemtitle'){{$message}}@enderror</span>
                            </div>

                            <label class="col-sm-2 col-form-label">System Desc <span style="color:red">*</span></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="systemdescription" value="{{$home->systemdescription}}" placeholder="System Description">
                                <span style="color:red">@error('systemdescription'){{$message}}@enderror</span>
                            </div>
                        </div>
                        <hr style="border: 1px solid gray;" />
                        <h6 style="font-weight:bold;">PUPT Dental Social Media Links</h6>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Dental Twitter <span style="color:red">*</span></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="dentaltwitterlink" value="{{$home->dentaltwitterlink}}" placeholder="Dental Twitter Link">
                                <span style="color:red">@error('dentaltwitterlink'){{$message}}@enderror</span>
                            </div>

                            <label class="col-sm-2 col-form-label">Dental FB Link <span style="color:red">*</span></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="dentalfblink" value="{{$home->dentalfblink}}" placeholder="Dental Facebook Link">
                                <span style="color:red">@error('dentalfblink'){{$message}}@enderror</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Dental IG Link <span style="color:red">*</span></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="dentalinstalink" value="{{$home->dentalinstalink}}" placeholder="Dental Instagram Link">
                                <span style="color:red">@error('dentalinstalink'){{$message}}@enderror</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Dental Address <span style="color:red">*</span></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="dentaladdress" value="{{$home->dentaladdress}}" placeholder="Dental Address">
                                <span style="color:red">@error('dentaladdress'){{$message}}@enderror</span>
                            </div>

                            <label class="col-sm-2 col-form-label">Phone Number <span style="color:red">*</span></label>
                            <div class="col-sm-4">
                                <input type="number" class="form-control" name="dentalphone" value="{{$home->dentalphone}}" placeholder="Dental Phone Number">
                                <span style="color:red">@error('dentalphone'){{$message}}@enderror</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Dental Email add. <span style="color:red">*</span></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="dentalemail" value="{{$home->dentalemail}}" placeholder="Dental Email Address">
                                <span style="color:red">@error('dentalemail'){{$message}}@enderror</span>
                            </div>
                        </div>

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

           //Gallery section previews
           //Picture 1 preview
           $('#picture1').change(function () {

               let reader = new FileReader();

               reader.onload = (e) => {

                   $('#preview-picture1').attr('src', e.target.result);
               }
               reader.readAsDataURL(this.files[0]);
           });

           //Picture 2 preview
           $('#picture2').change(function () {

               let reader = new FileReader();

               reader.onload = (e) => {

                   $('#preview-picture2').attr('src', e.target.result);
               }
               reader.readAsDataURL(this.files[0]);
           });

           //Picture 3 preview
           $('#picture3').change(function () {

               let reader = new FileReader();

               reader.onload = (e) => {

                   $('#preview-picture3').attr('src', e.target.result);
               }
               reader.readAsDataURL(this.files[0]);
           });

            //Picture 4 preview
           $('#picture4').change(function () {

               let reader = new FileReader();

               reader.onload = (e) => {

                   $('#preview-picture4').attr('src', e.target.result);
               }
               reader.readAsDataURL(this.files[0]);
           });
       });
</script>
@if(Session::has('home_updated'))
          <script>
            swal("Great Job!", "{!! Session::get('home_updated') !!}", "success", {
              button: true,
            })
          </script>  
@endif
@endpush
@endsection
    






