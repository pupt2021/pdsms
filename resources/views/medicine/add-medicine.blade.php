@extends('layouts.admin')

@section('title')
Add Medicine
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
                        <form method="POST" action="{{route('medicine.store')}}" enctype="multipart/form-data">
                            @csrf
                            <label><span style="color:red">* </span>Required</label>
                            <div class="form-group">
                                <label>Medicine Name <span style="color:red">*</span></label>
                                <input type="text" name="medicine_name" class="form-control" value="{{old('medicine_name')}}"/>
                                <span style="color:red">@error('medicine_name'){{$message}}@enderror</span>
                            </div>
                             <!--<div class="form-group">
                                <label>Quantity <span style="color:red">*</span></label>
                                <input type="number" name="quantity" class="form-control" value="{{old('quantity')}}"/>
                                 <span style="color:red">@error('quantity'){{$message}}@enderror</span>
                            </div>-->
                            <div class="form-group">
                                <label>Unit <span style="color:red">*</span></label>
                                <input type="text" name="unit" class="form-control" value="{{old('unit')}}"/>
                                <span style="color:red">@error('unit'){{$message}}@enderror</span>
                            </div>
                            <div class="form-group">
                                <label>Danger Level <span style="color:red">*</span></label>
                                <input type="number" name="danger_level" class="form-control" value="{{old('danger_level')}}"/>
                                <span style="color:red">@error('danger_level'){{$message}}@enderror</span>
                            </div>
                            <div class="form-group">
                                <label>Date Received <span style="color:red">*</span></label>
                                <input type="date" name="date_received" class="form-control" value="{{old('date_received')}}"/>
                                <span style="color:red">@error('date_received'){{$message}}@enderror</span>
                            </div>
                            <div class="form-group">
                                <label>Expiration Date <span style="color:red">*</span></label>
                                <input type="date" id="expirationDate" name="expiration_date" class="form-control" value="{{old('expiration_date')}}"/>
                                <span style="color:red">@error('expiration_date'){{$message}}@enderror</span>
                            </div>
                             
                            <button type="submit" class="btn btn-primary" style="float:right;"><i class="fas fa-paper-plane"></i> Submit</button>
                            <a class="btn btn-secondary" href="/all-medicine" style="float:right; margin-right: 10px;"><i class="fas fa-reply"></i> Back</a>
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
<script>
     var date = new Date();
        var tdate = date.getDate();
        var month = date.getMonth() + 1;
        if (tdate < 10) {
            tdate = '0' + tdate;
        }
        if (month < 10) {
            month = '0' + month;
        }
        var year = date.getUTCFullYear();
        var minDate = year + "-" + month + "-" + tdate;
        document.getElementById("expirationDate").setAttribute('min', minDate);
</script>
@if(Session::has('medicine_added'))
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
                  title: '{!! Session::get('medicine_added') !!}',
                  background: '#a5dc86',
                  // colors: #a5dc86 - success, #f27474 - error, #f8bb86 - warning, #3fc3ee - info, #87adbd - question
                })
      </script>
@endif
@endpush
@endsection
  
