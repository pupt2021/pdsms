@extends('layouts.admin')

@section('title')
Appointment's Today
@endsection
@section('content')
@push('css')
<link rel="stylesheet" href="{{asset('assets/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/buttons.bootstrap4.min.css')}}">
@endpush
<div class="wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

        <!--Today's Appointments-->
        <h2>Today's Appointments</h2>
        <div class="card-tools" style="float: right;">

            <a href="appointments" class="btn btn-primary"><i class="fas fa-list-ul"></i> List of Appointments</a>
          </div>
        <br />
         <br />
        <div class="card">
    
             <div class="card-body">
<table id="todayappointmenttable" class="table table-bordered table-striped table-filter">
                    <thead>
<tr>
    <th>#</th>
    <th>Patient Name</th>
    <th>Service to be rendered</th>
    <th>Date</th>
    <th>Time</th>
    <th>Status</th>
</tr>
</thead>
<tbody id="appointment_body">
     @foreach($todays_appointment as $appointment)
    
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$appointment->patient->firstname}} {{$appointment->patient->middlename}} {{$appointment->patient->lastname}}</td>
            <td>{{$appointment->service->service}}</td>
            <td>{{date('m/d/Y', strtotime($appointment->date))}}</td>
            <td>{{date('h:m A', strtotime($appointment->time))}}</td>
            
            @if($appointment->status=='Pending')
            <td><span class="badge bg-warning">{{$appointment->status}}</span></td>
            @endif
             @if($appointment->status=='Scheduled')
            <td><span class="badge bg-success">{{$appointment->status}}</span></td>
            @endif
             @if($appointment->status=='Closed')
            <td><span class="badge bg-danger">{{$appointment->status}}</span></td>
            @endif
            @if($appointment->status=='Reschedule')
            <td><span class="badge bg-info">{{$appointment->status}}</span></td>
            @endif
            
        </tr>
       
    @endforeach
</tbody>
                </table>
 </div>
              <!-- /.card-body -->
            </div>


<br />
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

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


<script src="{{asset('assets/js/moment.js')}}"></script>
<script src="{{asset('assets/js/daterangepicker.js')}}"></script>
<script>
   $(document).ready(function () {
   $.noConflict();
   // var table = $('# your selector').DataTable();
        var table = $('#todayappointmenttable').DataTable({
            'processing': true,

            //footer of table message
             "language": {
                 "infoEmpty": "No Appointments Today!",
                 "zeroRecords": "No Appointments Today, Yehey!",
            },
        });

      /* var table = $('#tomorrowsappointmenttable').DataTable({
            'processing': true,
              "language": {
                  "infoEmpty": "No Appointments for Tomorrow!",
                  "zeroRecords": "No Appointments for Tomorrow, Yehey!",
                },
        });*/
   });

</script>
@endsection

@endsection



