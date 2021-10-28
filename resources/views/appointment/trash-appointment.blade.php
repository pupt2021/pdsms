@extends('layouts.admin')

@section('title')
Appointments Trash
@endsection
@section('css')
  <link rel="stylesheet" href="{{asset('assets/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/buttons.bootstrap4.min.css')}}">
@endsection
@section('content')

<div class="card-tools" style="float: right;">
    <a href="appointments" class="btn btn-primary"><i class="fas fa-list-ul"></i> List of Appointments</a>     
</div>

<br />
<br />

<div class="card">
    
             <div class="card-body">
<table id="appointmenttable" class="table table-bordered table-striped table-filter">
                    <thead>
<tr>
    <th>#</th>
    <th>Patient Name</th>
    <th>Service to be rendered</th>
    <th>Date</th>
    <th>Time</th>
    <th>Status</th>
    <th>Action</th>
</tr>
</thead>
<tbody id="appointment_body">
     @foreach($trash_appointments as $appointment)
    
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
            <td>
                <a class="btn btn-sm btn-success restore-btn" data-id="{{$appointment->id}}"><i class="fas fa-trash-restore"></i> Restore</a>
                <!--<button type="button" class="btn btn-sm btn-danger delete-btn" data-id="{{$appointment->id}}"><i class="fa fa-trash"></i></button>
                    href="/restore-appointment/{{$appointment->id}}"
                    -->
            </td>
        </tr>
       
    @endforeach
</tbody>
                </table>
 </div>
              <!-- /.card-body -->
            </div>

 @section('js')
<script src="{{asset('assets/js/jquery-3.5.1.min.js')}}"></script>
<script src="{{asset('assets/js/popper.min.js')}}"></script>
<script src="{{asset('assets/js/sweetalert2.all.min.js')}}"></script>

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
        $('#appointmenttable').DataTable({
            'processing': true,
           
        });

        $(document).on('click', '.restore-btn', function (e) {
            e.preventDefault();
            const restore_id = $(this).attr('data-id');
                                Swal.fire({
                                      title: 'Are you sure?',
                                      text: "You will be restoring this record.",
                                      icon: 'question',
                                      showCancelButton: true,
                                      confirmButtonColor: 'green',
                                      cancelButtonColor: 'red',
                                      confirmButtonText: 'Yes, restore it!',
                                      reverseButtons: true,
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            var data = {
                                                "id": restore_id,
                                            };
                                                    
                                            $.ajax({
                                                type: "GET",
                                                url: '/restore-appointment/'+ restore_id,
                                                data: data,
                                                success: function (response) {
                                                    Swal.fire({
                                                        title: 'Restored!',
                                                        text: response.status,
                                                        icon: 'success',
                                                       })                                                         
                          
                                                        .then((result) => {
                                                            location.reload();
                                                        });
                                                }
                                            });
                                        }else if (result.dismiss === Swal.DismissReason.cancel) {
                                            Swal.fire(
                                                  'Cancelled',
                                                  'No action have been made.',
                                                  'error'
                                                )
                                          }
                                    })
        });
    });

    $('#appointmentModal').modal('hide');

    
</script>
@if(Session::has('appointment_restored'))
           <script>
              Swal.fire(
              'Good job!',
              '{!! Session::get('appointment_restored') !!}',
              'success'
            )
           </script>   
@endif

@endsection

@endsection


   
   


   

