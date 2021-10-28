@extends('layouts.admin')
@section('title')
Edit Appointment
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
                        <form method="POST" action="{{route('appointment.update')}}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{$appointment->id}}" />
                            <label><span style="color:red">* </span>Required</label>

                             <div class="form-group">
                                <label>Patient <span style="color:red">*</span></label>
                                <select name="patient_id"  class="form-control" disabled>
                                    @foreach($patients as $patient)
                                   <option value="{{$patient->id}}" {{$patient->id == $appointment->patient_id  ? 'selected' : ''}}>{{$patient->firstname}} {{$patient->middlename}} {{$patient->lastname}}</option>
                                    @endforeach
                                </select>
                                <span style="color:red">@error('patient_id'){{$message}}@enderror</span>
                            </div>
                            
                         
                             <div class="form-group">
                                <label>Dental Service <span style="color:red">*</span></label>
                                <select name="service_id"  class="form-control">
                                  
                                    @foreach($dentalservices as $service)
                                   <option value="{{$service->id}}" {{$service->id == $appointment->service_id  ? 'selected' : ''}}>{{$service->service}}</option>
                                    @endforeach
                                </select>
                                <span style="color:red">@error('service_id'){{$message}}@enderror</span>
                            </div>
                            
                            @if($appointment->status == "Reschedule")
                            <div class="form-group">
                                <label>Date <span style="color:red">*</span></label>
                                <input type="date" id="appointmentDate" name="date" value="{{$appointment->date}}" class="form-control"/>
                                <span style="color:red">@error('date'){{$message}}@enderror</span>
                            </div>
                            @endif
                            @if($appointment->status != "Reschedule" )
                            <div class="form-group">
                                <label>Date <span style="color:red">*</span></label>
                                <input type="date" id="appointmentDate" name="date" value="{{$appointment->date}}" class="form-control" readonly/>
                                <span style="color:red">@error('date'){{$message}}@enderror</span>
                            </div>
                            @endif
                            
                            
                            <div class="form-group">
                                <label>Time <span style="color:red">*</span></label>
                                <!--<input type="time" name="time" value="{{$appointment->time}}" class="form-control"/>-->
                                 <select name="time"  id="slim-select2" class="">
                                    <!--<option value="" {{$patient->time=="" ? 'selected' : ''}}>--Select Time--</option>-->
                                    <option value="8:00 - 9:00 AM" {{$appointment->time=="8:00 - 9:00 AM" ? 'selected' : ''}}>8:00 - 9:00 AM</option>
                                    <option value="9:00 - 10:00 AM" {{$appointment->time=="9:00 - 10:00 AM" ? 'selected' : ''}}>9:00 - 10:00 AM</option>
                                    <option value="10:00 - 11:00 AM" {{$appointment->time=="10:00 - 11:00 AM" ? 'selected' : ''}}>10:00 - 11:00 AM</option>
                                    <option value="11:00 - 12:00 PM" {{$appointment->time=="11:00 - 12:00 PM" ? 'selected' : ''}}>11:00 - 12:00 PM</option>
                                    <option value="1:00 - 2:00 PM" {{$appointment->time=="1:00 - 2:00 PM" ? 'selected' : ''}}>1:00 - 2:00 PM</option>
                                    <option value="2:00 - 3:00 PM" {{$appointment->time=="2:00 - 3:00 PM" ? 'selected' : ''}}>2:00 - 3:00 PM</option>
                                    <option value="3:00 - 4:00 PM" {{$appointment->time=="3:00 - 4:00 PM" ? 'selected' : ''}}>3:00 - 4:00 PM</option>
                               </select>
                                 <span style="color:red">@error('time'){{$message}}@enderror</span>
                            </div>
                            
                            <div class="form-group">
                                <label>Description <span></span></label>
                                <input type="text" name="description" value="{{$appointment->description}}" class="form-control"/>
                                <span style="color:red">@error('description'){{$message}}@enderror</span>
                            </div>

                            {{--@can('appointment status')--}}
                            <div class="form-group">
                                <label>Status <span style="color:red">*</span></label>
                               <select name="status"  class="form-control" id="status">
                                    <option value="Pending" {{$appointment->status=="Pending" ? 'selected' : ''}}>Pending</option>
                                    <option value="Scheduled" {{$appointment->status=="Scheduled" ? 'selected' : ''}}>Scheduled</option>
                                    <option value="Closed" {{$appointment->status=="Closed" ? 'selected' : ''}}>Closed</option>
                                    <option value="Reschedule" {{$appointment->status=="Reschedule" ? 'selected' : ''}}>Reschedule</option>
                               </select>
                                <span style="color:red">@error('status'){{$message}}@enderror</span>
                            </div>
                          {{--@endcan--}}
                            <button type="submit" class="btn btn-primary" style="float:right;"><i class="fas fa-save"></i> Save</button>
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
    <script src="{{asset('assets/js/sweetalert2.all.min.js')}}"></script>
    <script src="{{asset('assets/js/slimselect.min.js')}}"></script>
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
        //document.getElementById("appointmentDate").setAttribute('min', minDate);

       
       // $('#status').on('change', function() {
         //   alert('Hello!');
        //});

    /*$(document).ready(function () {
    $.noConflict();
        $('select').on('change', function () {     
            if (this.value == "Reschedule") {
                //alert("yes");
                   
                   //var shit =  document.getElementById("appointmentDate"); 

                //shit.setAttribute('min', minDate);
                location.reload();
                $("#appointmentDate").setAttribute('min', minDate);
            }
        });
      });
      swal("Great Job!", "{!! Session::get('appointment_updated') !!}", "success", {
                  button: true,
              })

*/
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
            
             /*new SlimSelect({
                 select: '#slim-select'
             })
             new SlimSelect({
                 select: '#slim-select1'
             })*/
             new SlimSelect({
                 select: '#slim-select2'
             })
        });
    </script>
 @if(Session::has('appointment_updated'))
           <script>
             Swal.fire(
              'Good job!',
              '{!! Session::get('appointment_updated') !!}',
              'success'
            )
           </script>   
@endif
@endpush
@endsection
  
