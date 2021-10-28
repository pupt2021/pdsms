@extends('layouts.admin')

@section('title')
Patient Trash
@endsection
@section('css')
<link rel="stylesheet" href="{{asset('assets/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/buttons.bootstrap4.min.css')}}">
@endsection
@section('content')

<div class="card-tools" style="float: right;">
         <a href="all-patient" class="btn btn-primary"><i class="fas fa-list-ul"></i> List of Patients</a>         
</div>

<br />
<br />
<div class="card">
    
             <div class="card-body">
<table id="patienttable" class="table table-bordered table-striped">
                    <thead>
<tr>
    <th>#</th>
    <th>Patient Full Name</th>
    <!--<th>Picture</th>-->
    <th>Gender</th>
    <!--<th>Birthday</th>-->
    <th>Action</th>
</tr>
</thead>
<tbody>
     @foreach($trash_patients as $patient)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$patient->lastname}}{{","}} {{$patient->firstname}} {{$patient->middlename}} {{$patient->extensionname}}</td>
            <!--<td> <img src="{{asset('patient_pics')}}/{{$patient->picture}}"  style="max-width:100px; max-height:100px;"></td>-->
            @if($patient->gender=='Male')
            <td><span class="badge bg-primary">{{$patient->gender}}</span></td>
            @endif
             @if($patient->gender=='Female')
            <td><span class="badge bg-danger">{{$patient->gender}}</span></td>
            @endif
            <!--<td>{{$patient->birthday}}</td>-->
            <td>
            
                 <a class="btn btn-sm btn-success restore-btn" data-id="{{$patient->id}}"><i class="fas fa-trash-restore"></i> Restore</a>

                 <!--<button type="button" class="btn btn-sm btn-danger delete-btn" data-id="{{$patient->id}}"><i class="fa fa-trash"></i> Delete </button>href="/restore-patient/{{$patient->id}}"-->                
                
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
        $('#patienttable').DataTable();
    });

   // $('#patientModal').modal('hide');

    $(document).ready(function() {
	    $('.detail-btn').click(function(){
		    const id = $(this).attr('data-id');
            $.ajax({
                url: 'patient-detail/' + id,
                type: 'GET',
                data: {
                    "id": id
                },
                success: function (data) {
                    console.log(data);
                    //$('#patient-fullname').html(data.lastname+", "+data.firstname+" "+data.middlename);
                    //$('#patient-gender').html(data.gender);
                    //$('#patient-birthday').html(data.birthday);
                    $('#patient-email').html(data.email);
                    $('#patient-cellnumber').html(data.contactnumber);
                    $('#patient-address').html(data.streetnumber + " " + data.streetname + ", " + data.brgy + " " + data.district + " " + data.city + " City");
                    //$('#patient-pic').html(data.picture);
                   
                }
            })
        });


        $(document).on('click', '.restore-btn', function (e) {
            e.preventDefault();
                    const restore_id = $(this).attr('data-id');
                                Swal.fire({
                                      title: 'Are you sure?',
                                      text: "You will be restoring this record.",
                                      icon: 'warning',
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
                                                url: '/restore-patient/'+ restore_id,
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
                                                  'Record is safe.',
                                                  'error'
                                                )
                                          }
                                    })
        });

    });
</script>
@if(Session::has('patient_restored'))
           <script>
              swal("Great Job!", "{!! Session::get('patient_restored') !!}", "success", {
                  button: true,
              })
           </script>   
@endif

@endsection

@endsection
