@extends('layouts.admin')

@section('title')
Edit Service
@endsection
@section('content')
     <section>
          <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3" style="margin-left:310px;">
                <div class="card">
                    <div class="card-body">
                       <form method="POST" action="{{route('dental_service.update')}}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{$service->id}}" />
                           <label><span style="color:red">* </span>Required</label>
                            <div class="form-group">
                                <label>Service Name <span style="color:red">*</span></label>
                                <input type="text" name="service" value="{{$service->service}}" class="form-control"/>
                                <span style="color:red">@error('service'){{$message}}@enderror</span>
                            </div>
                             <div class="form-group">
                                <label>Description <span style="color:red">*</span></label>
                                <textarea name="description" value="{{$service->description}}" class="form-control"></textarea>
                                 <span style="color:red">@error('description'){{$message}}@enderror</span>
                            </div>
                      
                            <button type="submit" class="btn btn-primary" style="float:right;"><i class="fas fa-save"></i> Save</button>
                           <a class="btn btn-secondary" href="/all-service" style="float:right; margin-right: 10px;"><i class="fas fa-caret-left"></i> Back</a>
                         
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</section>
@push('scripts')
<script src="{{asset('assets/js/sweetalert2.all.min.js')}}"></script>
@if(Session::has('dental_service_updated'))
           <script>
              Swal.fire(
              'Good job!',
              '{!! Session::get('dental_service_updated') !!}',
              'success'
            )
           </script>              
@endif
@endpush
@endsection
  
