@extends('layouts.admin')

@section('title')
List of Services
@endsection
@push('css')
<link rel="stylesheet" href="{{asset('assets/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/buttons.bootstrap4.min.css')}}">
@endpush
@section('content')

<div class="card-tools" style="float: right;">
     <a href="list-trash-service" class="btn btn-success"><i class="fas fa-trash-restore"></i> Recycle Bin</a>

    <a href="add-service" class="btn btn-primary" ><i class="fas fa-plus-circle"></i> Add new service</a>
           
        </div>

<br />
<br />
<div class="card">
             <div class="card-body">
<table id="servicetable" class="table table-bordered table-striped">
                    <thead>
<tr>
    <th>#</th>
    <th>Service Name</th>
    <th>Description</th>
    <th>Action</th>
</tr>
</thead>
<tbody>
     @foreach($services as $service)
        <tr>
               <td>{{$service->id}}</td>
               <td>{{$service->service}}</td>
               <td>{{$service->description}}</td>
            <td>
                <a href="/edit-dental-service/{{$service->id}}">
                   <button class="btn btn-sm btn-warning"><i class="fa fa-edit"></i> Edit</button>
                </a>
               
               <button type="button" class="btn btn-sm btn-danger delete-btn" data-id="{{$service->id}}"><i class="fa fa-trash"></i> Delete </button>

               
                
            </td>
        </tr>
        @endforeach
</tbody>
                </table>
 </div>
              <!-- /.card-body -->
            </div>

<br />
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

         $('#servicetrashtable').DataTable({
            
         });

        $('#servicetable').DataTable({
            
        });
        $(document).on('click', '.delete-btn', function (e) {
            e.preventDefault();
            
            const delete_id = $(this).attr('data-id');
                                Swal.fire({
                                      title: 'Are you sure?',
                                      text: "You won't be able to revert this!",
                                      icon: 'warning',
                                      showCancelButton: true,
                                      confirmButtonColor: '#3085d6',
                                      cancelButtonColor: '#d33',
                                      confirmButtonText: 'Yes, delete it!'
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            var data = {
                                                
                                                "id": delete_id,
                                            };

                                            $.ajax({
                                                type: "GET",
                                                url: '/trash-dental-service/' + delete_id,
                                                data: data,
                                                success: function (response) {
                                                    Swal.fire({
                                                        title: 'Deleted!',
                                                        text: response.status,
                                                        icon: 'success',
                                                       })                                                         
                          
                                                        .then((result) => {
                                                            location.reload();
                                                        });
                                                }

                                            });
                                      }
                                    })
        });
            
    });

</script>


@endsection

@endsection


   
   


   

