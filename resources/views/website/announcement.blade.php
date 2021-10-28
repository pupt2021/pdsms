@extends('website.layout')
@section('content')


 <section class="home-slider owl-carousel">
      @foreach($announcements as $announcement)
      <div class="slider-item" style="background-image: url('{{asset('images')}}/{{$announcement->announcement1}}');">
      </div>
      <div class="slider-item" style="background-image: url('{{asset('images')}}/{{$announcement->announcement2}}');">
      </div>
      <div class="slider-item" style="background-image: url('{{asset('images')}}/{{$announcement->announcement3}}');">
      </div>
    </section>
   <section class="ftco-gallery">
    <div class="container" style="padding-top:55px;">
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-7 text-center heading-section ftco-animate">
               
                <h2 class="mb-2">{{$announcement->announcementtitle}}</h2>
                <p>{{$announcement->announcementdescription}}</p>
               
            </div>
        </div>
    </div>
       @endforeach
</section>
@endsection
