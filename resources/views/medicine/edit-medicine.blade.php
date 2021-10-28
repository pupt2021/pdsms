@extends('layouts.admin')

@section('title')
Edit Medicine
@endsection
@section('content')
     <section>
          <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3" style="margin-left:310px;">
                <div class="card">
                    <div class="card-body">
                       
                       <form method="POST" action="{{route('medicine.update')}}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{$medicine->id}}" />
                           <label><span style="color:red">* </span>Required</label>
                            <div class="form-group">
                                <label>Medicine Name <span style="color:red">*</span></label>
                                <input type="text" name="medicine_name" value="{{$medicine->medicine_name}}" class="form-control"/>
                                <span style="color:red">@error('medicine_name'){{$message}}@enderror</span>
                            </div>
                            <!--<div class="form-group">
                                <label>Quantity <span style="color:red">*</span></label>
                                <input type="number" name="quantity" value="{{$medicine->quantity}}" class="form-control"/>
                                 <span style="color:red">@error('quantity'){{$message}}@enderror</span>
                            </div>-->
                            <div class="form-group">
                                <label>Unit <span style="color:red">*</span></label>
                                <input type="text" name="unit" value="{{$medicine->unit}}" class="form-control"/>
                                <span style="color:red">@error('unit'){{$message}}@enderror</span>
                            </div>
                            <div class="form-group">
                                <label>Danger Level <span style="color:red">*</span></label>
                                <input type="number" name="danger_level" value="{{$medicine->danger_level}}" class="form-control"/>
                                <span style="color:red">@error('danger_level'){{$message}}@enderror</span>
                            </div>
                            <div class="form-group">
                                <label>Date Received <span style="color:red">*</span></label>
                                <input type="date" name="date_received" value="{{$medicine->date_received}}" class="form-control"/>
                                <span style="color:red">@error('date_received'){{$message}}@enderror</span>
                            </div>
                            <div class="form-group">
                                <label>Expiration Date <span style="color:red">*</span></label>
                                <input type="date" name="expiration_date" value="{{$medicine->expiration_date}}" class="form-control"/>
                                <span style="color:red">@error('expiration_date'){{$message}}@enderror</span>
                            </div>
                            <button type="submit" class="btn btn-primary" style="float:right;"><i class="fas fa-save"></i> Save</button>
                            <a class="btn btn-secondary" href="/all-medicine" style="float:right; margin-right: 10px;"><i class="fas fa-reply"></i> Back</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</section>
@push('scripts')
<script src="{{asset('assets/js/sweetalert2.all.min.js')}}"></script>
@if(Session::has('medicine_updated'))
           <script>
              Swal.fire(
              'Good job!',
              '{!! Session::get('medicine_updated') !!}',
              'success'
            )
           </script>              
@endif
@endpush
@endsection
  
