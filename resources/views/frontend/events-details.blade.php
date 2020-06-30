@extends('frontend.index')
@section('content')
        <!-- Header -->
        <header class="events-header" style="background-image: url('{{it()->url(setting()->event_photo)}}')">
            <div class="overlay"></div>
            <div class="container">
                <div class="header-wrapper">
                    <h1 class="section-title"><span class="title">events</span></h1>
                </div>
                <div class=" social-links">
                    <a class="facebook"  target="_blank" href="{{setting()->facebook}}"><i class="fab fa-facebook-f"></i></a>
                    <a class="twitter"  target="_blank" href="{{setting()->twitter}}"><i class="fab fa-twitter"></i></a>
                    <a class="instagram"  target="_blank" href="{{setting()->instagram}}"><i class="fab fa-instagram"></i></a>
                    <a class="youtube"  target="_blank" href="{{setting()->youtube}}"><i class="fab fa-youtube"></i></a>
                </div>
            </div>
        </header>
    <!-- Header -->

    <!-- Events details carousel section -->

    <section class="events-details">
        <div class="container">
            <div class="title-wrapper text-center">
                <h2 class="fancy-title">upcoming events</h2>
                <div class="custom-border">
                    <span class="line"></span>
                    <span class="circle"></span>
                    <span class="line"></span>
                </div>
            </div>
            
            <div class="events-details-carousel">
                @foreach ($Events as $Event)
            
                <article class="card">
                    <img src="{{it()->url($Event->img)}}" class="card-img-top" alt="{{$Event->title}}">
                    <section class="card-body p-1 p-lg-2">
                        <h3 class="section-title card-title"><span class="title">{{$Event->title}}</span></h3>
                        <p class="card-text">
                            {{$Event->des}}
                        </p>
                        <section class="card-footer ">
                            <span class="show"><i class="far fa-user"></i><span class="check-in-num">{{count($Event->Checks)}}</span></span>
                            @if(date("Y-m-d") > $Event->date)
                                <button href="#" data-url="{{route('event.check' , $Event->id)}}" disabled class="main-btn active check-in">check in</button>
                            @else
                                @if($Event->Checked())
                                <button href="#" data-url="{{route('event.check' , $Event->id)}}"  class="main-btn active check-in">check in</button>
                                @else
                                <button href="#" data-url="{{route('event.check' , $Event->id)}}" class="main-btn btn-hover check-in">check in</button>
                                @endif
                            @endif
                            
                        </section>
                  
                      
                    </section>
                </article>
                @endforeach

            </div>
        </div>
    </section>
    <!-- Carousel Navigation -->
    <nav class="carousel-nav">
        <div class="container">
            <div class="events-carousel-nav">
                @foreach ($Events as $Event)
                <article class="card">
                    <img src="{{it()->url($Event->img)}}" class="card-img-top" alt="{{$Event->title}}">
                </article>
                @endforeach
            </div>
        </div>
    </nav>



@stop