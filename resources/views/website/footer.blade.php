<footer class="ftco-footer ftco-bg-dark ftco-section">
    @foreach($homes as $home)
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-4">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">{{$home->systemtitle}}</h2>
              <p>{{$home->systemdescription}}</p>
            </div>
            <ul class="ftco-footer-social list-unstyled float-md-left float-lft ">
              <li class="ftco-animate"><a href="https://{{$home->dentaltwitterlink}}"><span class="icon-twitter"></span></a></li>
              <li class="ftco-animate"><a href="https://{{$home->dentalfblink}}"><span class="icon-facebook"></span></a></li>
              <li class="ftco-animate"><a href="https://{{$home->dentalinstalink}}"><span class="icon-instagram"></span></a></li>
            </ul>
          </div>
          <div class="col-md-4">
            <div class="ftco-footer-widget mb-4 ml-md-5">
              <h2 class="ftco-heading-2">Quick Links</h2>
              <ul class="list-unstyled">
                <li><a href="home" class="py-2 d-block">Home</a></li>
                <li><a href="about" class="py-2 d-block">About</a></li>
                <li><a href="services" class="py-2 d-block">Services</a></li>
                <li><a href="contact" class="py-2 d-block">Announcements</a></li>
                <li><a href="developers" class="py-2 d-block">Developers</a></li>
                
              </ul>
            </div>
          </div>
          <div class="col-md-4">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">Office</h2>
            	<div class="block-23 mb-3">
	              <ul>
	                <li><span class="icon icon-map-marker"></span><span class="text">{{$home->dentaladdress}}</span></li>
	                <li><span class="icon icon-phone"></span><span class="text">{{$home->dentalphone}}</span></li>
	                <li><span class="icon icon-envelope"></span><span class="text">{{$home->dentalemail}}</span></li>
	              </ul>
	            </div>
            </div>
          </div>
            @endforeach
        </div>
        <div class="row">
          <div class="col-md-12 text-center">
              <p>
              Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved |<a href="developers" target="_blank"> Techies Developers</a>
              </p>
          </div>
        </div>
      </div>
    </footer>
