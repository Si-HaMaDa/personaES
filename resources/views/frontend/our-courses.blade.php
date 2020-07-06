@extends('frontend.index')
@section('content')

    <!-- Header -->
    <header class="our-courses-header" style="background-image: url('{{it()->url(setting()->courses_img)}}')">
        <div class="overlay"></div>
        <div class="container">
            <div class="header-wrapper">
                <h1 class="section-title"><span class="title">our courses</span></h1>
            </div>
            <div class=" social-links">
                <a class="facebook"  target="_blank" href="{{setting()->facebook}}"><i class="fab fa-facebook-f"></i></a>
                <a class="twitter"  target="_blank" href="{{setting()->twitter}}"><i class="fab fa-twitter"></i></a>
                <a class="instagram"  target="_blank" href="{{setting()->instagram}}"><i class="fab fa-instagram"></i></a>
                <a class="youtube"  target="_blank" href="{{setting()->youtube}}"><i class="fab fa-youtube"></i></a>
            </div>
        </div>
    </header>

    <main class="our-courses">
        <div class="container">
            <nav class="filter-nav">
                <ul class="filter-list">
                        <li class="filter-item">
                            <a href="{{url('our-courses')}}" class="filter-link main-btn btn-hover active">all</a>
                        </li>
                    @foreach ($Courses as $Course)
                    @php
                        $Group = $Course->GetGroupByDate();
                    @endphp
                    @if ($Group != false)
                        <li class="filter-item">
                            <a href="{{url('our-courses')}}/{{$Course->id}}" data-card="cardTitle1" class="filter-link main-btn btn-hover">{{$Course->titel}}</a>
                        </li>
                    @endif
                    @endforeach
                </ul>
            </nav>
            <section class="courses-cards">
                <div class="row d-none d-md-flex">
                    @foreach ($Courses as $Course)
                    @php
                        $Group = $Course->GetGroupByDate();
                    @endphp
                    @if ($Group != false)
                        <div class="col-md-6 col-lg-4 col-xlg-3">
                            <article id="cardTitle1" class="card show">
                                <img src="{{ it()->url($Course->photo) }}" class="card-img-top" alt="{{$Course->titel}}">
                                <section class="card-body">
                                    <h3 class="card-title">{{$Course->titel}}</h3>
                                    <p class="card-text">
                                        {!! $Course->mini_des !!}
                                    </p>
                               
                                    <p class="course-start-time">
                                        <i class="far fa-clock"></i> starts at <time datetime="{{date('d M yy h:i a', strtotime($Group->strat_at))}}"> <span>{{date('d', strtotime($Group->strat_at))}}</span> {{date('M yy', strtotime($Group->strat_at))}} , <span class="time">{{date('h:i', strtotime($Group->strat_at))}}</span> {{date('a', strtotime($Group->strat_at))}}</time>
                                    </p>
                                    <p class="course-money">
                                        <i class="fas fa-money-bill-wave"></i> <span>{{$Group->price}}</span> EGP for <span>{{$Group->sessions}}</span> session
                                    </p>
                                    <a href="{{url('/register')."?type=courses&id=".$Group->id}}" class="register main-btn btn-hover">register</a>
                                </section>
                            </article>
                        </div>
                    @endif
                    @endforeach
                </div>
                <div class="our-courses-carousel d-md-none">
                    @foreach ($Courses as $Course)
                    @php
                        $Group = $Course->GetGroupByDate();
                    @endphp
                    @if ($Group != false)
                        <article id="cardTitle1" class="card">
                            <img src="{{ it()->url($Course->photo) }}" class="card-img-top" alt="{{$Course->titel}}">
                            <section class="card-body">
                                <h3 class="card-title">{{$Course->titel}}</h3>
                                <p class="card-text">
                                    {!! $Course->mini_des !!}
                                </p>
                             
                                <p class="course-start-time">
                                    <i class="far fa-clock"></i> starts at <time datetime="{{date('d M yy h:i a', strtotime($Group->strat_at))}}"> <span>{{date('d', strtotime($Group->strat_at))}}</span> {{date('M yy', strtotime($Group->strat_at))}} , <span class="time">{{date('h:i', strtotime($Group->strat_at))}}</span> {{date('a', strtotime($Group->strat_at))}}</time>
                                </p>
                                <p class="course-money">
                                    <i class="fas fa-money-bill-wave"></i> <span>{{$Group->price}}</span> EGP for <span>{{$Group->sessions}}</span> session
                                </p>
                                <a href="{{url('/register')."?type=courses&id=".$Course->id."&group_id=".$Group->id}}" class="register main-btn btn-hover">register</a>
                            </section>
                        </article>
                    @endif
                    @endforeach
              
                </div>
            </section>
        </div>
    </main>



        <!-- Header -->



    <main>

    <!-- Free Lessons carousel section -->






@stop