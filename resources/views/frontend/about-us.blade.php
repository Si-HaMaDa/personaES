@extends('frontend.index')
@section('content')
        <!-- Header -->

        
    <!-- Header -->
    <header class="about-me-header">
        <div class="container">
            <video autoplay loop>
                <source src="{{it()->url(setting()->about_video)}}" type="video/mp4" >
                Your browser does not support the HTML5 video.
            </video>
            <div class="header-wrapper">
                <h1 class="section-title"><span class="title">about us</span></h1>
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

    <!-- About us main section Sections -->

    <main class="section-wrapper about-us">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mb-5 m-lg-0 order-2 order-lg-1">
                    <section id="aboutMeDetails" class="about-me-details">
                        <nav class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" id="infoAboutMeTab" data-toggle="tab" data-image="#tabImage1" href="#infoAboutMe" role="tab"
                                aria-controls="infoAboutMe" aria-selected="true">info about me</a>
                            <a class="nav-item nav-link" id="infoAboutCompanyTab" data-toggle="tab" data-image="#tabImage2" href="#infoAboutCompany" role="tab"
                                aria-controls="infoAboutCompany" aria-selected="false">info about company</a>
                        </nav>
                        <section class="tab-content" id="nav-tabContent">
                            <section class="tab-pane fade show active" id="infoAboutMe" role="tabpanel" aria-labelledby="infoAboutMeTab">
                                <div class="accordion" id="infoAboutMe">
                                    <section class="card">
                                        <h2 class="card-header mb-0" id="infoHeading">
                                            <button class="card-btn" type="button" data-toggle="collapse" data-target="#info"
                                                aria-expanded="true" aria-controls="info">
                                                <i class="far fa-edit"></i> 
                                                info
                                                <span class="icon"></span>
                                            </button>
                                        </h2>

                           

                                
                                        <div id="info" class="collapse show" aria-labelledby="infoHeading" data-parent="#infoAboutMe">
                                            <div class="card-body">
                                                <p class="card-text">
                                                    {{setting()->about_info}}
                                                </p>
                                            </div>
                                        </div>
                                    </section>
                                    <section class="card">
                                        <h2 class="card-header mb-0" id="educationHeading">
                                            <button class="card-btn collapsed" type="button" data-toggle="collapse" data-target="#education" aria-expanded="false"
                                                aria-controls="education">
                                                <i class="fas fa-graduation-cap"></i>
                                                education
                                                <span class="icon"></span>
                                            </button>
                                        </h2>
                                      
                                        <div id="education" class="collapse" aria-labelledby="educationHeading" data-parent="#infoAboutMe">
                                            <div class="card-body">
                                                <p class="card-text">
                                                    <ul class="education-list">
                                                    @foreach(json_decode(setting()->about_education) as $key=>$education)
                                                          <li class="education-item">{{$education}}</li>
                                                    @endforeach
                                                    </ul>
                                                </p>
                                            </div>
                                        </div>
                                    </section>
                                    <section class="card">
                                        <h2 class="card-header mb-0" id="contactMeHeading">
                                            <button class="card-btn collapsed" type="button" data-toggle="collapse" data-target="#contactMe"
                                                aria-expanded="false" aria-controls="contactMe">
                                                <i class="fas fa-map-marker-alt"></i>
                                                contact Me
                                                <span class="icon"></span>
                                            </button>
                                        </h2>
                                    
                                        <div id="contactMe" class="contact-me collapse" aria-labelledby="contactMeHeading" data-parent="#infoAboutMe">
                                            <div class="card-body">
                                                <p class="card-text">
                                                    <address>
                                                        <p>
                                                            <a class="contact-link" href="http://maps.google.com/?q={{setting()->address}}"
                                                                target="_blank"><i class="fas fa-map-marker-alt"></i>{{setting()->address}}</a>
                                                        <p>
                                                            <a class="contact-link" href="tel:{{setting()->phone}}"><i class="fas fa-phone"></i> (02)-{{setting()->phone}}
                                                            </a>
                                                        </p>
                                                        </p>
                                                        <p>
                                                            <a href="https://api.whatsapp.com/send?phone={{setting()->whats_number}}">
                                                                <i class="fab fa-whatsapp"></i> {{setting()->whats_number}}
                                                            </a>
                                                        </p>
                                                        <p>
                                                            <a class="contact-link" href="mailto:{{setting()->email}}" target="_blank"><i class="far fa-envelope-open"></i> {{setting()->email}}</a><br>
                                                        </p>
                                                    </address>
                                                    <div class=" social-links">
                                                        <a class="facebook"  target="_blank" href="{{setting()->about_me_facebook}}"><i class="fab fa-facebook-f"></i></a>
                                                        <a class="twitter"  target="_blank" href="{{setting()->about_me_twitter}}"><i class="fab fa-twitter"></i></a>
                                                        <a class="instagram"  target="_blank" href="{{setting()->about_me_instagram}}"><i class="fab fa-instagram"></i></a>
                                                        <a class="youtube"  target="_blank" href="{{setting()->about_me_youtube}}"><i class="fab fa-youtube"></i></a>
                                            
                                                    </div>
                                                </p>
                                            </div>
                                        </div>
                                    </section>
                            </section>
                            
                  
                            <section class="tab-pane fade" id="infoAboutCompany" role="tabpanel" aria-labelledby="infoAboutCompanyTab">
                                <p class="card-text">
                                    {!!setting()->about_company!!}
                                </p>
                            </section>
                        </section>
                    </section>
                </div>
                <div class="col-lg-6 order-1 order-lg-2 mb-4 mb-lg-0">
                    <Section class="about-me-images">
                        <img id="tabImage1" class="fade show" src="{{it()->url(setting()->about_me_photo)}}" alt="about-us">
                        <img id="tabImage2" class="fade" src="{{it()->url(setting()->about_company_photo)}}" alt="about-us">
                    </Section>
                </div>
            </div>
        </div>
    </main>




@stop