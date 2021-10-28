@extends('website.layout')
@section('content')
    <section class="home-slider owl-carousel">
      @foreach($homes as $home)
      <div class="slider-item" style="background-image: url('{{asset('images')}}/{{$home->banner1}}');">
        <div class="overlay"></div>
        <div class="container">
          <div class="row slider-text align-items-center" data-scrollax-parent="true">
            <div class="col-md-6 col-sm-12 ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
              <h1 class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">{{$home->banneronetitle}}</h1>
              <p class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">{{$home->banneronedescription}}</p>
              <!--<p data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><a href="#" class="btn btn-primary px-4 py-3">Make an Appointment</a></p>-->
            </div>
          </div>
        </div>
      </div>

      <div class="slider-item" style="background-image: url('{{asset('images')}}/{{$home->banner2}}');">
        <div class="overlay"></div>
        <div class="container">
          <div class="row slider-text align-items-center" data-scrollax-parent="true">
            <div class="col-md-6 col-sm-12 ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
              <h1 class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">{{$home->bannertwotitle}}</h1>
              <p class="mb-4">{{$home->bannertwodescription}}</p>
              <!--<p><a href="#" class="btn btn-primary px-4 py-3">Make an Appointment</a></p>-->
            </div>
          </div>
        </div>
      </div>
      <div class="slider-item" style="background-image: url('{{asset('images')}}/{{$home->banner3}}');">
        <div class="overlay"></div>
        <div class="container">
          <div class="row slider-text align-items-center" data-scrollax-parent="true">
            <div class="col-md-6 col-sm-12 ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
              <h1 class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">{{$home->bannerthreetitle}}</h1>
              <p class="mb-4">{{$home->bannerthreedescription}}</p>
              <!--<p><a href="#" class="btn btn-primary px-4 py-3">Make an Appointment</a></p>-->
            </div>
          </div>
        </div>
      </div>
        @endforeach
    </section>

   <!-- <section class="ftco-intro">
    	<div class="container">
    		<div class="row no-gutters">
    			<div class="col-md-3 color-1 p-4">
    				<h3 class="mb-4">Emergency Cases</h3>
    				<p>A small river named Duden flows by their place and supplies</p>
    				<span class="phone-number">+ (123) 456 7890</span>
    			</div>
    			<div class="col-md-3 color-2 p-4">
    				<h3 class="mb-4">Opening Hours</h3>
    				<p class="openinghours d-flex">
    					<span>Monday - Friday</span>
    					<span>8:00 - 19:00</span>
    				</p>
    				<p class="openinghours d-flex">
    					<span>Saturday</span>
    					<span>10:00 - 17:00</span>
    				</p>
    				<p class="openinghours d-flex">
    					<span>Sunday</span>
    					<span>10:00 - 16:00</span>
    				</p>
    			</div>
    			<div class="col-md-6 color-3 p-4">
    				<h3 class="mb-2">Make an Appointment</h3>
    				<form action="#" class="appointment-form">
	            <div class="row">
	            	<div class="col-sm-4">
	                <div class="form-group">
			              <div class="select-wrap">
                      <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                      <select name="" id="" class="form-control">
                      	<option value="">Department</option>
                        <option value="">Teeth Whitening</option>
                        <option value="">Teeth CLeaning</option>
                        <option value="">Quality Brackets</option>
                        <option value="">Modern Anesthetic</option>
                      </select>
                    </div>
			            </div>
	              </div>
	              <div class="col-sm-4">
	                <div class="form-group">
	                	<div class="icon"><span class="icon-user"></span></div>
			              <input type="text" class="form-control" id="appointment_name" placeholder="Name">
			            </div>
	              </div>
	              <div class="col-sm-4">
	                <div class="form-group">
	                	<div class="icon"><span class="icon-paper-plane"></span></div>
			              <input type="text" class="form-control" id="appointment_email" placeholder="Email">
			            </div>
	              </div>
	            </div>
	            <div class="row">
	              <div class="col-sm-4">
	                <div class="form-group">
	                	<div class="icon"><span class="ion-ios-calendar"></span></div>
	                  <input type="text" class="form-control appointment_date" placeholder="Date">
	                </div>    
	              </div>
	              <div class="col-sm-4">
	                <div class="form-group">
	                	<div class="icon"><span class="ion-ios-clock"></span></div>
	                  <input type="text" class="form-control appointment_time" placeholder="Time">
	                </div>
	              </div>
	              <div class="col-sm-4">
	                <div class="form-group">
	                	<div class="icon"><span class="icon-phone2"></span></div>
	                  <input type="text" class="form-control" id="phone" placeholder="Phone">
	                </div>
	              </div>
	            </div>
	            
	            <div class="form-group">
	              <input type="submit" value="Make an Appointment" class="btn btn-primary">
	            </div>
	          </form>
    			</div>
    		</div>
    	</div>
    </section>-->
  
    <section class="ftco-section ftco-services">
        @foreach($services as $service)
      <div class="container">
      	<div class="row justify-content-center mb-5 pb-5">
          <div class="col-md-7 text-center heading-section ftco-animate">
            <h2 class="mb-2">{{$service->servicetitle}}</h2>
            <p>{{$service->servicedescription}}</p>
          </div>
        </div>
        <div class="row">
          <div class="col-md-3 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services d-block text-center">
              <div class="icon d-flex justify-content-center align-items-center">
            		<span class="flaticon-tooth-1"></span>
              </div>
              <div class="media-body p-2 mt-3">
                <h3 class="heading">Teeth Whitening</h3>
                <p>{{$service->twdesc}}</p>
              </div>
            </div>      
          </div>
          <div class="col-md-3 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services d-block text-center">
              <div class="icon d-flex justify-content-center align-items-center">
            		<span class="flaticon-dental-care"></span>
              </div>
              <div class="media-body p-2 mt-3">
                <h3 class="heading">Teeth Cleaning</h3>
                <p>{{$service->tcdesc}}</p>
              </div>
            </div>    
          </div>
          <div class="col-md-3 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services d-block text-center">
              <div class="icon d-flex justify-content-center align-items-center">
            		<span class="flaticon-tooth-with-braces"></span>
              </div>
              <div class="media-body p-2 mt-3">
                <h3 class="heading">Quality Brackets</h3>
                <p>{{$service->qbdesc}}</p>
              </div>
            </div>      
          </div>
          <div class="col-md-3 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services d-block text-center">
              <div class="icon d-flex justify-content-center align-items-center">
            		<span class="flaticon-anesthesia"></span>
              </div>
              <div class="media-body p-2 mt-3">
                <h3 class="heading">Modern Anesthetic</h3>
                <p>{{$service->madesc}}</p>
              </div>
            </div>      
          </div>
        </div>
          @endforeach
      </div>
      <div class="container-wrap mt-5">
          @foreach($abouts as $about)
      	<div class="row d-flex no-gutters">
      		<div class="col-md-6 img" style="background-image: url('{{asset('images')}}/{{$about->picture}}');">
      		</div>
      		<div class="col-md-6 d-flex">
      			<div class="about-wrap">
      				<div class="heading-section heading-section-white mb-5 ftco-animate">
		            <h2 class="mb-2">{{$about->maintitle}}</h2>
		            <p>{{$about->maintitledescription}}</p>
		          </div>
      				<div class="list-services d-flex ftco-animate">
      					<div class="icon d-flex justify-content-center align-items-center">
      						<span class="icon-check2"></span>
      					</div>
      					<div class="text">
	      					<h3>Well Experienced Dentist</h3>
	      					<p>{{$about->weddesc}}</p>
      					</div>
      				</div>
      				<div class="list-services d-flex ftco-animate">
      					<div class="icon d-flex justify-content-center align-items-center">
      						<span class="icon-check2"></span>
      					</div>
      					<div class="text">
	      					<h3>Clean Facilities</h3>
	      					<p>{{$about->cfdescription}}</p>
      					</div>
      				</div>
      				<div class="list-services d-flex ftco-animate">
      					<div class="icon d-flex justify-content-center align-items-center">
      						<span class="icon-check2"></span>
      					</div>
      					<div class="text">
	      					<h3>Comfortable Clinics</h3>
	      					<p>{{$about->ccdesc}}</p>
      					</div>
      				</div>
      			</div>
      		</div>
      	</div>
      </div>
        @endforeach
    </section>


    <section class="ftco-section">
        @foreach($dentists as $dentist)
      <div class="container">
      	<div class="row justify-content-center mb-5 pb-5">
          <div class="col-md-7 text-center heading-section ftco-animate">
            <h2 class="mb-3">{{$dentist->titletext}}</h2>
            <p>{{$dentist->shortdesc}}</p>
          </div>
        </div>
        <div class="row">
        	<div class="col-lg-3 col-md-6 d-flex mb-sm-4 ftco-animate" style="margin-left:auto;">
        		<div class="staff">
                    <div class="img mb-4" style="background-image: url('{{asset('images')}}/{{$dentist->staff1image}}');"></div>
      				<div class="info text-center">
      					<h3><a href="#">{{$dentist->staff1name}}</a></h3>
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
        	<div class="col-lg-3 col-md-6 d-flex mb-sm-4 ftco-animate" style="margin-right:auto;">
        		<div class="staff">
      				<div class="img mb-4" style="background-image: url('{{asset('images')}}/{{$dentist->staff2image}}');"></div>
      				<div class="info text-center">
      					<h3><a href="#">{{$dentist->staff2name}}</a></h3>
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

    <section class="ftco-section ftco-counter img" id="section-counter" style="background-image: url('{{asset('images')}}/{{$about->achievementbg}}');" data-stellar-background-ratio="0.5">
        @foreach($abouts as $about)
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
                @foreach($homes as $home)
                <div class="container" style="padding-top:55px;">
                    <div class="row justify-content-center mb-5 pb-3">
                        <div class="col-md-7 text-center heading-section ftco-animate">
                            <h2 class="mb-2">Gallery</h2>
                            <p>{{$home->gallerydesc}}</p>
                        </div>
                    </div>

                </div>
            </section>

		<section class="ftco-gallery">
    	<div class="container-wrap">
    		<div class="row no-gutters">
					<div class="col-md-3 ftco-animate">
						<a href="#" class="gallery img d-flex align-items-center" style="background-image: url('{{asset('images')}}/{{$home->picture1}}');">
							<div class="icon mb-4 d-flex align-items-center justify-content-center">
    						<span class="icon-search"></span>
    					</div>
						</a>
					</div>
					<div class="col-md-3 ftco-animate">
						<a href="#" class="gallery img d-flex align-items-center" style="background-image: url('{{asset('images')}}/{{$home->picture2}}');">
							<div class="icon mb-4 d-flex align-items-center justify-content-center">
    						<span class="icon-search"></span>
    					</div>
						</a>
					</div>
					<div class="col-md-3 ftco-animate">
						<a href="#" class="gallery img d-flex align-items-center" style="background-image: url('{{asset('images')}}/{{$home->picture3}}');">
							<div class="icon mb-4 d-flex align-items-center justify-content-center">
    						<span class="icon-search"></span>
    					</div>
						</a>
					</div>
					<div class="col-md-3 ftco-animate">
						<a href="#" class="gallery img d-flex align-items-center" style="background-image: url('{{asset('images')}}/{{$home->picture4}}');">
							<div class="icon mb-4 d-flex align-items-center justify-content-center">
    						<span class="icon-search"></span>
    					</div>
						</a>
					</div>
        </div>
    	</div>
    </section>

	
<section class="ftco-gallery">
    <div class="container" style="padding-top:55px;">
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-7 text-center heading-section ftco-animate">
                <h2 class="mb-2">Contacts</h2>
                <p>{{$home->contactdesc}}</p>
            </div>
        </div>

    </div>
    @endforeach
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
