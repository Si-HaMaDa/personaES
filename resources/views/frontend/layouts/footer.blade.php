    <!-- Our Numbers Section -->
    <section class="our-numbers">
        <div class="container-fluid">
            <div class="row">
                <div class="our-number-item col-md-3 col-sm-6">
                    <i class="fas fa-users"></i>
                    <span class="number-value">{{setting()->trainees}}</span>
                    <span class="title">Trainees</span>
                </div>
                <div class="our-number-item col-md-3 col-sm-6">
                    <i class="fas fa-university"></i>
                    <span class="number-value">{{setting()->lectures}}</span>
                    <span class="title">Lectures</span>
                </div>
                <div class="our-number-item col-md-3 col-sm-6">
                    <i class="fas fa-globe"></i>
                    <span class="number-value">{{setting()->events}}</span>
                    <span class="title">Events</span>
                </div>
                <div class="our-number-item col-md-3 col-sm-6">
                    <i class="fas fa-user-tie"></i>
                    <span class="number-value">{{setting()->company}}</span>
                    <span class="title">Company</span>
                </div>
            </div>
        </div>
    </section>

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
                            <a class="contact-link" href="http://maps.google.com/?q={{setting()->address}}" target="_blank"><i class="fas fa-map-marker-alt"></i> {{setting()->address}}</a>
                        </p>
                        <p>
                            <a class="contact-link" href="tel:{{setting()->phone}}"><i class="fas fa-phone"></i >(02)-{{setting()->phone}}
                            </a>
                        </p>
                        <p>
                            <a class="contact-link" href="mailto:{{setting()->email}}" target="_blank"><i class="far fa-envelope-open"></i>{{setting()->email}}</a><br>
                        </p>
                    </address>
                    <nav class="social-links">
                        <a class="social-link" href="{{setting()->facebook}}"><i class="fab fa-facebook-f"></i></a>
                        <a class="social-link" href="{{setting()->twitter}}"><i class="fab fa-twitter"></i></a>
                        <a class="social-link" href="{{setting()->instagram}}"><i class="fab fa-instagram"></i></a>
                        <a class="social-link" href="{{setting()->linkedin}}"><i class="fab fa-linkedin-in"></i></a>
                        <a class="social-link" href="{{setting()->youtube}}"><i class="fab fa-youtube"></i></a>
                    </nav>
                </section>
                <form class="col-md-6">
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <input type="text" class="form-control" placeholder="Name">
                        </div>
                        <div class="col-md-6 form-group">
                            <input type="tel" class="form-control" placeholder="Phone">
                        </div>
                        <div class="col-md-6 form-group">
                            <input type="email" class="form-control" placeholder="Email">
                        </div>
                        <div class="col-md-6 form-group">
                            <input type="text" class="form-control" placeholder="Subject">
                        </div>
                        <div class="col-12 form-group">
                            <textarea class="form-control" placeholder="Your Message" rows="6"></textarea>
                        </div>
                        <div class="col-md-6 form-group">
                            <button class="main-btn btn-hover" type="submit">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- Brands Carousel Section -->

    <section class="slider brands-carousel">
        @foreach ($Partners as $Partner)
            <div class="brand-item">
                <img src="{{it()->url($Partner->logo)}}" alt="{{$Partner->name}}">
            </div>
        @endforeach

    </section>

    <!-- Footer -->
    <footer class="main-footer">
        <div class="container">
            <h2>persona international</h2>
            <nav class="navbar">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="navbar-link internal-link" href="#topPanel">home</a></li>
                    <li class="nav-item"><a class="navbar-link internal-link" href="#discoverMe">about</a></li>
                    <li class="nav-item"><a class="navbar-link internal-link" href="#ourCourses">courses</a></li>
                    <li class="nav-item"><a class="navbar-link" href="#">products</a></li>
                    <li class="nav-item"><a class="navbar-link internal-link" href="#">events</a></li>
                    <li class="nav-item"><a class="navbar-link internal-link" href="#latestNews">news</a></li>
                    <li class="nav-item"><a class="navbar-link internal-link" href="#simpleEvents">testimonials</a></li>
                    <li class="nav-item"><a class="navbar-link internal-link" href="#getInTouch">contact us</a></li>
                </ul>
            </nav>
            <p>privacy policy & refound policy </p>
            <p>all right received 2020 <span><i class="far fa-heart"></i></span> scale team</p>
        </div>
    </footer>

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
    <!-- Main app js file -->
    <script src="{{url('frontend')}}/dist/js/app.js"></script>


    @stack('js')

</body>
</html>