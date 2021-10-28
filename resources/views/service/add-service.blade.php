@extends('layouts.admin')

@section('title')
Add Service
@endsection
@push('css')
    <link rel="stylesheet" href="{{asset('assets/css/colored-toasts.css')}}"/>
@endpush
@section('content')
     <section>
        <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3" style="margin-left:310px;">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{route('service.store')}}" enctype="multipart/form-data">
                            @csrf
                            <label><span style="color:red">* </span>Required</label>
                            <div class="form-group">
                                <label>Service Name <span style="color:red">*</span></label>
                                <input type="text" name="service" class="form-control" value="{{old('service')}}"/>
                                <span style="color:red">@error('service'){{$message}}@enderror</span>
                            </div>
                             <div class="form-group">
                                <label>Description <span style="color:red"></span></label>
                                <textarea name="description" class="form-control">{{ old('description') }}</textarea>
                                 {{--$category_info->category_description--}}
                                 <span style="color:red">@error('description'){{$message}}@enderror</span>
                            </div>
                            <button type="submit" class="btn btn-primary" style="float:right;"><i class="fas fa-paper-plane"></i> Submit</button>
                            <a class="btn btn-secondary" href="/all-service" style="float:right; margin-right: 10px;"><i class="fas fa-caret-left"></i> Back</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
     
    
</section>
       
    
 @push('scripts')
<script src="{{asset('assets/js/jquery-3.5.1.min.js')}}"></script>
    <script src="{{asset('assets/js/sweetalert2.all.min.js')}}"></script>
@if(Session::has('dental_service_added'))
      <script>
         const Toast = Swal.mixin({
                  toast: true,
                  position: 'top-end',
                  showConfirmButton: false,
                  timer: 5000,
                  iconColor: 'white',
                  timerProgressBar: true,
                  showCloseButton: true,
                  customClass: {
                    popup: 'colored-toast'
                      //title: 'white',
                      //closeButton: 'white',
                  },
                  didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                  }
                })

                Toast.fire({
                  icon: 'success',
                  title: '{!! Session::get('appointment_updated') !!}',
                  background: '#a5dc86',
                  // colors: #a5dc86 - success, #f27474 - error, #f8bb86 - warning, #3fc3ee - info, #87adbd - question
                })
      </script>
@endif
@endpush
@endsection
  
