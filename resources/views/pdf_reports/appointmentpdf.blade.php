@extends('layouts.admin')

@section('title')
Appointments Report
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
                <h4>Appointment Data</h4>
            </div>
            <div class="col-md-5" align="right">
                <a href="{{ url('appointment-report/pdf3') }}" class="btn btn-primary"><i class="fas fa-file-export"></i> Convert into PDF</a>
            </div>
        </div>
        <br />
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Patient Name</th>
                        <th>Service to be rendered</th>
                        <th>Date</th>
                        <!--<th>Time</th>
                        <th>Status</th>-->
                    </tr>
                </thead>
                <tbody>
                    @foreach($appointment_data as $appointment)
                    <tr>
                        <td>{{ $appointment->patient->firstname }} {{ $appointment->patient->middlename }} {{ $appointment->patient->lastname }} {{ $appointment->patient->extensionname }}</td>
                        <td>{{ $appointment->service->service }}</td>
                        <td>{{date('m/d/Y', strtotime($appointment->date))}}</td>
                        <!--<td>{{date('h:m A', strtotime($appointment->time))}}</td>-->
                        <!--<td>{{ $appointment->status }}</td>-->
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
 

@endsection


