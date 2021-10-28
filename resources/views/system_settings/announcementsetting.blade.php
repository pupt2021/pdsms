@extends('layouts.admin')

@section('title')
Announcement Section Settings
@endsection
@section('content')
<div class="page-body">
           <div class="row">
             <div class="col-sm-12" >
               <div class="card">
                 
                    <div class="container">

                    <br />
                    <form action="{{route('announcement.update')}}" method="post" enctype="multipart/form-data" id="upload-image">
                          @csrf
                        <input type="hidden" name="id" value="{{$announcement->id}}" />
                        <!--ANNOUNCEMENT SECTION-->
                        <h5>Announcement Section</h5>
                        <br />
                        <h5>Site Banner Announcement</h5>
                         <!--Announcement 1 forms-->
                        <div class="form-group row">
                                 <label class="col-sm-2">Announcement 1 <span style="color:red">*</span></label>
                          <div class="col-sm-4">
                                <input type="file" class="form-control-file" name="announcement1" id="announcement1">
                                <img id="preview-announcement1" class="img-thumbnail" alt="Image" src="{{asset('images')}}/{{$announcement->announcement1}}" style="max-width:500px; margin-top:20px;"/>
                                <span style="color:red">@error('announcement1'){{$message}}@enderror</span>
                          </div>
                        </div>
                         <div class="form-group row">
                                  <label class="col-sm-2">Announcement 2 <span style="color:red">*</span></label>
                              <div class="col-sm-4">
                                <input type="file" class="form-control-file" name="announcement2" id="announcement2">
                                <img id="preview-announcement2" class="img-thumbnail" alt="Image" src="{{asset('images')}}/{{$announcement->announcement2}}" style="max-width:500px; margin-top:20px;"/>
                                <span style="color:red">@error('announcement2'){{$message}}@enderror</span>
                          </div>
                         </div>   
                          <div class="form-group row">
                                  <label class="col-sm-2">Announcement 3 <span style="color:red">*</span></label>
                           <div class="col-sm-4">
                                <input type="file" class="form-control-file" name="announcement3" id="announcement3">
                                <img id="preview-announcement3" class="img-thumbnail" alt="Image" src="{{asset('images')}}/{{$announcement->announcement3}}" style="max-width:500px; margin-top:20px;"/>
                                <span style="color:red">@error('announcement3'){{$message}}@enderror</span>
                          </div>
                          </div>
                         
                       

                        <hr style="border: 1px solid gray;" />
                        <br />
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Announcement Title <span style="color:red">*</span></label>
                            <div class="col-sm-4">
                                <input class="form-control" name="announcementtitle" value="{{$announcement->announcementtitle}}" placeholder="Announcement title">
                                <span style="color:red">@error('announcementtitle'){{$message}}@enderror</span>
                            </div>

                            <label class="col-sm-2 col-form-label">Announcement Text <span style="color:red">*</span></label>
                            <div class="col-sm-4">
                                <input class="form-control" name="announcementdescription" value="{{$announcement->announcementdescription}}" placeholder="Announcement description">
                                <span style="color:red">@error('announcementdescription'){{$message}}@enderror</span>
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
           //announcement 1 preview
           $('#announcement1').change(function () {

               let reader = new FileReader();

               reader.onload = (e) => {

                   $('#preview-announcement1').attr('src', e.target.result);
               }
               reader.readAsDataURL(this.files[0]);
           });

           //announcement 2 preview
           $('#announcement2').change(function () {

               let reader = new FileReader();

               reader.onload = (e) => {

                   $('#preview-announcement2').attr('src', e.target.result);
               }
               reader.readAsDataURL(this.files[0]);
           });

           //announcement 3 preview
           $('#announcement3').change(function () {

               let reader = new FileReader();

               reader.onload = (e) => {

                   $('#preview-announcement3').attr('src', e.target.result);
               }
               reader.readAsDataURL(this.files[0]);
           });
       });

</script>
 @if(Session::has('announcement_updated'))
        <script>
          swal("Great Job!", "{!! Session::get('announcement_updated') !!}", "success", {
              button: true,
          })
        </script>                    
 @endif
@endpush
@endsection

    






