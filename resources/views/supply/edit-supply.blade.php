@extends('layouts.admin')

@section('title')
Edit Supply
@endsection
@section('content')
     <section>
          <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3" style="margin-left:310px;">
                <div class="card">
                    <div class="card-body">
                               <form method="POST" action="{{route('supply.update')}}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{$supply->id}}" />
                            <label><span style="color:red">* </span>Required</label>
                            <div class="form-group">
                                <label>Supply Name <span style="color:red">*</span></label>
                                <input type="text" name="supply_name" value="{{$supply->supply_name}}" class="form-control"/>
                                <span style="color:red">@error('supply_name'){{$message}}@enderror</span>
                            </div>
                            <div class="form-group">
                                <label>Choose Supply Image <span style="color:red"></span></label>
                                <input type="file" name="file" class="form-control-file" onchange="previewFile(this)" />
                                <img id="previewImg" class="img-thumbnail" alt="profile image" src="{{asset('images')}}/{{$supply->picture}}" style="max-width:130px; margin-top:20px;"/>
                                <br>
                                <span style="color:red">@error('file'){{$message}}@enderror</span>
                            </div>
                            <!--<div class="form-group">
                                <label>Quantity <span style="color:red">*</span></label>
                                <input type="number" name="quantity" value="{{$supply->quantity}}" class="form-control"/>
                                 <span style="color:red">@error('quantity'){{$message}}@enderror</span>
                            </div>-->
                            <div class="form-group">
                                <label>Unit <span style="color:red">*</span></label>
                                <input type="text" name="unit" value="{{$supply->unit}}" class="form-control"/>
                                <span style="color:red">@error('unit'){{$message}}@enderror</span>
                            </div>
                             <div class="form-group">
                                <label>Danger Level <span style="color:red">* </span></label>
                                <input type="number" name="danger_level" value="{{$supply->danger_level}}" class="form-control"/>
                                <span style="color:red">@error('danger_level'){{$message}}@enderror</span>
                            </div>
                            <div class="form-group">
                                <label>Date Received <span style="color:red">*</span></label>
                                <input type="date" name="date_received" value="{{$supply->date_received}}" class="form-control"/>
                                <span style="color:red">@error('date_received'){{$message}}@enderror</span>
                            </div>
                            <button type="submit" class="btn btn-primary" style="float:right;"><i class="fas fa-save"></i> Save</button>
                                   <a class="btn btn-secondary" href="/all-supply" style="float:right; margin-right: 10px;"><i class="fas fa-reply"></i> Back</a>
                         
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</section>
       
@push('scripts')
<script src="{{asset('assets/js/sweetalert2.all.min.js')}}"></script>
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
    </script>
@if(Session::has('supply_updated'))
           <script>
              Swal.fire(
              'Good job!',
              '{!! Session::get('supply_updated') !!}',
              'success'
            )
           </script>              
@endif
@endpush  
    
@endsection
  
