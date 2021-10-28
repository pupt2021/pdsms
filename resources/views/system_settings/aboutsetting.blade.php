@extends('layouts.admin')

@section('title')
About Section Settings
@endsection
@section('content')
<div class="page-body">
           <div class="row">
             <div class="col-sm-12" >
               <div class="card">
                 
                    <div class="container">
                    <br />
                    <form action="{{route('about.update')}}" method="post" enctype="multipart/form-data" id="upload-image">
                          @csrf
                        <input type="hidden" name="id" value="{{$about->id}}" />
                        <h5>Site Banner</h5>
                         <!--About Banner forms-->
                        <div class="form-group row">
                                 <label class="col-sm-2">About Banner <span style="color:red">*</span></label>
                          <div class="col-sm-4">
                                <input type="file" class="form-control-file" name="aboutbanner" id="aboutbanner">
                                <img id="preview-about-banner" class="img-thumbnail" alt="About Image" src="{{asset('images')}}/{{$about->aboutbanner}}" style="max-width:500px; margin-top:20px;"/>
                                <span style="color:red">@error('aboutbanner'){{$message}}@enderror</span>
                          </div>
                        </div>
                        <div class="form-group row">
                                 <label class="col-sm-2">VMG Picture <span style="color:red">*</span></label>
                          <div class="col-sm-4">
                                <input type="file" class="form-control-file" name="vmgpicture" id="vmgpicture">
                                <img id="preview-vmg-picture" class="img-thumbnail" alt="VMG Image" src="{{asset('images')}}/{{$about->vmgpicture}}" style="max-width:500px; margin-top:20px;"/>
                                <span style="color:red">@error('vmgpicture'){{$message}}@enderror</span>
                          </div>
                        </div>
                        <hr style="border: 1px solid gray;" />
                        <br />
                        <h5>Titles</h5>
                         <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Vision Title <span style="color:red">*</span></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="visiontitle" value="{{$about->visiontitle}}" placeholder="Vision Title">
                                <span style="color:red">@error('visiontitle'){{$message}}@enderror</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Vision Paragraph 1 <span style="color:red">*</span></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="visionprgph1" value="{{$about->visionprgph1}}" placeholder="Vision Paragraph 1">
                                <span style="color:red">@error('visionprgph1'){{$message}}@enderror</span>
                            </div>
                             <label class="col-sm-2 col-form-label">Vision Paragraph 2 <span style="color:red">*</span></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="visionprgph2" value="{{$about->visionprgph2}}" placeholder="Vision Paragraph 2">
                                <span style="color:red">@error('visionprgph2'){{$message}}@enderror</span>
                            </div>
                        </div>
                         <hr style="border: 1px solid gray; width:500px; margin:auto;" />
                        <br />
                        <div class="form-group row">
                             <label class="col-sm-2 col-form-label">Mission Title <span style="color:red">*</span></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="missiontitle" value="{{$about->missiontitle}}" placeholder="Mission Title">
                                <span style="color:red">@error('missiontitle'){{$message}}@enderror</span>
                            </div>
                        </div>
                         <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Mission Par. 1 <span style="color:red">*</span></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="missionprgph1" value="{{$about->missionprgph1}}" placeholder="Mission Paragraph 1">
                                <span style="color:red">@error('missionprgph1'){{$message}}@enderror</span>
                            </div>
                             <label class="col-sm-2 col-form-label">Mission Par. 2 <span style="color:red">*</span></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="missionprgph2" value="{{$about->missionprgph2}}" placeholder="Mission Paragraph 2">
                                <span style="color:red">@error('missionprgph2'){{$message}}@enderror</span>
                            </div>
                        </div>
                         <hr style="border: 1px solid gray; width:500px; margin:auto;" />
                        <br />
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Goal Title <span style="color:red">*</span></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="goaltitle" value="{{$about->goaltitle}}" placeholder="Goal Title">
                                <span style="color:red">@error('goaltitle'){{$message}}@enderror</span>
                            </div>
                        </div>
                         <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Goal Paragraph 1 <span style="color:red">*</span></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="goalprgph1" value="{{$about->goalprgph1}}" placeholder="Goal Paragraph 1">
                                <span style="color:red">@error('goalprgph1'){{$message}}@enderror</span>
                            </div>
                             <label class="col-sm-2 col-form-label">Goal Paragraph 2 <span style="color:red">*</span></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="goalprgph2" value="{{$about->goalprgph2}}" placeholder="Goal Paragraph 2">
                                <span style="color:red">@error('goalprgph2'){{$message}}@enderror</span>
                            </div>
                        </div>

                         <hr style="border: 1px solid gray;" />
                     
                        <!--PUPT DENTAL CLINIC DESCRIPTION SECTION-->
                        <h5>PUP - Taguig Dental Clinic Description</h5>
                        <br />
                        <div class="form-group row">
                                 <label class="col-sm-2">Picture <span style="color:red">*</span></label>
                          <div class="col-sm-4">
                                <input type="file" class="form-control-file" name="picture" id="picture">
                                <img id="preview-picture" class="img-thumbnail" alt="Image" src="{{asset('images')}}/{{$about->picture}}" style="max-width:250px; margin-top:20px;"/>
                                <span style="color:red">@error('picture'){{$message}}@enderror</span>
                          </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Main Title <span style="color:red">*</span></label>
                            <div class="col-sm-4">
                                <input class="form-control" name="maintitle" value="{{$about->maintitle}}" placeholder="Main Title">
                                <span style="color:red">@error('maintitle'){{$message}}@enderror</span>
                            </div>

                            <label class="col-sm-2 col-form-label">Main Title Description <span style="color:red">*</span></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="maintitledescription" value="{{$about->maintitledescription}}" placeholder="Main Title Description">
                                <span style="color:red">@error('maintitledescription'){{$message}}@enderror</span>
                            </div>
                        </div>
                         <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Well Experienced Dentist Description <span style="color:red">*</span></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="weddesc" value="{{$about->weddesc}}" placeholder="Well Experienced Dentist Description">
                                <span style="color:red">@error('weddesc'){{$message}}@enderror</span>
                            </div>

                            <label class="col-sm-2 col-form-label">Clean Facilities Description <span style="color:red">*</span></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="cfdescription" value="{{$about->cfdescription}}" placeholder="Clean Facilities Description">
                                <span style="color:red">@error('cfdescription'){{$message}}@enderror</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Comfortable Clinic Description <span style="color:red">*</span></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="ccdesc" value="{{$about->ccdesc}}" placeholder="Comfortable Clinic Description">
                                <span style="color:red">@error('ccdesc'){{$message}}@enderror</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Happy to serve description <span style="color:red">*</span></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="happydesc" value="{{$about->happydesc}}" placeholder="Happy to Serve Description" />
                                <span style="color:red">@error('happydesc'){{$message}}@enderror</span>
                            </div>
                        </div>

                        <hr style="border: 1px solid gray;" />
                        <h5>Achievements Section</h5>
                        <br />
                        <div class="form-group row">
                                   <label class="col-sm-2">Achievement Background <span style="color:red">*</span></label>
                          <div class="col-sm-4">
                                <input type="file" class="form-control-file" name="achievementbg" id="achievementbg">
                                <img id="preview-achievementbg" class="img-thumbnail" alt="Image" src="{{asset('images')}}/{{$about->achievementbg}}" style="max-width:250px; margin-top:20px;"/>
                                <span style="color:red">@error('achievementbg'){{$message}}@enderror</span>
                          </div>
                            <label class="col-sm-2 col-form-label">Short Description <span style="color:red">*</span></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="achievementdesc" value="{{$about->achievementdesc}}" placeholder="Achievement Description"/>
                                <span style="color:red">@error('achievementdesc'){{$message}}@enderror</span>
                            </div>
                        </div>
                         <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Years of Exp. <span style="color:red">*</span></label>
                            <div class="col-sm-4">
                                <input type="number" class="form-control" name="yearsofexp" value="{{$about->yearsofexp}}" placeholder="Years of Experience">
                                <span style="color:red">@error('yearsofexp'){{$message}}@enderror</span>
                            </div>

                            <label class="col-sm-2 col-form-label">Happy Smiling Customer <span style="color:red">*</span></label>
                            <div class="col-sm-4">
                                <input type="number" class="form-control" name="hscustomer" value="{{$about->hscustomer}}" placeholder="Number of Customer">
                                <span style="color:red">@error('hscustomer'){{$message}}@enderror</span>
                            </div>
           
                        </div>
                         <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Patients Per Year <span style="color:red">*</span></label>
                            <div class="col-sm-4">
                                <input type="number" class="form-control" name="patientsperyear" value="{{$about->patientsperyear}}" placeholder="Number of patients per year">
                                <span style="color:red">@error('patientsperyear'){{$message}}@enderror</span>
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
        
           $('#aboutbanner').change(function () {

               let reader = new FileReader();

               reader.onload = (e) => {

                   $('#preview-about-banner').attr('src', e.target.result);
               }

               reader.readAsDataURL(this.files[0]);
           });
          
           $('#vmgpicture').change(function () {

               let reader = new FileReader();

               reader.onload = (e) => {

                   $('#preview-vmg-picture').attr('src', e.target.result);
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

           //picture preview
           $('#achievementbg').change(function () {

               let reader = new FileReader();

               reader.onload = (e) => {

                   $('#preview-achievementbg').attr('src', e.target.result);
               }
               reader.readAsDataURL(this.files[0]);
           });
       });

</script>
@if(Session::has('about_updated'))
         <script>
            swal("Great Job!", "{!! Session::get('about_updated') !!}", "success", {
                 button: true,
            })
         </script>                   
@endif
@endpush
@endsection
    






