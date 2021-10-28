@extends('layouts.admin')

@section('title')
Medicine Report
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
                <h4>Medicine Data</h4>
            </div>
            <div class="col-md-5" align="right">
                <a href="{{ url('medicine-report/pdf1') }}" class="btn btn-primary"><i class="fas fa-file-export"></i> Convert into PDF</a>
            </div>
        </div>
        <br />
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Medicine Name</th>
                        <th>Quality</th>
                        <th>Date Received</th>
                        <th>Expiration Date</th>
                        <th>Unit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($medicine_data as $medicine)
                    <tr>
                        <td>{{ $medicine->medicine_name }}</td>
                        <td>{{ $medicine->quantity }}</td>
                        <td>{{ $medicine->date_received }}</td>
                        <td>{{ $medicine->expiration_date }}</td>
                        <td>{{ $medicine->unit }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
 

@endsection



 
