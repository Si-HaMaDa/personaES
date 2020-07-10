    @if (!active_link_f(null,true))
  
    <!-- Our Numbers Section -->
    <section class="our-numbers">
        <div class="container-fluid">
            <div class="row d-none d-md-flex">
                <div class="our-number-item col-md-6 col-lg-3">
                    <i class="fas fa-users"></i>
                    <span class="number-value">{{setting()->trainees}}</span>
                    <span class="title">Trainees</span>
                </div>
                <div class="our-number-item col-md-6 col-lg-3">
                    <i class="fas fa-university"></i>
                    <span class="number-value">{{setting()->lectures}}</span>
                    <span class="title">Lectures</span>
                </div>
                <div class="our-number-item col-md-6 col-lg-3">
                    <i class="fas fa-globe"></i>
                    <span class="number-value">{{setting()->events}}</span>
                    <span class="title">Events</span>
                </div>
                <div class="our-number-item col-md-6 col-lg-3">
                    <i class="fas fa-user-tie"></i>
                    <span class="number-value">{{setting()->company}}</span>
                    <span class="title">Company</span>
                </div>
            </div>
            <div class="our-numbers-carousel d-md-none">
                <div class="our-number-item">
                    <i class="fas fa-users"></i>
                    <span class="number-value">{{setting()->trainees}}</span>
                    <span class="title">Trainees</span>
                </div>
                <div class="our-number-item">
                    <i class="fas fa-university"></i>
                    <span class="number-value">{{setting()->lectures}}</span>
                    <span class="title">Lectures</span>
                </div>
                <div class="our-number-item">
                    <i class="fas fa-globe"></i>
                    <span class="number-value">{{setting()->events}}</span>
                    <span class="title">Events</span>
                </div>
                <div class="our-number-item">
                    <i class="fas fa-user-tie"></i>
                    <span class="number-value">{{setting()->company}}</span>
                    <span class="title">Company</span>
                </div>
            </div>
        </div>
    </section>

    @endif 

    
    <!-- Get in touch section -->

    <section id="getInTouch" class="get-in-touch">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h2 class="fancy-title">get in touch</h2>
                    <div class="custom-border">
                        <span class="line"></span>
                        <span class="circle"></span>
                        <span class="line"></span>
                    </div>
                </div>
                <section class="contact-info col-md-6">
                    <h3 class="mt-0">personal information</h3>
                    <p>
                        {{setting()->personal_information}}
                    </p>
                    <address>
                        <p>
                            <a class="contact-link" href="http://maps.google.com/?q={{setting()->address}}" target="_blank"><i class="fas fa-map-marker-alt"></i>{{setting()->address}}</a>
                        </p>
                        <p>
                            <a class="contact-link" target="_blank" href="tel:{{setting()->phone}}"><i class="fas fa-phone"></i >(02)-{{setting()->phone}}
                            </a>
                        </p>
                        <p>
                            <a class="contact-link" href="mailto:{{setting()->email}}" target="_blank"><i class="far fa-envelope-open"></i>{{setting()->email}}</a><br>
                        </p>
                    </address>
                    <nav class="social-links">
                        <a class="social-link" target="_blank" href="{{setting()->facebook}}"><i class="fab fa-facebook-f"></i></a>
                        <a class="social-link" target="_blank" href="{{setting()->twitter}}"><i class="fab fa-twitter"></i></a>
                        <a class="social-link" target="_blank" href="{{setting()->instagram}}"><i class="fab fa-instagram"></i></a>
                        <a class="social-link" target="_blank" href="{{setting()->linkedin}}"><i class="fab fa-linkedin-in"></i></a>
                        <a class="social-link" target="_blank" href="{{setting()->youtube}}"><i class="fab fa-youtube"></i></a>
                    </nav>
                </section>            
                {!! Form::open(['url'=>url('/get-in-touch'),'files'=>true,'class'=>'col-md-6']) !!}
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <input type="text" value="{{old('name')}}" name="name" class="form-control" placeholder="Name">
                            </div>
                            <div class="col-md-6 form-group">
                                <input type="tel" value="{{old('phone')}}" name="phone" class="form-control" placeholder="Phone">
                            </div>
                            <div class="col-md-6 form-group">
                                <input type="email" value="{{old('email')}}" name="email" class="form-control" placeholder="Email">
                            </div>
                            <div class="col-md-6 form-group">
                                <input type="text" value="{{old('subject')}}" name="subject" class="form-control" placeholder="Subject">
                            </div>
                            <div class="col-12 form-group">
                                <textarea class="form-control" name="message" placeholder="Your Message" rows="6">{{old('message')}}</textarea>
                            </div>
                            <div class="col-md-6 form-group">
                                <button class="main-btn btn-hover" type="submit">Submit</button>
                            </div>
                        </div>
                {!! Form::close() !!}
            </div>
        </div>
    </section>

    <!-- Brands Carousel Section -->

    <section class="brandings">
        <div class="container">
            <div class="brands-carousel">
                @foreach ($Partners as $Partner)
                <div class="brand-item">
                    <img src="{{it()->url($Partner->logo)}}" alt="{{$Partner->name}}">
                </div>
                @endforeach
            </div>
        </div>
    </section>


    <!-- Footer -->
    <footer class="main-footer">
        <div class="container">
            <h2>{{trans('admin.persona_international')}}</h2>
            
            <nav class="navbar d-none d-lg-block">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="navbar-link " href="{{url('/')}}">home</a></li>
                    <li class="nav-item"><a class="navbar-link" href="{{url('/about-us')}}">about us</a></li>
                    <li class="nav-item"><a class="navbar-link" href="{{url('/our-courses')}}">courses</a></li>
                    <li class="nav-item"><a class="navbar-link" href="{{url('/product')}}">products</a></li>
                    <li class="nav-item"><a class="navbar-link" href="{{url('/events-details')}}">events</a></li>
                    <li class="nav-item"><a class="navbar-link" href="{{url('/experts-in')}}">experts in</a></li>
                    <li class="nav-item"><a class="navbar-link" href="{{url('/our-clients')}}">our clients</a></li>
                </ul>
     
            </nav>
            <p>
                
          


                <a href="{{url('/privacy-policy')}}">privacy policy</a> - <a href="{{url('/refund-policy')}}">Refund policy</a> - <a href="{{url('/legal-trademark')}}">lega trademark and copy rights</a> - <a href="{{url('/terms-use')}}">terms of use</a>
            </p>
            {{-- <p><a href="{{url('privacy-policy')}}">privacy policy</a> & <a href="{{url('refund-policy')}}">refund policy</a> </p> --}}
            <p>all right received 2020 <span><i class="far fa-heart"></i></span> scale team</p>
        </div>
    </footer>
    
    <div class="spinner-lode">
        <div class="multi-spinner-container">
            <div class="multi-spinner">
                <div class="multi-spinner">
                    <div class="multi-spinner">
                        <div class="multi-spinner">
                            <div class="multi-spinner">
                                <div class="multi-spinner">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Start scripts -->
    <!-- Jquery js file -->
    <script src="{{url('frontend')}}/dist/js/jquery-3.4.1.min.js"></script>
    <!-- popper js file -->
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <!-- Bootstrap js file -->
    <script src="{{url('frontend')}}/dist/js/bootstrap.min.js"></script>
    <!-- Font Awesome js file -->
    <script src="{{url('frontend')}}/dist/js/all.min.js"></script>
    <!-- Slick Js File -->
    <script src="{{url('frontend')}}/dist/js/slick.min.js"></script>
    <!-- Countup Plugin -->
    {{-- <script src="{{url('frontend')}}/dist/js/countUp.min.js"></script> --}}
    <!-- WOW JS -->
    <script src="{{url('frontend')}}/dist/js/wow.min.js"></script>
    <!-- Jquery Validate Plugin -->
    <script src="{{url('frontend')}}/dist/js/jquery.validate.min.js"></script>
    <!-- Card Plugin -->
    <script src="{{url('frontend')}}/dist/js/jquery.card.js"></script>
    <!-- Main app js file -->
    <!-- Main app js file -->
    <script src="{{url('frontend')}}/dist/js/app.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

    @if(session()->has('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: '{{ session('error') }}',
                // footer: '<a href>Why do I have this issue?</a>'
            })
        </script>
    @endif
    @if(count($errors->all()) > 0)
        <script>
            Swal.fire({
                icon: 'error',
                title: '{{  $errors->all()[0] }}',
                text: '{{  $errors->all()[0] }}',
                // footer: '<a href>Why do I have this issue?</a>'
            })
        </script>

        
    @endif
    @if(session()->has('errors'))

        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: '{{ session('error') }}',
                // footer: '<a href>Why do I have this issue?</a>'
            })
        </script>
    @endif
    @if(session()->has('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: '{{ session('success') }}',
                showConfirmButton: false,
                timer: 1500
            })
        </script>
    @endif


    @stack('js')

</body>
</html>