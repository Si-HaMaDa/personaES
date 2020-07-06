@extends('frontend.index')
@section('content')



            <!-- Search Page Section -->

    <section class="search-page">
        <div class="container">
            <h2 class="search-result-title"><span>Courses</span></h2>
            <section class="courses-results">
                @forelse ($Courses as $Course)
                    @php
                        $Group = $Course->GetGroupByDate();
                    @endphp
                    @if ($Group != false)
                        @php
                            $Group = $Course->GetGroupByDate();
                        @endphp

                        <article class="card">
                            <div class="card-wrapper row">
                                <div class="col-lg-3 card-left-img">
                                    <img class="card-img" src="{{ it()->url($Course->photo) }}" alt="productTitle">
                                </div>
                                <section class="col-lg-9 pt-3 pt-lg-0 card-bottom d-flex flex-column justify-content-around">
                                    <div>
                                        <a href="{{url('our-courses')}}/{{$Course->id}}">
                                            <h5 class="card-title">{{$Course->titel}}</h5>
                                            <p class="card-text">{!! $Course->mini_des !!}</p>
                                        </a>
                                    </div>
                                    <div class="row pt-3">
                                        <div class="col-lg-8">
                                            <p class="course-start-time">
                                                <i class="far fa-clock"></i> starts at<time datetime="{{date('d M yy h:i a', strtotime($Group->strat_at))}}"> <span>{{date('d', strtotime($Group->strat_at))}}</span> {{date('M yy', strtotime($Group->strat_at))}} , <span class="time">{{date('h:i', strtotime($Group->strat_at))}}</span> {{date('a', strtotime($Group->strat_at))}}</time>
                                            </p>
                                        </div>
                                        <div class="col-lg-4 d-flex justify-content-lg-end">
                                            <p class="price">{{$Group->price}} EGP</p>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </article>
                    @endif
                    
                    @empty
                     <p class="text-center" style="font-size: 1.6rem; font-weight:700">No Courses Found</p>
                        
                    @endforelse
                
            </section>
            <h2 class="search-result-title"><span>products</span></h2>
            <section class="products-results">
                @forelse ($Products as $Product)
                    <article class="card">
                        <div class="card-wrapper row">
                            <div class="col-lg-3 card-left-img">
                                <img class="card-img" src="{{ it()->url($Course->img) }}" alt="productTitle">
                            </div>
                            <section class="col-lg-9 pt-3 pt-lg-0 card-bottom d-flex flex-column justify-content-around">
                                <div>
                                    <a href="{{url('product')}}/{{$Product->id}}">
                                        <h5 class="card-title">{{$Product->title}}</h5>
                                        <p class="card-text">{!!$Product->min_des!!}</p>
                                    </a>
                                </div>
                                <p class="price pt-3 d-flex justify-content-lg-end">${{$Product->piece_price}}</p>
                            </section>
                        </div>
                    </article>
                @empty
                    <p class="text-center" style="font-size: 1.6rem; font-weight:700">No Product Found</p>
                @endforelse
            </section>
        </div>
    </section>





@stop