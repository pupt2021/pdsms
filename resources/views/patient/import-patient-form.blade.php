@extends('layouts.admin')

@section('title')
Import Patients
@endsection
@section('css')

@endsection
@section('content')

<div class="card-tools" style="float: right;">
        <a href="all-patient" class="btn btn-primary"><i class="fas fa-list-ul"></i> List of Patients</a>         
</div>

<br />
<br />
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-header">
                    Import
                </div>
                
                <!--<div class="container">
                    
                </div>-->
               
             <div class="card-body">
                  @if(isset($errors) && $errors->any())
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $error)
                                {{$error}}
                            @endforeach
                        </div>
                    @endif

                 <form method="POST" action="{{route('patient.import')}}" enctype="multipart/form-data">
                     @csrf
                     <div class="form-group">
                         <label>Choose CSV/Excel</label>
                         <input type="file" name="file" class="form-control-file"/>
                         <span style="color:red">@error('file'){{$message}}@enderror</span>
                     </div>
                     <button type="submit" class="btn btn-primary" style="float:right;"><i class="fas fa-paper-plane"></i> Submit</button>
                 </form>
             </div>
              <!-- /.card-body -->
            </div>
        </div>
    </div>
</div>
@if(session()->has('failures'))
    <table class="table table-danger">
        <tr>
            <th>Row</th>
            <th>Attribute</th>
            <th>Errors</th>
            <th>Value</th>
        </tr>

        @foreach(session()->get('failures') as $validation)
        <tr>
            <td>{{$validation->row()}}</td>
            <td>{{$validation->attribute()}}</td>
            <td>
                <ul>
                    @foreach($validation->errors() as $e)
                        <li>{{$e}}</li>
                    @endforeach
                </ul>
            </td>
            <td>
                {{$validation->values()[$validation->attribute()]}}
            </td>
        </tr>
        @endforeach    
    </table>
@endif


 @section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

 @if(Session::has('patient_imported'))
           <script>
              swal("Great Job!", "{!! Session::get('patient_imported') !!}", "success", {
                  button: true,
              })
           </script>                    
 @endif

@if(Session::has('failures'))
           <script>
              swal("Opps!", "Someting went wrong!", "error", {
                  button: true,
              })
           </script>                    
 @endif
@endsection

@endsection


   
   


   

