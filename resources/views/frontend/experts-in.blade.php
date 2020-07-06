@extends('frontend.index')
@section('content')



   <!-- Header -->
   <header class="experts-in-header" style="background-image: url('{{it()->url(setting()->experts_in_img)}}')">
    <div class="overlay"></div>
    <div class="container">
        <div class="header-wrapper">
            <h1 class="section-title"><span class="title">experts in</span></h1>
        </div>
        <div class=" social-links">
            <a class="facebook"  target="_blank" href="{{setting()->facebook}}"><i class="fab fa-facebook-f"></i></a>
            <a class="twitter"  target="_blank" href="{{setting()->twitter}}"><i class="fab fa-twitter"></i></a>
            <a class="instagram"  target="_blank" href="{{setting()->instagram}}"><i class="fab fa-instagram"></i></a>
            <a class="youtube"  target="_blank" href="{{setting()->youtube}}"><i class="fab fa-youtube"></i></a>
        </div>
    </div>
</header>

<!-- Experts in section -->

<section class="experts-in">
    <div class="container">
        <div class="row d-none d-sm-flex">
            @foreach ($Experts as $Expert)
                <div class="col-sm-6 col-md-4">
                    <article class="card">
                        <img class="card-img-top" src="{{ it()->url($Expert->photo) }}" alt="{{$Expert->title}}">
                        <section class="card-body">
                            <h3 class="card-title"><span class="title">{{$Expert->title}}</span></h3>
                            <p class="card-text">
                                {{$Expert->description}}
                            </p>
                        </section>
                    </article>
                </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-end">
            {{ $Experts->links() }}
        </div>
    </div>
</section>
  


   


@stop