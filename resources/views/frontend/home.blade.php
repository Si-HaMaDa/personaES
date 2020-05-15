@extends('frontend.index')
@section('content')


    <!-- Header -->
    <header class="home-header" style="background-image: url('{{it()->url(setting()->home_photo)}}')">
        <div class="container">
            <div class="header-wrapper">
                <h1>{{setting()->sitename_ar}}</h1>
                <h3>Improve your Skils</h3>
                <a class="discover-more internal-link" href="#discoverMe"">discover more</a>
            </div>
            <div class="social-links">
                <a class="facebook"  target="_blank" href="{{setting()->facebook}}"><i class="fab fa-facebook-f"></i></a>
                <a class="twitter"  target="_blank" href="{{setting()->twitter}}"><i class="fab fa-twitter"></i></a>
                <a class="instagram"  target="_blank" href="{{setting()->instagram}}"><i class="fab fa-instagram"></i></a>
                <a class="youtube"  target="_blank" href="{{setting()->youtube}}"><i class="fab fa-youtube"></i></a>
            </div>
            <button class="swipe-arrow" type="button"><i class="fa fa-angle-down"></i></button>
        </div>
    </header>
    <!-- Header -->




   <!-- Discover Me section -->
   <section id="discoverMe" class="discover-me">
    <div class="container">
        <div class="row">
            <div class="col-md-7 order-2 order-md-1 d-flex align-items-center">
                <div class="section-wrapper">
                    <h2 class="section-title"><span class="title">discover me</span></h2>
                    <h3>{{setting()->discover_me_titel}}</h3>
                    <p>
                      {{setting()->discover_me_des}}
                    </p>
                    <a class="main-btn" href="#"><i class="fas fa-book-open"></i> read more</a>
                    <a class="main-btn btn-hover" href="{{setting()->discover_me_video}}"><i class="fas fa-play"></i> watch video</a>
                </div>
            </div>
            <div class="col-md-5 order-1 d-none d-md-block">
                <img src="{{url('frontend')}}/dist/img/discover.png" alt="discover-me">
            </div>
        </div>
    </div>
</section>

<!-- Our Courses Simple Section -->
<section id="ourCourses" class="our-courses">
    <div class="overlay"></div>
    <div class="container-fluid">
        <div class="title-wrapper text-center">
            <h2 class="fancy-title">our courses</h2>
            <div class="custom-border">
                <span class="line"></span>
                <span class="circle"></span>
                <span class="line"></span>
            </div>
        </div>
        <div class="our-courses-slider">
            <article class="card">
                <section class="card-img">
                    <img src="{{url('frontend')}}/dist/img/events/events-2.png" class="card-img-top" alt="events-1">
                    <time datetime="3 oct 2016 11:00">25 <br> oct<span class="time">11:00 <br> pm</span></time>
                </section>
                <section class="card-body">
                    <h3 class="card-title">Lorem ipsum</h3>
                    <p class="card-text">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem aliquid praesentium perferendis molestiae
                        a, illum
                        vitae fugit voluptatum ducimus aperiam sequi dolorem ad aspernatur quia dolorum labore exercitationem
                        sed quos!
                    </p>
                    <p class="course-start-time">
                        <i class="far fa-clock"></i> starts at <time datetime="3 oct 2016 11:00"> <span>25</span> oct 2016 , <span class="time">09:00</span> pm</time>:<span>11:00</span><time> pm</time>
                    </p>
                    <p class="course-money">
                        <i class="fas fa-money-bill-wave"></i> <span>500</span> EGP for <span>8</span> session
                    </p>
                </section>
                <section class="card-footer">
                    <div class="row no-gutters">
                        <div class="col-md-6">
                            <a href="#" class="read-more">read more</a>
                        </div>
                        <div class="col-md-6">
                            <a href="#" class="register">register</a>
                        </div>
                    </div>
                </section>
            </article>
            <article class="card">
                <section class="card-img">
                    <img src="{{url('frontend')}}/dist/img/events/events-2.png" class="card-img-top" alt="events-1">
                    <time datetime="3 oct 2016 11:00">25 <br> oct<span class="time">11:00 <br> pm</span></time>
                </section>
                <section class="card-body">
                    <h3 class="card-title">Lorem ipsum</h3>
                    <p class="card-text">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem aliquid praesentium perferendis molestiae
                        a, illum
                        vitae fugit voluptatum ducimus aperiam sequi dolorem ad aspernatur quia dolorum labore exercitationem
                        sed quos!
                    </p>
                    <p class="course-start-time">
                        <i class="far fa-clock"></i> starts at <time datetime="3 oct 2016 11:00"> <span>25</span> oct 2016 , <span
                                class="time">09:00</span> pm</time>:<span>11:00</span><time> pm</time>
                    </p>
                    <p class="course-money">
                        <i class="fas fa-money-bill-wave"></i> <span>500</span> EGP for <span>8</span> session
                    </p>
                </section>
                <section class="card-footer">
                    <div class="row no-gutters">
                        <div class="col-md-6">
                            <a href="#" class="read-more">read more</a>
                        </div>
                        <div class="col-md-6">
                            <a href="#" class="register">register</a>
                        </div>
                    </div>
                </section>
            </article>
            <article class="card">
                <section class="card-img">
                    <img src="{{url('frontend')}}/dist/img/events/events-2.png" class="card-img-top" alt="events-1">
                    <time datetime="3 oct 2016 11:00">25 <br> oct<span class="time">11:00 <br> pm</span></time>
                </section>
                <section class="card-body">
                    <h3 class="card-title">Lorem ipsum</h3>
                    <p class="card-text">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem aliquid praesentium perferendis molestiae
                        a, illum
                        vitae fugit voluptatum ducimus aperiam sequi dolorem ad aspernatur quia dolorum labore exercitationem
                        sed quos!
                    </p>
                    <p class="course-start-time">
                        <i class="far fa-clock"></i> starts at <time datetime="3 oct 2016 11:00"> <span>25</span> oct 2016 , <span
                                class="time">09:00</span> pm</time>:<span>11:00</span><time> pm</time>
                    </p>
                    <p class="course-money">
                        <i class="fas fa-money-bill-wave"></i> <span>500</span> EGP for <span>8</span> session
                    </p>
                </section>
                <section class="card-footer">
                    <div class="row no-gutters">
                        <div class="col-md-6">
                            <a href="#" class="read-more">read more</a>
                        </div>
                        <div class="col-md-6">
                            <a href="#" class="register">register</a>
                        </div>
                    </div>
                </section>
            </article>
            <article class="card">
                <section class="card-img">
                    <img src="{{url('frontend')}}/dist/img/events/events-2.png" class="card-img-top" alt="events-1">
                    <time datetime="3 oct 2016 11:00">25 <br> oct<span class="time">11:00 <br> pm</span></time>
                </section>
                <section class="card-body">
                    <h3 class="card-title">Lorem ipsum</h3>
                    <p class="card-text">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem aliquid praesentium perferendis molestiae
                        a, illum
                        vitae fugit voluptatum ducimus aperiam sequi dolorem ad aspernatur quia dolorum labore exercitationem
                        sed quos!
                    </p>
                    <p class="course-start-time">
                        <i class="far fa-clock"></i> starts at <time datetime="3 oct 2016 11:00"> <span>25</span> oct 2016 , <span
                                class="time">09:00</span> pm</time>:<span>11:00</span><time> pm</time>
                    </p>
                    <p class="course-money">
                        <i class="fas fa-money-bill-wave"></i> <span>500</span> EGP for <span>8</span> session
                    </p>
                </section>
                <section class="card-footer">
                    <div class="row no-gutters">
                        <div class="col-md-6">
                            <a href="#" class="read-more">read more</a>
                        </div>
                        <div class="col-md-6">
                            <a href="#" class="register">register</a>
                        </div>
                    </div>
                </section>
            </article>
        </div>
    </div>
</section>

<!-- Simple Events Section -->

<section id="simpleEvents" class="events">
    <div class="container">
        <h2 class="section-title mb-4"><span class="title">upcomming events</span></h2>
        <div class="events-slider">
            @foreach ($Events as $Event)
                
            <article class="card">
                <img src="{{it()->url($Event->img)}}" class="card-img-top" alt="{{$Event->title}}">
                <section class="card-body p-1 p-lg-2">
                    <time datetime="{{$Event->date}}">{{$Event->date}}</time>
                    <time>{{date('h:i a', strtotime($Event->time))}}</time>
                    <h3 class="card-title">{{$Event->title}}</h3>
                    <p class="card-text">
                        {{$Event->des}}
                    </p>
                    <a href="#" class="main-btn btn-hover">read more</a>
                </section>
            </article>
            @endforeach
            {{-- <article class="card">
                <img src="{{url('frontend')}}/dist/img/events/events-2.png" class="card-img-top" alt="events-2">
                <section class="card-body p-1 p-lg-2">
                    <time datetime="3 oct 2016">3 oct 2016</time>
                    <time>11:00 AM</time>
                    <h3 class="card-title">Lorem ipsum dolor sit amet consectetur adipisicing elit.</h3>
                    <p class="card-text">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem aliquid praesentium perferendis molestiae a,
                        illum
                        vitae fugit voluptatum ducimus aperiam sequi dolorem ad aspernatur quia dolorum labore exercitationem sed
                        quos!
                    </p>
                    <a href="#" class="main-btn btn-hover">read more</a>
                </section>
            </article>
            <article class="card">
                <img src="{{url('frontend')}}/dist/img/events/events-3.png" class="card-img-top" alt="events-3">
                <section class="card-body p-1 p-lg-2">
                    <time datetime="3 oct 2016">3 oct 2016</time>
                    <time>11:00 AM</time>
                    <h3 class="card-title">Lorem ipsum dolor sit amet consectetur adipisicing elit.</h3>
                    <p class="card-text">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem aliquid praesentium perferendis molestiae a,
                        illum
                        vitae fugit voluptatum ducimus aperiam sequi dolorem ad aspernatur quia dolorum labore exercitationem sed
                        quos!
                    </p>
                    <a href="#" class="main-btn btn-hover">read more</a>
                </section>
            </article>
            <article class="card">
                <img src="{{url('frontend')}}/dist/img/events/events-1.png" class="card-img-top" alt="events-1">
                <section class="card-body p-1 p-lg-2">
                    <time datetime="3 oct 2016">3 oct 2016</time>
                    <time>11:00 AM</time>
                    <h3 class="card-title">Lorem ipsum dolor sit amet consectetur adipisicing elit.</h3>
                    <p class="card-text">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem aliquid praesentium perferendis molestiae a,
                        illum
                        vitae fugit voluptatum ducimus aperiam sequi dolorem ad aspernatur quia dolorum labore exercitationem sed
                        quos!
                    </p>
                    <a href="#" class="main-btn btn-hover">read more</a>
                </section>
            </article> --}}
        </div>
    </div>
</section>

<!-- Latest News and out Tesimonials Sections -->

<section class="section-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mb-5 m-lg-0">
                <section id="latestNews" class="latest-news">
                    <h2 class="section-title mb-5"><span class="title">latest news</span></h2>
                    <div class="latest-news-slider">
                        <div>
                            <article class="card">
                                <div class="row no-gutters">
                                    <div class="col-sm-5">
                                        <img src="{{url('frontend')}}/dist/img/events/events-1.png" class="card-img-top" alt="events-1">
                                    </div>
                                    <div class="col-sm-7">
                                        <section class="card-body p-3">
                                            <h3 class="card-title">Lorem ipsum dolor sit.</h3>
                                            <p class="card-text">
                                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem aliquid praesentium perferendis molestiae
                                                a, illum
                                                vitae fugit voluptatum ducimus aperiam sequi dolorem ad aspernatur quia dolorum labore exercitationem
                                                sed quos!
                                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem aliquid praesentium perferendis molestiae
                                                a, illum
                                                vitae fugit voluptatum ducimus aperiam sequi dolorem ad aspernatur quia dolorum labore exercitationem
                                                sed quos!
                                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem aliquid praesentium perferendis molestiae
                                                a, illum
                                                vitae fugit voluptatum ducimus aperiam sequi dolorem ad aspernatur quia dolorum labore exercitationem
                                                sed quos!
                                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem aliquid praesentium perferendis molestiae
                                                a, illum
                                                vitae fugit voluptatum ducimus aperiam sequi dolorem ad aspernatur quia dolorum labore exercitationem
                                                sed quos!
                                            </p>
                                            <time datetime="3 oct 2016 11:00"><i class="far fa-clock"></i> 3 oct 2016 , 11:00 AM</time>
                                        </section>
                                    </div>
                                </div>
                            </article>
                        </div>
                        <div>
                            <article class="card">
                                <div class="row no-gutters">
                                    <div class="col-sm-5">
                                        <img src="{{url('frontend')}}/dist/img/events/events-2.png" class="card-img-top" alt="events-1">
                                    </div>
                                    <div class="col-sm-7">
                                        <section class="card-body p-3">
                                            <h3 class="card-title">Lorem ipsum dolor sit.</h3>
                                            <p class="card-text">
                                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem aliquid praesentium perferendis molestiae
                                                a, illum
                                                vitae fugit voluptatum ducimus aperiam sequi dolorem ad aspernatur quia dolorum labore exercitationem
                                                sed quos!
                                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem aliquid praesentium perferendis molestiae
                                            </p>
                                            <time datetime="3 oct 2016 11:00"><i class="far fa-clock"></i> 3 oct 2016 , 11:00 AM</time>
                                        </section>
                                    </div>
                                </div>
                            </article>
                        </div>
                        <div>
                            <article class="card">
                                <div class="row no-gutters">
                                    <div class="col-sm-5">
                                        <img src="{{url('frontend')}}/dist/img/events/events-3.png" class="card-img-top" alt="events-1">
                                    </div>
                                    <div class="col-sm-7">
                                        <section class="card-body p-3">
                                            <h3 class="card-title">Lorem ipsum dolor sit.</h3>
                                            <p class="card-text">
                                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem aliquid praesentium perferendis molestiae
                                                a, illum
                                                vitae fugit voluptatum ducimus aperiam sequi dolorem ad aspernatur quia dolorum labore exercitationem
                                                sed quos!
                                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem aliquid praesentium perferendis molestiae
                                                a, illum
                                            </p>
                                            <time datetime="3 oct 2016 11:00"><i class="far fa-clock"></i> 3 oct 2016 , 11:00 AM</time>
                                        </section>
                                    </div>
                                </div>
                            </article>
                        </div>
                        <div>
                            <article class="card">
                                <div class="row no-gutters">
                                    <div class="col-sm-5">
                                        <img src="{{url('frontend')}}/dist/img/events/events-3.png" class="card-img-top" alt="events-1">
                                    </div>
                                    <div class="col-sm-7">
                                        <section class="card-body p-3">
                                            <h3 class="card-title">Lorem ipsum dolor sit.</h3>
                                            <p class="card-text">
                                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem aliquid praesentium perferendis
                                                molestiae
                                                a, illum
                                                vitae fugit voluptatum ducimus aperiam sequi dolorem ad aspernatur quia dolorum labore
                                                exercitationem
                                                sed quos!
                                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem aliquid praesentium perferendis
                                                molestiae
                                                a, illum
                                            </p>
                                            <time datetime="3 oct 2016 11:00"><i class="far fa-clock"></i> 3 oct 2016 , 11:00 AM</time>
                                        </section>
                                    </div>
                                </div>
                            </article>
                        </div>
                    </div>
                </section>
            </div>
            <div class="col-lg-6">
                <Section id="ourTestimonials" class="our-testimonials">
                    <h2 class="section-title mb-5"><span class="title">our testimonials</span></h2>
                    <button class="main-btn btn-prev"><i class="fas fa-chevron-left"></i></button>
                    <button class="main-btn btn-next"><i class="fas fa-chevron-right"></i></button>
                    <div class="our-testimonils-slider">
                      @foreach ($Testimonials as $Testimonial)
                          <article class="card">
                              <img src="{{it()->url($Testimonial->photo)}}" class="card-img-top" alt="events-1">
                              <section class="card-body p-1 p-lg-2">
                                  <blockquote class="blockquote text-center">
                                      <p class="card-text mb-0">
                                          {{$Testimonial->message}}
                                      </p>
                                      
                                      
                                      <footer class="blockquote-footer">
                                          <span class="name">{{$Testimonial->name}}</span>
                                          <span class="job-title">{{$Testimonial->job}}</span>
                                      </footer>
                                  </blockquote>
                              </section>
                          </article>
                        @endforeach
                    </div>
                </Section>
                
                
            </div>
        </div>
    </div>
</section>
@stop