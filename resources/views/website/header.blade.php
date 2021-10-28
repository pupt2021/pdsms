 <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
			@foreach($homes as $home)
	      <a class="navbar-brand" href="/"><img src="{{asset('images')}}/{{$home->logo}}" alt="..." /></a>
			@endforeach
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>
        
	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item"><a href="/" class="nav-link">Home</a></li>
	          <li class="nav-item"><a href="about" class="nav-link">About</a></li>
	          <li class="nav-item"><a href="services" class="nav-link">Services</a></li>
	          <li class="nav-item"><a href="dentists" class="nav-link">Dentists</a></li>
			  <li class="nav-item"><a href="announcement" class="nav-link">Announcements</a></li>
			  <!--<li class="nav-item"><a href="developers" class="nav-link">Developers</a></li>-->
              <li class="nav-item"><a href="{{ route('login') }}" class="nav-link">Login</a></li>
              <!--<li class="nav-item"><a href="auth/register" class="nav-link">Register</a></li>-->
	          <!--<li class="nav-item cta"><a href="contact.html" class="nav-link" data-toggle="modal" data-target="#modalRequest"><span>Make an Appointment</span></a></li>-->
	        </ul>
	      </div>
        
	    </div>
	  </nav>
    <!-- END nav -->
