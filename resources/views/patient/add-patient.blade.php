@extends('layouts.admin')

@section('title')
Add Patient
@endsection
@push('css')
 <link rel="stylesheet" href="{{asset('assets/css/colored-toasts.css')}}"/>
 <link rel="stylesheet" href="{{asset('assets/css/intlTelInput.css')}}">
@endpush
@section('content')

   <div class="page-body">
           <div class="row">
             <div class="col-sm-12">
               <div class="card">
                  <div class="card-header">
                      <h5>Basic Information</h5>
                  </div>
                    <div class="container">
                <div class="card-block">
                     <form method="POST" action="{{route('patient.store')}}" enctype="multipart/form-data">
                          @csrf
                         <br>
                         <label><span style="color:red">* </span>Required</label>
       
                        <div class="form-group row">
                            <div class="form-group col-md-3">
                                <label>First Name <span style="color:red">* </span></label>
                                <input type="text" name="firstname" class="form-control" value="{{old('firstname')}}" placeholder="Enter First Name"/>
                                <span style="color:red">@error('firstname'){{$message}}@enderror</span>
                            </div>
                            <div class="form-group col-md-3">
                                <label>Middle Name</label>
                                <input type="text" name="middlename" class="form-control" value="{{old('middlename')}}" placeholder="Enter Middle Name"/>
                                <span style="color:red">@error('middlename'){{$message}}@enderror</span>

                            </div>
                            <div class="form-group col-md-3">
                                <label>Last Name <span style="color:red">* </span></label>
                                <input type="text" name="lastname" class="form-control" value="{{old('lastname')}}" placeholder="Enter Last Name"/>
                                <span style="color:red">@error('lastname'){{$message}}@enderror</span>
                            </div>

                           <div class="form-group col-md-3">
                                <label>Extension Name</label>
                                <input type="text" name="extensionname" class="form-control" value="{{old('extensionname')}}" placeholder="Eg. (Jr., Sr., III)"/>
                                <span style="color:red">@error('extensionname'){{$message}}@enderror</span>
                           </div>
                        </div>

                        <div class="form-group row">
                           <div class="form-group col-md-3">
                                <label>Choose Patient Image <span style="color:red"> </span></label>
                                <input type="file" name="picture" class="form-control-file" onchange="previewFile(this)" />
                                <img id="previewImg" class="img-thumbnail" alt="profile image" style="max-width:130px; margin-top:20px;" value="{{old('picture')}}"/>
                                <br>
                                <span style="color:red">@error('picture'){{$message}}@enderror</span>
                            </div>
                            <div class="form-group col-md-3">
                                <label>Gender <span style="color:red">*</span></label>
                                <select name="gender"  class="form-control">
                                   <option value="">--Select One--</option>
                                   <option value="Male" @if (old('gender') == "Male") {{ 'selected' }} @endif>Male</option>
                                   <option value="Female" @if (old('gender') == "Female") {{ 'selected' }} @endif>Female</option>
                                </select>
                                <span style="color:red">@error('gender'){{$message}}@enderror</span>
                            </div>
                             <div class="form-group col-md-3">
                                <label>Patient Category<span style="color:red"> *</span></label>
                                <select name="patient_category"  class="form-control">
                                    <option value="">--Select One--</option>
                                    <option value="Student" @if (old('patient_category') == "Student") {{ 'selected' }} @endif>Student</option>
                                    <option value="Administrator" @if (old('patient_category') == "Administrator") {{ 'selected' }} @endif>Adminstrator</option>
                                    <option value="Faculty" @if (old('patient_category') == "Faculty") {{ 'selected' }} @endif>Faculty</option>
                                    <option value="Dependent" @if (old('patient_category') == "Dependent") {{ 'selected' }} @endif>Dependent</option>
                                </select>
                                <span style="color:red">@error('patient_category'){{$message}}@enderror</span>
                            </div>
                             <div class="form-group col-md-3">
                                <label>Group Classification<span style="color:red"> *</span></label>
                                <select name="group_class"  class="form-control">
                                   <option value="">--Select One--</option>
                                   <option value="N/A" @if (old('group_class') == "N/A") {{ 'selected' }} @endif>N/A</option>
                                   <option value="Senior Citizen" @if (old('group_class') == "Female") {{ 'selected' }} @endif>Senior Citizen</option>
                                   <option value="PWD" @if (old('group_class') == "PWD") {{ 'selected' }} @endif>PWD</option>
                                </select>
                                <span style="color:red">@error('group_class'){{$message}}@enderror</span>
                             </div>
                        </div>

                        <div class="form-group row">
                             <div class="form-group col-md-4">
                                <label>Birthday <span style="color:red">* </span></label>
                                <input type="date" name="birthday" id="birthDate" class="form-control" value="{{old('birthday')}}" placeholder="Enter Birthday"/>
                                <span style="color:red">@error('birthday'){{$message}}@enderror</span>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Email <span style="color:red">* </span></label>
                                <input type="email" name="email" class="form-control" value="{{old('email')}}" placeholder="Enter email"/>
                                <span style="color:red">@error('email'){{$message}}@enderror</span>
                            </div>
                            <div class="form-group col-md-4" >
                                <label >Phone Number <span style="color:red">* </span></label>
                                <input type="number" id="phone" name="contactnumber" class="p form-control" value="{{old('contactnumber')}}"/>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <span style="color:red">@error('contactnumber'){{$message}}@enderror</span>
                            </div>
                        </div>

                        <div class="form-group row">
                             <div class="form-group col-md-2">
                                <label>Street Number <span style="color:red">* </span></label>
                                <input type="text" name="streetnumber" class="form-control" value="{{old('streetnumber')}}" placeholder="Enter street number"/>
                                <span style="color:red">@error('streetnumber'){{$message}}@enderror</span>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Street Name <span style="color:red">* </span></label>
                                <input type="text" name="streetname" class="form-control" value="{{old('streetname')}}" placeholder="Enter street name"/>
                                <span style="color:red">@error('streetname'){{$message}}@enderror</span>
                            </div>
                            <div class="form-group col-md-2">
                                <label>Barangay <span style="color:red">* </span></label>
                                <input type="text" name="brgy" class="form-control" value="{{old('brgy')}}" placeholder="Enter barangay"/>
                                <span style="color:red">@error('brgy'){{$message}}@enderror</span>
                            </div>
                            <div class="form-group col-md-2">
                                <label>District <span style="color:red">* </span></label>
                                <input type="text" name="district" class="form-control" value="{{old('district')}}"placeholder="Enter district"/>
                                <span style="color:red">@error('district'){{$message}}@enderror</span>
                            </div>
                            <div class="form-group col-md-2">
                                <label>City <span style="color:red">* </span></label>
                                <input type="text" name="city" class="form-control" value="{{old('city')}}"placeholder="Enter city"/>
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
                                    <input type="checkbox" class="form-check-input" id="checkAll">
                                    <label class="form-check-label"><b>Select/Deselect All</b></label>
                                  </div>
                        <div class="form-group row" style="margin-top:10px;">
                            <div class="form-group col-md-3">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input checkitem" id="high_blood" name="med_history[]" value="High Blood" @if(in_array('High Blood', old('med_history',[]))) checked @endif>
                                    <label class="form-check-label" for="high_blood">High Blood</label>
                                  </div>
                            </div>
                            <div class="form-group col-md-3">
                                 <div class="form-check">
                                    <input type="checkbox" class="form-check-input checkitem" id="low_blood" name="med_history[]" value="Low Blood" @if(in_array('Low Blood', old('med_history',[]))) checked @endif>
                                    <label class="form-check-label" for="low_blood">Low Blood</label>
                                  </div>
                            </div>
                            <div class="form-group col-md-3">
                                  <div class="form-check">
                                    <input type="checkbox" class="form-check-input checkitem" id="heart_attack" name="med_history[]" value="Heart Attack" @if(in_array('Heart Attack', old('med_history',[]))) checked @endif>
                                    <label class="form-check-label" for="heart_attack">Heart Attack</label>
                                  </div>
                            </div>

                           <div class="form-group col-md-3">
                                 <div class="form-check">
                                    <input type="checkbox" class="form-check-input checkitem" id="stroke" name="med_history[]" value="Stroke" @if(in_array('Stroke', old('med_history',[]))) checked @endif>
                                    <label class="form-check-label" for="stroke">Stroke</label>
                                  </div>
                           </div>
                        </div>

                        <div class="form-group row" style="margin-top:-30px;">
                            <div class="form-group col-md-3">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input checkitem" id="respiratory_disease" name="med_history[]" value="Respiratory Disease" @if(in_array('Respiratory Disease', old('med_history',[]))) checked @endif>
                                    <label class="form-check-label" for="respiratory_disease">Respiratory Disease</label>
                                  </div>
                            </div>
                            <div class="form-group col-md-3">
                                 <div class="form-check">
                                    <input type="checkbox" class="form-check-input checkitem" id="diabetes" name="med_history[]" value="Diabetes" @if(in_array('Diabetes', old('med_history',[]))) checked @endif>
                                    <label class="form-check-label" for="diabetes">Diabetes</label>
                                  </div>
                            </div>
                            <div class="form-group col-md-3">
                                  <div class="form-check">
                                    <input type="checkbox" class="form-check-input checkitem" id="heart_disease" name="med_history[]" value="Heart Disease" @if(in_array('Heart Disease', old('med_history',[]))) checked @endif>
                                    <label class="form-check-label" for="heart_disease">Heart Disease</label>
                                  </div>
                            </div>

                           <div class="form-group col-md-3">
                                 <div class="form-check">
                                    <input type="checkbox" class="form-check-input checkitem" id="infection_disease" name="med_history[]" value="Infection Disease" @if(in_array('Infection Disease', old('med_history',[]))) checked @endif>
                                    <label class="form-check-label" for="infection_disease">Infection Disease</label>
                                  </div>
                           </div>
                        </div>

                         <div class="form-group row" style="margin-top:-30px;">
                            <div class="form-group col-md-3">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input checkitem" id="asthma" name="med_history[]" value="Asthma" @if(in_array('Asthma', old('med_history',[]))) checked @endif> 
                                    <label class="form-check-label" for="asthma">Asthma</label>
                                  </div>
                            </div>
                            <div class="form-group col-md-3">
                                 <div class="form-check">
                                    <input type="checkbox" class="form-check-input checkitem" id="cancer" name="med_history[]" value="Cancer" @if(in_array('Cancer', old('med_history',[]))) checked @endif>
                                    <label class="form-check-label" for="cancer">Cancer</label>
                                  </div>
                            </div>
                            <div class="form-group col-md-3">
                                  <div class="form-check">
                                    <input type="checkbox" class="form-check-input checkitem" id="kidney_disease" name="med_history[]" value="Kidney Disease" @if(in_array('Kidney Disease', old('med_history',[]))) checked @endif>
                                    <label class="form-check-label" for="kidney_disease">Kidney Disease</label>
                                  </div>
                            </div>

                           <div class="form-group col-md-3">
                                 <div class="form-check">
                                    <input type="checkbox" class="form-check-input checkitem" id="thyroid_problems" name="med_history[]" value="Thyroid Problems" @if(in_array('Thyroid Problems', old('med_history',[]))) checked @endif>
                                    <label class="form-check-label" for="thyroid_problems">Thyroid Problems</label>
                                  </div>
                           </div>
                        </div>

                         <div class="form-group row" style="margin-top:-30px;">
                            <div class="form-group col-md-3">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input checkitem" id="ulcer" name="med_history[]" value="Ulcer" @if(in_array('Ulcer', old('med_history',[]))) checked @endif>
                                    <label class="form-check-label" for="exampleCheck1">Ulcer</label>
                                  </div>
                            </div>
                            <div class="form-group col-md-3">
                                 <div class="form-check">
                                    <input type="checkbox" class="form-check-input checkitem" id="blood_disease" name="med_history[]" value="Blood Disease" @if(in_array('Blood Disease', old('med_history',[]))) checked @endif>
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
                        </div>
                       

                    
                </div>



                        <div class="form-group row">
                            <div class="col-md-12">
                                <button type="submit" name="btn_submit" class="btn btn-primary" style="float:right;"><i class="fas fa-paper-plane"></i> Submit</button>
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
<script src="{{asset('assets/js/jquery.mask.min.js')}}"></script>
<script src="{{asset('assets/js/intlTelInput-jquery.min.js')}}"></script>
<script src="{{asset('assets/js/utils.js')}}"></script>
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

            $(document).ready(function(){
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
        });


        $(function(){
            var dtToday = new Date();
    
            var month = dtToday.getMonth() + 1;
            var day = dtToday.getDate();
            var year = dtToday.getFullYear() - 15;
            if(month < 10)
                month = '0' + month.toString();
            if(day < 10)
                day = '0' + day.toString();
    
            var maxDate = year + '-' + month + '-' + day;
            //alert(maxDate);
            $('#birthDate').attr('max', maxDate);
        });
  
    /*$(document).ready(function () {
        $.noConflict();
            $('.p').mask('0000 000 0000');
       });*/

        // jQuery
    $(document).ready(function () {
         $.noConflict();
        $("#phone").intlTelInput({
          // options here
            initialCountry: "ph",
            //autoPlaceholder: "off",
            formatOnDisplay:true,
            autoPlaceholder:"polite",

        });

      });
    </script>
@if(Session::has('patient_added'))
      <script>
         const Toast = Swal.mixin({
                  toast: true,
                  position: 'top-end',
                  showConfirmButton: false,
                  //timer: 5000,
                  iconColor: 'white',
                  timerProgressBar: true,
                  showCloseButton: true,
                  customClass: {
                    popup: 'colored-toast'
                      //title: 'white',
                      //closeButton: 'white',
                  },
                  didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                  }
                })

                Toast.fire({
                  icon: 'success',
                  title: '{!! Session::get('patient_added') !!}',
                  background: '#a5dc86',
                  // colors: #a5dc86 - success, #f27474 - error, #f8bb86 - warning, #3fc3ee - info, #87adbd - question
                })
      </script>
@endif
@endpush
@endsection
