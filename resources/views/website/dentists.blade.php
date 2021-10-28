@extends('website.layout')
@section('content')

    <section class="home-slider owl-carousel">
        @foreach($dentists as $dentist)
        <div class="slider-item bread-item" style="background-image: url('{{asset('images')}}/{{$dentist->dentistbanner}}');" data-stellar-background-ratio="0.5">
            <div class="overlay"></div>
            <div class="container" data-scrollax-parent="true">
                <div class="row slider-text align-items-end">
                    <div class="col-md-7 col-sm-12 ftco-animate mb-5">
                        <p class="breadcrumbs" data-scrollax=" properties: { translateY: '70%', opacity: 1.6}">
                            <span class="mr-2">
                                <a href="/">Home</a>
                            </span>
                            <span>Dentists</span>
                        </p>
                        <h1 class="mb-3" data-scrollax=" properties: { translateY: '70%', opacity: .9}">{{$dentist->dentistbannertitle}}</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
		
    <section class="ftco-section">
      <div class="container">
      	<div class="row justify-content-center mb-5 pb-5">
          <div class="col-md-7 text-center heading-section ftco-animate">
            <h2 class="mb-3">{{$dentist->titletext}}</h2>
            <p>{{$dentist->shortdesc}}</p>
          </div>
        </div>
         <div class="row">
        	<div class="col-lg-3 col-md-6 d-flex mb-sm-4 ftco-animate" style="margin-left: auto;">
        		<div class="staff">
                    <div class="img mb-4" style="background-image: url('{{asset('images')}}/{{$dentist->staff1image}}');"></div>
      				<div class="info text-center">
      					<h3>{{$dentist->staff1name}}</h3>
      					<span class="position">{{$dentist->staff1position}}</span>
      					<div class="text">
	        				<p>{{$dentist->staff1desc}}</p>
	        				<ul class="ftco-social">
			              <li class="ftco-animate"><a href="https://{{$dentist->staff1twitterlink}}"><span class="icon-twitter"></span></a></li>
			              <li class="ftco-animate"><a href="https://{{$dentist->staff1fblink}}"><span class="icon-facebook"></span></a></li>
			              <li class="ftco-animate"><a href="https://{{$dentist->staff1tinstalink}}"><span class="icon-instagram"></span></a></li>
			              <li class="ftco-animate"><a href="https://{{$dentist->staff1gmail}}"><span class="icon-google-plus"></span></a></li>
			            </ul>
	        			</div>
      				</div>
        		</div>
        	</div>
        	<div class="col-lg-3 col-md-6 d-flex mb-sm-4 ftco-animate" style="margin-right: auto;">
        		<div class="staff">
      				<div class="img mb-4" style="background-image: url('{{asset('images')}}/{{$dentist->staff2image}}');"></div>
      				<div class="info text-center">
      					<h3>{{$dentist->staff2name}}</h3>
      					<span class="position">{{$dentist->staff2position}}</span>
      					<div class="text">
	        				<p>{{$dentist->staff2desc}}</p>
	        				<ul class="ftco-social">
			              <li class="ftco-animate"><a href="https://{{$dentist->staff2twitterlink}}"><span class="icon-twitter"></span></a></li>
			              <li class="ftco-animate"><a href="https://{{$dentist->staff2fblink}}"><span class="icon-facebook"></span></a></li>
			              <li class="ftco-animate"><a href="https://{{$dentist->staff2tinstalink}}"><span class="icon-instagram"></span></a></li>
			              <li class="ftco-animate"><a href="https://{{$dentist->staff2gmail}}"><span class="icon-google-plus"></span></a></li>
			            </ul>
	        			</div>
      				</div>
        		</div>
        	</div>
        </div>
      </div>
        @endforeach
    </section>

@foreach($abouts as $about)
      <section class="ftco-section ftco-counter img" id="section-counter" style="background-image: url('{{asset('images')}}/{{$about->achievementbg}}');" data-stellar-background-ratio="0.5">
    <div class="container">
        <div class="row d-flex align-items-center">
            <div class="col-md-3 aside-stretch py-5">
                <div class=" heading-section heading-section-white ftco-animate pr-md-4">
                    <h2 class="mb-3">Achievements</h2>
                    <p>{{$about->achievementdesc}}</p>
                </div>
            </div>
            <div class="col-md-9 py-5 pl-md-5">
                <div class="row">
                    <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                        <div class="block-18">
                            <div class="text">
                                <strong class="number" data-number="{{$about->yearsofexp}}">0</strong>
                                <span>Years of Experience</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                        <div class="block-18">
                            <div class="text">
                                <strong class="number" data-number="{{$about->hscustomer}}">0</strong>
                                <span>Happy Smiling Customer</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                        <div class="block-18">
                            <div class="text">
                                <strong class="number" data-number="{{$about->patientsperyear}}">0</strong>
                                <span>Patients Per Year</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
          @endforeach
</section>


<section class="ftco-gallery">
    <div class="container" style="padding-top:55px;">
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-7 text-center heading-section ftco-animate">
                <h2 class="mb-2">Contacts</h2>
                @foreach($homes as $home)
                <p>{{$home->contactdesc}}</p>
                @endforeach
            </div>
        </div>
    </div>
</section>

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

  <!-- Modal -->
  <div class="modal fade" id="modalRequest" tabindex="-1" role="dialog" aria-labelledby="modalRequestLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalRequestLabel">Make an Appointment</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="#">
            <div class="form-group">
              <!-- <label for="appointment_name" class="text-black">Full Name</label> -->
              <input type="text" class="form-control" id="appointment_name" placeholder="Full Name">
            </div>
            <div class="form-group">
              <!-- <label for="appointment_email" class="text-black">Email</label> -->
              <input type="text" class="form-control" id="appointment_email" placeholder="Email">
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <!-- <label for="appointment_date" class="text-black">Date</label> -->
                  <input type="text" class="form-control appointment_date" placeholder="Date">
                </div>    
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <!-- <label for="appointment_time" class="text-black">Time</label> -->
                  <input type="text" class="form-control appointment_time" placeholder="Time">
                </div>
              </div>
            </div>
            

            <div class="form-group">
              <!-- <label for="appointment_message" class="text-black">Message</label> -->
              <textarea name="" id="appointment_message" class="form-control" cols="30" rows="10" placeholder="Message"></textarea>
            </div>
            <div class="form-group">
              <input type="submit" value="Make an Appointment" class="btn btn-primary">
            </div>
          </form>
        </div>
        
      </div>
    </div>
  </div>
@endsection
