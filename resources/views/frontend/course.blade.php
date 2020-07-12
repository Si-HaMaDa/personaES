@extends('frontend.index')
@section('content')

    <!-- Header -->
    <header class="our-courses-header" style="background-image: url('{{it()->url(setting()->our_courses_photo)}}')">
        <div class="overlay"></div>
        <div class="container">
            <div class="header-wrapper">
                <h1 class="section-title"><span class="title">{{$Course->titel}}</span></h1>
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
                <!-- BEGIN PAGE BASE CONTENT -->
            @if(count($errors->all()) > 0)
            <div class="alert alert-danger">
            <ol>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ol>
            </div>
            @endif
            @if(session()->has('error'))
            <div class="alert alert-danger">
                <button class="close" data-close="alert"></button>

                <span> {{ session('error') }} </span>
            </div>
            @endif

            @if(session()->has('success'))
            <div class="alert alert-success">
                <button class="close" data-close="alert"></button>
                @if(session()->has('success'))
                <span> {{ session('success') }} </span>
                @endif
            </div>
            @endif
    
            <nav class="filter-nav">
                <ul class="filter-list">
                 
                        <li class="filter-item">
                            <a href="{{url('our-courses')}}" data-toggle="tooltip" title="All" class="filter-link main-btn btn-hover ">all</a>
                        </li>
                        @foreach ($Courses as $Courses)
                        @php
                            $Group = $Courses->GetGroupByDate();
                        @endphp
                        @if ($Group != false)
                            <li class="filter-item">
                                <a href="{{url('our-courses')}}/{{$Courses->id}}" data-card="cardTitle1" data-toggle="tooltip" title="{{$Courses->titel}}" class="filter-link main-btn btn-hover @if($Course->id == $Courses->id) active @endif">{{$Courses->titel}}</a>
                            </li>
                        @endif
                        @endforeach
                </ul>
            </nav>

            <section class="course-card">
                <div class="row">
                    <div class="col-lg-6">
                        <article id="cardTitle1" class="card">
                            <img src="{{ it()->url($Course->photo) }}" class="card-img-top" alt="{{$Course->titel}}">
                            <section class="card-body">
                                <div class="row no-gutters">
                                    <div class="col-md-6">
                                        @php
                                            $Group = $Course->GetGroupByDate();
                                        @endphp
                                        <p class="course-money">
                                            <i class="fas fa-money-bill-wave"></i> Price:<span> {{$Group->price}}</span> EGP for <span>{{$Group->sessions}}</span>
                                            session
                                        </p>
                                    </div>
                                    <div class="col-md-6">
                                        <p class="attend-number">
                                            <i class="fas fa-users"></i>Attends: <span>{{$Group->attends}}</span> trainees
                                        </p>
                                    </div>
                                    <div class="col-md-6">
                                        <p class="course-start-time">
                                            <i class="far fa-clock"></i> Duration: <span>{{$Group->duration_num}}</span> {{$Group->duration_dis}}(s)
                                        </p>
                                    </div>
                                    <div class="col-md-6">
                                        <p class="course-start-time">
                                            <i class="far fa-clock"></i>{!!$Group->time!!}
                                        </p>
                                    </div>
                                    <div class="col-12">
                                        <p class="course-start-date">
                                            <i class="far fa-clock"></i> starts at <time datetime="{{date('d M yy h:i a', strtotime($Group->strat_at))}}"> <span>{{date('d', strtotime($Group->strat_at))}}</span> {{date('M yy', strtotime($Group->strat_at))}} , <span class="time">{{date('h:i', strtotime($Group->strat_at))}}</span> {{date('a', strtotime($Group->strat_at))}}</time>
                                        </p>
                                    </div>
                                </div>
                            </section>
                        </article>
                    </div>
                    <div class="col-lg-6">
                        <article class="card course-details">
                            <section class="card-body">
                                <h3 class="card-title">{{$Course->titel}}</h3>
                                <p class="card-text">
                                    {!! $Course->des !!}
                                </p>
                                {{-- <ul class="course-list">
                                    <li>Lorem ipsum dolor, sit amet consectetur adipisicing elit.</li>
                                    <li>Lorem ipsum dolor, sit amet consectetur adipisicing elit.</li>
                                    <li>Lorem ipsum dolor, sit amet consectetur adipisicing elit.</li>
                                    <li>Lorem ipsum dolor, sit amet consectetur adipisicing elit.</li>
                                    <li>Lorem ipsum dolor, sit amet consectetur adipisicing elit.</li>
                                </ul> --}}
                            </section>
                        </article>
                    </div>
                    <div class="col-12">
                        <a href="{{url('/register')."?type=courses&id=".$Course->id."&group_id=".$Group->id}}" class="register main-btn btn-hover">register now</a>
                    </div>
                    <div class="col-12">
                        <p class="text-center" style="font-size: 20px"><span style="color: red; font-size: 1.2rem;">*</span> Lorem ipsum, dolor sit amet consectetur adipisicing elit. Et facilis </p>
                    </div>
                </div>
            </section>


        </div>
    </main>



        <!-- Header -->
    <!-- Free Lessons carousel section -->






@stop