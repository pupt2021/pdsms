@extends('layouts.admin')

@section('title')
Patient Details
@endsection
@section('css')
<link rel="stylesheet" href="{{asset('assets/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/buttons.bootstrap4.min.css')}}">
@endsection
@section('content')

<div class="card-tools" style="float: right;">

         <a href="/all-patient" class="btn btn-primary"><i class="fas fa-list-ul"></i> List of Patients</a>
         <a href="/edit-patient/{{$patient->id}}" class="btn btn btn-warning"><i class="fa fa-edit"></i> Edit Patient Details</a>
</div>

<br />
<br />

 <div class="row">
    <div class="col">
        <div class="card col-md-12">
    <div class="card-body">
              <h3>Personal Information
             (@if($patient->patient_category=='Student')
              <span class="badge bg-success" >{{$patient->patient_category}}</span>
            @endif
             @if($patient->patient_category=='Administrator')
              <span class="badge bg-primary">{{$patient->patient_category}}</span>
            @endif
            @if($patient->patient_category=='Faculty')
              <span class="badge bg-danger">{{$patient->patient_category}}</span>
            @endif
            @if($patient->patient_category=='Dependent')
              <span class="badge bg-secondary">{{$patient->patient_category}}</span>
            @endif
             )
        </h3>
            
<div class="row">
  <div class="col-md-12">
    <div class="row">
        <center>
         <div class="col-md-12" style="margin-left:50%;">
           <img src="{{asset('patient_pics')}}/{{$patient->picture}}" class="img-circle"  style="max-width:200px; max-height:200px;">
        </div>
            </center>
    </div>
      <br />
    <div class="row">
             <div class="col-md-12">
        <span class="field"><b>Full Name:</b> </span>
        <span class="field-value">{{$patient->lastname}}{{","}} {{$patient->firstname}} {{$patient->middlename}} {{$patient->extensionname}}</span>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <span class="field"><b>Gender: </b></span>
        <span class="field-value">{{$patient->gender}}</span>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <span class="field"><b>Birthday: </b></span>
        <span class="field-value">{{date('F d, Y', strtotime($patient->birthday))}}</span>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <span class="field"><b>Email: </b></span>
        <span class="field-value">{{$patient->email}}</span>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <span class="field"><b>Group Classification: </b></span>
        @if($patient->group_class != NULL)
            <span class="field-value">{{$patient->group_class}}</span>
        @endif
        @if($patient->group_class == NULL || $patient->group_class == 'N/A')
            <span class="field-value">N/A</span>
        @endif
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <span class="field"><b>Cellphone Number: </b></span>
        <span class="field-value">{{$patient->contactnumber}}</span>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <span class="field"><b>Address: </b></span>
        <span class="field-value">{{$patient->streetnumber}} {{$patient->streetname}}{{","}} {{$patient->brgy}} {{$patient->district}}{{","}} {{$patient->city}} {{"City"}}</span>
      </div>
    </div>
  </div>

    <!--Picture column-->
     <!--<div class="col-md-6">
    </div>-->
</div>
              <!-- /.card-body -->
            </div>


</div>

    </div>
    <div class="col">
      <div class="card col-md-12">
    <div class="card-body">
              <h3>Medical History</h3>   
<div class="row">
  <div class="col-md-12">
     
        <span class="field"><b>Illness history: </b></span>
        @if($patient->med_history != NULL)
     
       @foreach($md as $value)
                                        {{$value}},
                                    @endforeach
       
      @else
      <span class="field-value no-illness">No Illness</span>
       @endif
      </div>
</div>
<div class="row">
      <div class="col-md-12">
        <span class="field"><b>Allergies: </b></span>
        @if($patient->allergies == NULL)
        <span class="field-value">No Allergies</span>
        @else
          <span class="field-value">{{$patient->allergies}}</span>
        @endif
      </div>
    </div>
        <div class="row">
      <div class="col-md-12">
        <span class="field"><b>Medications: </b></span>
           @if($patient->medication == NULL)
          <span class="field-value">No Medications</span>
          @else
        <span class="field-value">{{$patient->medication}}</span>
          @endif
      </div>
    </div>
        <div class="row">
      <div class="col-md-12">
        <span class="field"><b>Others: </b></span>
          @if($patient->others == NULL)
          <span class="field-value">None</span>
          @else
        <span class="field-value">{{$patient->others}}</span>
          @endif
      </div>
    </div>
        <div class="row">
      <div class="col-md-12">
        <span class="field"><b>Dentist Remarks: </b></span>
          @if($patient->remarks == NULL)
          <span class="field-value">None</span>
          @else
        <span class="field-value">{{$patient->remarks}}</span>
          @endif
      </div>
    </div>
              <!-- /.card-body -->
     </div>
</div>
    </div>


     <br />
     <div class="col-md-12">
      <div class="card col-md-12">
    <div class="card-body">
              <h3>Appointment History</h3>   
        <table id="appointmentHistory" class="table table-bordered table-striped">
                    <thead>
<tr>
    <th>#</th>
    <th>Date Created</th>
    <th>Appointment Date</th>
    <th>Time</th>
    <th>Service</th>
    <!--<th>Description</th>-->
</tr>
</thead>
<tbody>
     @foreach($apt as $appointmentHistory)
    
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{date('F d, Y', strtotime($appointmentHistory->created_at))}}</td>
            <td>{{date('F d, Y', strtotime($appointmentHistory->date))}}</td>
            <td>{{date('h:m A', strtotime($appointmentHistory->time))}}</td>
            <td>{{$appointmentHistory->service->service}}</td>
            <!--@if($appointmentHistory->description == NULL)
                <td><span>No Description</span></td>
            @endif
            @if($appointmentHistory->description != NULL)
            <td>{{$appointmentHistory->description}}</td>
            @endif-->
        </tr>
       
    @endforeach
</tbody>
                </table>
              <!-- /.card-body -->
     </div>
</div>
    </div>
  </div>

@section('js')
<script src="{{asset('assets/js/jquery-3.5.1.min.js')}}"></script>
<script src="{{asset('assets/js/popper.min.js')}}"></script>

<!--DataTables Plugins-->
<script src="{{asset('assets/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('assets/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('assets/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/js/jszip.min.js')}}"></script>
<script src="{{asset('assets/js/pdfmake.min.js')}}"></script>
<script src="{{asset('assets/js/vfs_fonts.js')}}"></script>
<script src="{{asset('assets/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('assets/js/buttons.print.min.js')}}"></script>
<script src="{{asset('assets/js/buttons.colVis.min.js')}}"></script>

<script>
    $(document).ready(function () {
    $.noConflict();
   // var table = $('# your selector').DataTable();
        $('#appointmentHistory').DataTable();
    });
</script>
@endsection
@endsection


   
   


   

