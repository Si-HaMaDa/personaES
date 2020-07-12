@extends('frontend.index')
@section('content')
        <!-- Header -->

        <!-- Header -->
    <header class="free-lessons-header" style="background-image: url('{{it()->url(setting()->free_lessons_img)}}')">
        <div class="overlay"></div>
        <div class="container">
            <div class="header-wrapper">
                <h1 class="section-title"><span class="title">free lessons</span></h1>
            </div>
            <div class=" social-links">
                
            <a class="facebook"  target="_blank" href="{{setting()->facebook}}"><i class="fab fa-facebook-f"></i></a>
                <a class="twitter"  target="_blank" href="{{setting()->twitter}}"><i class="fab fa-twitter"></i></a>
                <a class="instagram"  target="_blank" href="{{setting()->instagram}}"><i class="fab fa-instagram"></i></a>
                <a class="youtube"  target="_blank" href="{{setting()->youtube}}"><i class="fab fa-youtube"></i></a>

            </div>
        </div>
    </header>

    <main>

    <!-- Free Lessons carousel section -->

    <section class="free-lessons">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <section class="free-lessons-carousel">
                        <iframe width="1440" height="601" src="{{getYoutubeEmbedUrl($FirstFreeLessons->v_url)}}" frameborder="0"
                            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
                        </iframe>
                    </section>
                </div>
                <!-- All Lessons Section -->
                <div class="col-12">
                    <section class="all-free-lessons-cards">
                        <div class="row">
                            <?php 
                            $i = 0 ;    
                            ?>
                            @foreach ($FreeLessons as $FreeLesson)
                            <div class="col-lg-4 col-md-6">
                            <article class="card" data-url="{{url('/free-lessons-list')}}/{{$FreeLesson->id}}" data-slide-index="{{$FreeLesson->id}}">
                                    <img class="card-img-top" src="https://img.youtube.com/vi/{{getYoutubeIdUrl($FreeLesson->v_url)}}/sddefault.jpg" alt="{{$FreeLesson->titel}}">
                                    <section class="card-body">
                                        <section class="text-container">
                                            <h3 class="card-title"><span class="title">{{$FreeLesson->titel}}</span></h3>
                                            <p class="card-text">
                                                {{$FreeLesson->des}}
                                            </p>
                                        </section>
                                        <p class="date">
                                            <i class="far fa-clock"></i>
                                            <time datetime="21:00 12 May 2020">09:00 PM - 12 May 2020
                                        </p>
                                    </section>
                                </article>
                            </div>
                            <?php 
                            $i++ ;    
                            ?>
                            @endforeach
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </section>
  
    </main>




@stop