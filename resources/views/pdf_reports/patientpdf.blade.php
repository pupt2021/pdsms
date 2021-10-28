@extends('layouts.admin')

@section('title')
Patient Report
@endsection
@push('css')
<style type="text/css">
   .box{
    width:600px;
    margin:0 auto;
   }
  </style>
@endpush
@section('content')

 <br />
  <div class="container">
   <!--<h3 align="center">Laravel - How to Generate Dynamic PDF from HTML using DomPDF</h3><br />-->
   
   <div class="row">
    <div class="col-md-7" align="right">
     <h4>Patient Data</h4>
    </div>
    <div class="col-md-5" align="right">
     <a href="{{ url('patient-report/pdf') }}" class="btn btn-primary"><i class="fas fa-file-export"></i> Convert into PDF</a>
    </div>
   </div>
   <br />
   <div class="table-responsive">
    <table class="table table-striped table-bordered">
     <thead>
      <tr>
       <th>Patient's Name</th>
       <th>Gender</th>
      <!--<th>Birthdate</th>-->
       <th>Contact No.</th>
       <th>Email</th>
      
      </tr>
     </thead>
     <tbody>
     @foreach($patient_data as $patient)
      <tr>
       <td>{{ $patient->firstname }} {{ $patient->middlename }} {{$patient->lastname}} {{$patient->extensionname}}</td>
       <td>{{ $patient->gender }}</td>
      <!--<td>{{ $patient->birthday }}</td>-->
       <td>{{ $patient->contactnumber }}</td>
       <td>{{ $patient->email }}</td>
       
      </tr>
     @endforeach
     </tbody>
    </table>
   </div>
  </div>

@endsection



 
 
