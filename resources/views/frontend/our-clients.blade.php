@extends('frontend.index')
@section('content')

    <!-- Header -->
    <header class="our-clients-header" style="background-image: url('{{it()->url(setting()->our_clients_img)}}')">
        <div class="overlay"></div>
        <div class="container">
            <div class="header-wrapper">
                <h1 class="section-title"><span class="title">our clients</span></h1>
            </div>
            <div class="social-links">
                <a class="facebook"  target="_blank" href="{{setting()->facebook}}"><i class="fab fa-facebook-f"></i></a>
                <a class="twitter"  target="_blank" href="{{setting()->twitter}}"><i class="fab fa-twitter"></i></a>
                <a class="instagram"  target="_blank" href="{{setting()->instagram}}"><i class="fab fa-instagram"></i></a>
                <a class="youtube"  target="_blank" href="{{setting()->youtube}}"><i class="fab fa-youtube"></i></a>
            </div>
        </div>
    </header>

    <!-- Our Clients -->

    <section class="our-clients">
        <div class="container">
            <div class="row no-gutters d-none d-sm-flex">
                @foreach ($clients as $client)
                    <div class="col-sm-4 col-md-2">
                        <img src="{{ it()->url($client->logo) }}" alt="{{$client->name}}">
                    </div>
                @endforeach
                
            </div>
            <div class="our-clients-carousel d-sm-none">
                @foreach ($clients as $client)
                    <img src="{{ it()->url($client->logo) }}" alt="{{$client->name}}">
                @endforeach
            </div>
        </div>
    </section>
   


@stop