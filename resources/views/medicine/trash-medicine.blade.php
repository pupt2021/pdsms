@extends('layouts.admin')

@section('title')
List of Medicines
@endsection
@section('css')
<link rel="stylesheet" href="{{asset('assets/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/buttons.bootstrap4.min.css')}}">
@endsection
@section('content')

<div class="card-tools" style="float: right;">
            <!--<a href="/add-supply" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Add new supply</a>-->
         
 <a href="all-medicine" class="btn btn-primary"><i class="fas fa-list-ul"></i> List of Medicines</a>       
</div>

<br />
<br />
<div class="card">
             <div class="card-body">
<table id="medicinetable" class="table table-bordered table-striped">
                    <thead>
<tr>
    <th>Medicine Name</th>
    <th>Quantity</th>
    <th>Unit</th>
    <th>Date Received</th>
    <th>Expiration Date</th>
    <th>Action</th>
</tr>
</thead>
<tbody>
     @foreach($trash_medicines as $medicine)
        <tr>
               <td>{{$medicine->medicine_name}}</td>
               <td>{{$medicine->quantity}}</td>
               <td>{{$medicine->unit}}</td>
               <td>{{$medicine->date_received}}</td>
               <td>{{$medicine->expiration_date}}</td>
            <td>
                <a class="btn btn-sm btn-success restore-btn" data-id="{{$medicine->id}}"><i class="fas fa-trash-restore"></i> Restore</a>

                <!--<button type="button" class="btn btn-sm btn-danger delete-btn" data-id="{{$medicine->id}}"><i class="fa fa-trash"></i> Delete </button>href="/restore-medicine/{{$medicine->id}}"--> 
                
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
        $('#medicinetable').DataTable();

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
                                                url: '/restore-medicine/'+ restore_id,
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
@if(Session::has('medicine_restored'))
           <script>
              swal("Great Job!", "{!! Session::get('medicine_restored') !!}", "success", {
                  button: true,
              })
           </script>   
@endif

@endsection

@endsection


   
   


   

