@extends('layouts.admin')

@section('title')
Supply Trash
@endsection
@push('css')
<link rel="stylesheet" href="{{asset('assets/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/buttons.bootstrap4.min.css')}}">
@endpush
@section('content')
<!--<div class="card" style="margin-left: 20px; margin-top:20px; margin-bottom: -10px;">
         <h3 class="card-title">
                    <i class="fas fa-boxes mr-1"></i>
                    Supplies
     </h3>
    </div>-->
<div class="card-tools" style="float: right;">         
     <a href="all-supply" class="btn btn-primary"><i class="fas fa-list-ul"></i> List of Supplies</a>
</div>
<br />
<br />
<div class="card">
<div class="card-body">
<table id="supplytable" class="table table-bordered table-striped">
                    <thead>
<tr>
    <th>Supply Name</th>
    <th>Picture</th>
    <th>Quantity</th>
    <th>Unit</th>
    <th>Date Received</th>
    <th>Action</th>
</tr>
</thead>
<tbody>
     @foreach($trash_supplies as $supply)
        <tr>
            <td>{{$supply->supply_name}}</td>
            <td><img src="{{asset('images')}}/{{$supply->picture}}" style="max-width:60px;"/></td>
           <td>{{$supply->quantity}}</td>
           <td>{{$supply->unit}}</td>
           <td>{{$supply->date_received}}</td>
            <td>

                <a class="btn btn-sm btn-success restore-btn" data-id="{{$supply->id}}"><i class="fas fa-trash-restore"></i> Restore</a>

                
               <!--<button type="button" class="btn btn-sm btn-danger delete-btn" data-id="{{$supply->id}}"><i class="fa fa-trash"></i> Delete </button>href="/restore-supply/{{$supply->id}}"--> 
                
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
        $('#supplytable').DataTable();

         $(document).on('click', '.restore-btn',  function (e) {
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
                                                url: '/restore-supply/'+ restore_id,
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
                                                  'Record is safe',
                                                  'error'
                                                )
                                          }
                                    })
        });
    });
</script>
@if(Session::has('dental_supply_restored'))
           <script>
              swal("Great Job!", "{!! Session::get('dental_supply_restored') !!}", "success", {
                  button: true,
              })
           </script>   
@endif
@endsection
@endsection
