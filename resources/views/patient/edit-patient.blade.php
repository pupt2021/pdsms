@extends('layouts.admin')

@section('title')
Edit Patient
@endsection
@push('css')
 <link rel="stylesheet" href="{{asset('assets/css/intlTelInput.css')}}">
@endpush
@section('content')
<div class="card-tools" style="float: right;">
<a href="/all-patient" class="btn btn-primary" ><i class="fas fa-list-ul"></i> List of Patients</a>
<a href="/patient-details/{{$patient->id}}" class="btn btn btn-primary"><i class="fa fa-eye"></i> View Patient Details</a>
</div>
<br />
<br />
<div class="page-body">
           <div class="row">
             <div class="col-sm-12">
               <div class="card">
                  <div class="card-header">
                      <h5>Basic Information</h5>
                       
                  </div>
                    <div class="container">
                <div class="card-block">
                     <form method="POST" action="{{route('patient.update')}}" enctype="multipart/form-data">
                          @csrf
                         <input type="hidden" name="id" value="{{$patient->id}}" />
                         <br>
                         <label><span style="color:red">* </span>Required</label>
       
                        <div class="form-group row">
                            <div class="form-group col-md-3">
                                <label>First Name <span style="color:red"> *</span></label>
                                <input type="text" name="firstname" class="form-control" value="{{$patient->firstname}}" placeholder="Enter First Name"/>
                                <span style="color:red">@error('firstname'){{$message}}@enderror</span>
                            </div>
                            <div class="form-group col-md-3">
                                <label>Middle Name</label>
                                <input type="text" name="middlename" class="form-control" value="{{$patient->middlename}}" placeholder="Enter Middle Name"/>
                            </div>
                            <div class="form-group col-md-3">
                                <label>Last Name <span style="color:red"> *</span></label>
                                <input type="text" name="lastname" class="form-control" value="{{$patient->lastname}}" placeholder="Enter Last Name"/>
                                <span style="color:red">@error('lastname'){{$message}}@enderror</span>
                            </div>

                           <div class="form-group col-md-3">
                                <label>Extension Name</label>
                                <input type="text" name="extensionname" class="form-control" value="{{$patient->extensionname}}" placeholder="Eg. (Jr., Sr., III)"/>
                            </div>
                        </div>

                        <div class="form-group row">
                           <div class="form-group col-md-3">
                                <label>Choose Patient Image <span style="color:red"></span></label>
                                <input type="file" name="picture" class="form-control-file" onchange="previewFile(this)" />
                                <img id="previewImg" class="img-thumbnail" alt="profile image" src="{{asset('patient_pics')}}/{{$patient->picture}}" style="max-width:130px; margin-top:20px;"/>
                                <br>
                                <span style="color:red">@error('picture'){{$message}}@enderror</span>
                            </div>
                            <div class="form-group col-md-3">
                                <label>Gender <span style="color:red"> *</span></label>
                                <select name="gender"  class="form-control">
                                    <option value="Male" {{$patient->gender=="Male" ? 'selected' : ''}}>Male</option>
                                    <option value="Female" {{$patient->gender=="Female" ? 'selected' : ''}}>Female</option>
                                </select>
                                <span style="color:red">@error('gender'){{$message}}@enderror</span>
                            </div>
                            <div class="form-group col-md-3">
                                <label>Patient Category<span style="color:red"> *</span></label>
                                <select name="patient_category"  class="form-control">
                                    <option value="Student" {{$patient->patient_category=="Student" ? 'selected' : ''}}>Student</option>
                                    <option value="Administrator" {{$patient->patient_category=="Administrator" ? 'selected' : ''}}>Adminstrator</option>
                                    <option value="Faculty" {{$patient->patient_category=="Faculty" ? 'selected' : ''}}>Faculty</option>
                                    <option value="Dependent" {{$patient->patient_category=="Dependent" ? 'selected' : ''}}>Dependent</option>
                                </select>
                                <span style="color:red">@error('patient_category'){{$message}}@enderror</span>
                            </div>
                            <div class="form-group col-md-3">
                                <label>Group Classification<span style="color:red"> *</span></label>
                                <select name="group_class"  class="form-control">
                                    <option value="N/A" {{$patient->group_class=="N/A" ? 'selected' : ''}}>N/A</option>
                                    <option value="Senior Citizen" {{$patient->group_class=="Senior Citizen" ? 'selected' : ''}}>Senior Citizen</option>
                                    <option value="PWD" {{$patient->group_class=="PWD" ? 'selected' : ''}}>PWD</option>
                                </select>
                                <span style="color:red">@error('group_class'){{$message}}@enderror</span>
                            </div>
                            
                        </div>

                        <div class="form-group row">
                            <div class="form-group col-md-4">
                                <label>Birthday <span style="color:red"> *</span></label>
                                <input type="date" name="birthday" class="form-control" value="{{$patient->birthday}}" placeholder="Enter Birthday" disabled/>
                                <span style="color:red">@error('birthday'){{$message}}@enderror</span>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Email <span style="color:red"> *</span></label>
                                <input type="email" name="email" class="form-control" value="{{$patient->email}}" placeholder="Enter email"/>
                                <span style="color:red">@error('email'){{$message}}@enderror</span>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Phone Number <span style="color:red">* </span></label>
                                <input type="text" id="phone" name="contactnumber" class="form-control" value="{{$patient->contactnumber}}" placeholder="Enter phone number"/>
                                <span style="color:red">@error('contactnumber'){{$message}}@enderror</span>
                            </div>
                        </div>

                        <div class="form-group row">
                             <div class="form-group col-md-2">
                                <label>Street Number <span style="color:red">* </span></label>
                                <input type="text" name="streetnumber" class="form-control" value="{{$patient->streetnumber}}" placeholder="Enter street number"/>
                                <span style="color:red">@error('streetnumber'){{$message}}@enderror</span>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Street Name <span style="color:red">* </span></label>
                                <input type="text" name="streetname" class="form-control" value="{{$patient->streetname}}" placeholder="Enter street name"/>
                                <span style="color:red">@error('streetname'){{$message}}@enderror</span>
                            </div>
                            <div class="form-group col-md-2">
                                <label>Barangay <span style="color:red">* </span></label>
                                <input type="text" name="brgy" class="form-control" value="{{$patient->brgy}}" placeholder="Enter barangay"/>
                                <span style="color:red">@error('brgy'){{$message}}@enderror</span>
                            </div>
                            <div class="form-group col-md-2">
                                <label>District <span style="color:red">* </span></label>
                                <input type="text" name="district" class="form-control" value="{{$patient->district}}" placeholder="Enter district"/>
                                <span style="color:red">@error('district'){{$message}}@enderror</span>
                            </div>
                            <div class="form-group col-md-2">
                                <label>City <span style="color:red">* </span></label>
                                <input type="text" name="city" class="form-control" value="{{$patient->city}}" placeholder="Enter city"/>
                                <span style="color:red">@error('city'){{$message}}@enderror</span>
                            </div>
                        </div>

                        <div class="card-header">
                      <h5>Medical History</h5>
                  </div>
                         <br />
                          <div class="card-block">
                   
                         <div class="form-group row">
                                <div class="col-md">
                                    <h5>Do patient have the following?</h5>
                                </div>
                            </div>

                              <div class="form-check" style="margin-top:-10px;">
                                    <input type="checkbox" class="form-check-input" id="checkAll" {{$collection->contains("High Blood") && $collection->contains("Low Blood") && $collection->contains("Heart Attack") && $collection->contains("Stroke") && $collection->contains("Respiratory Disease") && $collection->contains("Diabetes") && $collection->contains("Heart Disease") && $collection->contains("Infection Disease") && $collection->contains("Asthma") && $collection->contains("Cancer") && $collection->contains("Kidney Disease") && $collection->contains("Thyroid Problems") && $collection->contains("Ulcer") && $collection->contains("Blood Disease") ? 'checked' : ''}}>
                                    <label class="form-check-label"><b>Select/Deselect All</b></label>
                                  </div>
                        <div class="form-group row" style="margin-top:10px;">
                            <div class="form-group col-md-3">
                                
                                <div class="form-check">
                                    
                                    <input type="checkbox" class="form-check-input checkitem high-blood" id="high_blood" name="med_history[]" value="High Blood" {{$collection->contains("High Blood") ? 'checked' : ''}}/>
                                     
                          
                                    <label class="form-check-label" for="high_blood">High Blood</label>
                                  </div>
                            </div>
                            <div class="form-group col-md-3">
                                 <div class="form-check">
                                    <input type="checkbox" class="form-check-input checkitem" id="low_blood" name="med_history[]" value="Low Blood" {{$collection->contains("Low Blood") ? 'checked' : ''}}/>
                                    <label class="form-check-label" for="low_blood">Low Blood</label>
                                  </div>
                            </div>
                            <div class="form-group col-md-3">
                                  <div class="form-check">
                                    <input type="checkbox" class="form-check-input checkitem" id="heart_attack" name="med_history[]" value="Heart Attack" {{$collection->contains("Heart Attack") ? 'checked' : ''}}>
                                    <label class="form-check-label" for="heart_attack">Heart Attack</label>
                                  </div>
                            </div>

                           <div class="form-group col-md-3">
                                 <div class="form-check">
                                    <input type="checkbox" class="form-check-input checkitem" id="stroke" name="med_history[]" value="Stroke" {{$collection->contains("Stroke") ? 'checked' : ''}}>
                                    <label class="form-check-label" for="stroke">Stroke</label>
                                  </div>
                           </div>
                        </div>

                        <div class="form-group row" style="margin-top:-30px;">
                            <div class="form-group col-md-3">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input checkitem" id="respiratory_disease" name="med_history[]" value="Respiratory Disease" {{$collection->contains("Respiratory Disease") ? 'checked' : ''}}>
                                    <label class="form-check-label" for="respiratory_disease">Respiratory Disease</label>
                                  </div>
                            </div>
                            <div class="form-group col-md-3">
                                 <div class="form-check">
                                    <input type="checkbox" class="form-check-input checkitem" id="diabetes" name="med_history[]" value="Diabetes" {{$collection->contains("Diabetes") ? 'checked' : ''}}>
                                    <label class="form-check-label" for="diabetes">Diabetes</label>
                                  </div>
                            </div>
                            <div class="form-group col-md-3">
                                  <div class="form-check">
                                    <input type="checkbox" class="form-check-input checkitem" id="heart_disease" name="med_history[]" value="Heart Disease" {{$collection->contains("Heart Disease") ? 'checked' : ''}}>
                                    <label class="form-check-label" for="heart_disease">Heart Disease</label>
                                  </div>
                            </div>

                           <div class="form-group col-md-3">
                                 <div class="form-check">
                                    <input type="checkbox" class="form-check-input checkitem" id="infection_disease" name="med_history[]" value="Infection Disease" {{$collection->contains("Infection Disease") ? 'checked' : ''}}>
                                    <label class="form-check-label" for="infection_disease">Infection Disease</label>
                                  </div>
                           </div>
                        </div>

                         <div class="form-group row" style="margin-top:-30px;">
                            <div class="form-group col-md-3">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input checkitem" id="asthma" name="med_history[]" value="Asthma" {{$collection->contains("Asthma") ? 'checked' : ''}}> 
                                    <label class="form-check-label" for="asthma">Asthma</label>
                                  </div>
                            </div>
                            <div class="form-group col-md-3">
                                 <div class="form-check">
                                    <input type="checkbox" class="form-check-input checkitem" id="cancer" name="med_history[]" value="Cancer" {{$collection->contains("Cancer") ? 'checked' : ''}}>
                                    <label class="form-check-label" for="cancer">Cancer</label>
                                  </div>
                            </div>
                            <div class="form-group col-md-3">
                                  <div class="form-check">
                                    <input type="checkbox" class="form-check-input checkitem" id="kidney_disease" name="med_history[]" value="Kidney Disease" {{$collection->contains("Kidney Disease") ? 'checked' : ''}}>
                                    <label class="form-check-label" for="kidney_disease">Kidney Disease</label>
                                  </div>
                            </div>

                           <div class="form-group col-md-3">
                                 <div class="form-check">
                                    <input type="checkbox" class="form-check-input checkitem" id="thyroid_problems" name="med_history[]" value="Thyroid Problems" {{$collection->contains("Thyroid Problems") ? 'checked' : ''}}>
                                    <label class="form-check-label" for="thyroid_problems">Thyroid Problems</label>
                                  </div>
                           </div>
                        </div>

                         <div class="form-group row" style="margin-top:-30px;">
                            <div class="form-group col-md-3">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input checkitem" id="ulcer" name="med_history[]" value="Ulcer" {{$collection->contains("Ulcer") ? 'checked' : ''}}>
                                    <label class="form-check-label" for="ulcer">Ulcer</label>
                                  </div>
                            </div>
                            <div class="form-group col-md-3">
                                 <div class="form-check">
                                    <input type="checkbox" class="form-check-input checkitem" id="blood_disease" name="med_history[]" value="Blood Disease" {{$collection->contains("Blood Disease") ? 'checked' : ''}}>
                                    <label class="form-check-label" for="blood_disease">Blood Disease</label>
                                  </div>
                            </div>
                          </div>

                        
                        <div class="form-group row">
                            <div class="form-group col-md-6">
                                <label>Allergies</label>
                                <input type="text" name="allergies" class="form-control" value="{{old('allergies')}}" placeholder="Allergies"/>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Medication</label>
                                <input type="text" name="medication" class="form-control" value="{{old('medication')}}" placeholder="Medication"/>
                                
                            </div>
                        </div>
                         
                          <div class="form-group row">
                            
                            <div class="form-group col-md-6">
                                <label>Others</label>
                                <input type="text" name="others" class="form-control" value="{{old('others')}}" placeholder="Others"/>
                            </div>
                              <div class="form-group col-md-6">
                                <label>Dentist Remarks</label>
                                <input type="text" name="remarks" class="form-control" value="{{old('remarks')}}" placeholder="Others"/>
                            </div>
                        </div>
                       

                    
                </div>


                        <div class="form-group row">
                            <div class="col-md-12">
                                <button type="submit" name="btn_submit" class="btn btn-primary" style="float:right;" ><i class="fas fa-save"></i> Save</button>
                                <a class="btn btn-secondary" href="/all-patient" style="float:right; margin-right: 10px;"><i class="fas fa-reply"></i> Back</a>
                            </div>
                        </div>

                     </form>
                </div>
                    </div>

               </div>
             </div>
           </div>  
         </div>
       


@push('scripts')
<script src="{{asset('assets/js/jquery-3.5.1.min.js')}}"></script>
<script src="{{asset('assets/js/sweetalert2.all.min.js')}}"></script>
<script src="{{asset('assets/js/intlTelInput-jquery.min.js')}}"></script>
<script>
        function previewFile(input){
            var file=$("input[type=file]").get(0).files[0];
            if (file)
            {
                var reader = new FileReader();
                reader.onload = function() {
                    $('#previewImg').attr("src",reader.result);
                }
                reader.readAsDataURL(file);
            }
        }

    $(document).ready(function () {
         $.noConflict();
        $("#phone").intlTelInput({
          // options here
            initialCountry: "ph",
            autoPlaceholder: "off",
           // hiddenInput:"full",

        });
      
    });

    /*$(document).ready(function(){
           // Check or Uncheck All checkboxes
           $("#checkAll").change(function(){
             var checked = $(this).is(':checked');
             if(checked){
               $(".checkitem").each(function(){
                 $(this).prop("checked",true);
               });
             }else{
               $(".checkitem").each(function(){
                 $(this).prop("checked",false);
               });
             }
           });
 
          // Changing state of CheckAll checkbox 
         $(".checkitem").click(function(){
 
            if($(".checkitem").length == $(".checkitem:checked").length) {
              $("#checkAll").prop("checked", true);
            } else {
              $("#checkAll").prop("checked", false);
            }

          });

    });*/

               /* $(document).ready(function() {
                    $("#checkAll").change(function () {
                        if (this.checked) {
                            $(".checkitem").each(function () {
                                this.checked = true;
                            });
                        } else {
                            $(".checkitem").each(function () {
                                this.checked = false;
                            });
                        }

                        $(".checkitem").each(function)(){

                        });
                });

                $(".checkitem").click(function () {
                    if ($(this).is(":checked")) {
                        var isAllChecked = 0;

                        $(".checkitem").each(function() {
                            if (!this.checked)
                                isAllChecked = 1;
                        });

                        if (isAllChecked == 0) {
                            $("#checkAll").prop("checked", true);
                        }     
                    }
                    else {
                        $("#checkAll").prop("checked", false);
                    }
                });
            });*/

    $(document).ready(function() {
                //select all checkboxes
            $("#checkAll").change(function(){  //"select all" change 
	            var status = this.checked; // "select all" checked status
	            $('.checkitem').each(function(){ //iterate all listed checkbox items
		            this.checked = status; //change ".checkbox" checked status
	            });
            });

            $('.checkitem').change(function(){ //".checkbox" change 
	            //uncheck "select all", if one of the listed checkbox item is unchecked
	            if(this.checked == false){ //if this item is unchecked
		            $("#checkAll")[0].checked = false; //change "select all" checked status to false
	            }
	
	            //check "select all" if all checkbox items are checked
	            if ($('.checkitem:checked').length == $('.checkitem').length ){ 
		            $("#checkAll")[0].checked = true; //change "select all" checked status to true
	            }
            });
        });
    
    </script>
 @if(Session::has('patient_updated'))
           <script>
              Swal.fire(
              'Good job!',
              '{!! Session::get('patient_updated') !!}',
              'success'
            )
           </script>                    
 @endif
@endpush  
    
@endsection
