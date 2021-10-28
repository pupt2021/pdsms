@extends('layouts.admin')

@section('title')
Supplies Report
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
                <h4>Supply Data</h4>
            </div>
            <div class="col-md-5" align="right">
                <a href="{{ url('supply-report/pdf2') }}" class="btn btn-primary"><i class="fas fa-file-export"></i> Convert into PDF</a>
            </div>
        </div>
        <br />
          <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Supply Name</th>
                        <th>Quantity</th>
                        <th>Unit</th>
                        <th>Date Received</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($supply_data as $supply)
                    <tr>
                        <td>{{ $supply->supply_name }}</td>
                        <td>{{ $supply->quantity }}</td>
                        <td>{{ $supply->unit }}</td>
                        <td>{{ $supply->date_received }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
 

@endsection



 





