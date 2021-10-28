@extends('layouts.admin')

@section('title')
Add Appointment
@endsection
@section('content')
@push('css')
<link rel="stylesheet" href="{{asset('assets/css/colored-toasts.css')}}"/>
<link rel="stylesheet" href="{{asset('assets/css/slimselect.min.css')}}"/>
@endpush
     <section>

        <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3" style="margin-left:310px;">
                <div class="card">
                    <div class="card-body">

                        <form method="POST" action="{{route('appointment.store')}}" enctype="multipart/form-data">
                            @csrf
                            <label><span style="color:red">* </span>Required</label>

                             <div class="form-group">
                                <label>Patient <span style="color:red">*</span></label>
                                <select name="patient_id" id="slim-select" class="">
                                    <option value="">--Select Patient--</option>
                                    @foreach($patients as $patient)

                                      @if($patient->id == old('patient_id'))
                                                <option value="{{$patient->id}}" selected>{{$patient->firstname}} {{$patient->middlename}} {{$patient->lastname}}</option>
                                            @else
                                                <option value="{{$patient->id}}">{{$patient->firstname}} {{$patient->middlename}} {{$patient->lastname}}</option>
                                            @endif
                                    @endforeach
                                </select>
                                <span style="color:red">@error('patient_id'){{$message}}@enderror</span>
                            </div>
                             <div class="form-group">
                                <label>Dental Service <span style="color:red">*</span></label>
                                <select name="service_id" id="slim-select1" class="">
                                    <option value="">--Select Service--</option>
                                    @foreach($dentalservices as $service)
                                   <option value="{{$service->id}}" @if (old('service_id') == "$service->id") {{ 'selected' }} @endif >{{$service->service}}</option>
                                    @endforeach
                                </select>
                                <span style="color:red">@error('service_id'){{$message}}@enderror</span>
                            </div>
                            <div class="form-group">
                                <label>Date <span style="color:red">*</span></label>
                                <input type="date" id="appointmentDate" name="date" class="form-control" value="{{old('date')}}"/>
                                <span style="color:red">@error('date'){{$message}}@enderror</span>
                            </div>
                             <div class="form-group">
                                <label>Time <span style="color:red">*</span></label>
                                <!--<input type="time" name="time" class="form-control" value="{{old('time')}}"/>-->
                                 <select name="time" id="slim-select2" class="">
                                    <option value="">--Select Time--</option>
                                    <option value="8:00 - 9:00 AM" @if (old('time') == "8:00 - 9:00 AM") {{ 'selected' }} @endif>8:00 - 9:00 AM</option>
                                    <option value="9:00 - 10:00 AM" @if (old('time') == "9:00 - 10:00 AM") {{ 'selected' }} @endif>9:00 - 10:00 AM</option>
                                    <option value="10:00 - 11:00 AM" @if (old('time') == "10:00 - 11:00 AM") {{ 'selected' }} @endif>10:00 - 11:00 AM</option>
                                    <option value="11:00 - 12:00 PM" @if (old('time') == "11:00 - 12:00 PM") {{ 'selected' }} @endif>11:00 - 12:00 PM</option>
                                    <option value="1:00 - 2:00 PM" @if (old('time') == "1:00 - 2:00 PM") {{ 'selected' }} @endif>1:00 - 2:00 PM</option>
                                    <option value="2:00 - 3:00 PM" @if (old('time') == "2:00 - 3:00 PM") {{ 'selected' }} @endif>2:00 - 3:00 PM</option>
                                    <option value="3:00 - 4:00 PM" @if (old('time') == "3:00 - 4:00 PM") {{ 'selected' }} @endif>3:00 - 4:00 PM</option>
                               </select>
                                 <span style="color:red">@error('time'){{$message}}@enderror</span>
                            </div>
                            <div class="form-group">
                                <label>Description <span></span></label>
                                <input type="text" name="description" class="form-control" value="{{old('description')}}"/>
                                <span style="color:red">@error('description'){{$message}}@enderror</span>
                            </div>
                             
                          <!--  @can('appointment status')
                            <div class="form-group">
                                <label>Status <span style="color:red">*</span></label>
                                <select name="status"  class="form-control">
                                    <option value="">--Select One--</option>
                                   <option value="Pending" @if (old('status') == "Pending") {{ 'selected' }} @endif>Pending</option>
                                   <option value="Scheduled" @if (old('status') == "Scheduled") {{ 'selected' }} @endif>Scheduled</option>
                                   <option value="Closed" @if (old('status') == "Closed") {{ 'selected' }} @endif>Closed</option>
                                    <option value="Reschedule" @if (old('status') == "Reschedule") {{ 'selected' }} @endif>Reschedule</option>
                                </select>
                                <span style="color:red">@error('gender'){{$message}}@enderror</span>
                            </div>
                          @endcan-->
                            <button type="submit" class="btn btn-primary" style="float:right;"><i class="fas fa-paper-plane"></i> Submit</button>
                            <a class="btn btn-secondary" href="/appointments" style="float:right; margin-right: 10px;"><i class="fas fa-reply"></i> Back</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
       
    
 @push('scripts')
<script src="{{asset('assets/js/jquery-3.5.1.min.js')}}"></script>
<script src="{{asset('assets/js/slimselect.min.js')}}"></script>
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
    document.getElementById("appointmentDate").setAttribute('min', minDate);


     $(document).ready(function () {
         $.noConflict();

        const picker = document.getElementById("appointmentDate");
        picker.addEventListener('input', function (e) {
            var day = new Date(this.value).getUTCDay();
            if ([0, 6].includes(day)) {
                e.preventDefault();
                this.value = '';
                //alert('Weekends not allowed');
                Swal.fire(
                  'Bobo!',
                  'Weekends are not allowed!!!',
                  'error'
                )
            }
        });



             new SlimSelect({
                 select: '#slim-select'
             })
             new SlimSelect({
                 select: '#slim-select1'
             })
             new SlimSelect({
                 select: '#slim-select2'
             })
        });
    </script> 
@if(Session::has('appointment_added'))
      <script>
           const Toast = Swal.mixin({
                  toast: true,
                  position: 'top-end',
                  showConfirmButton: false,
                  //timer: 5000,
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
                  title: '{!! Session::get('appointment_added') !!}',
                  background: '#a5dc86',
                  // colors: #a5dc86 - success, #f27474 - error, #f8bb86 - warning, #3fc3ee - info, #87adbd - question
                })
      </script>
@endif
@endpush                         
@endsection
  
