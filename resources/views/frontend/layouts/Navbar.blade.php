
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <!-- Brand Logo -->
      
            <a class="navbar-brand" href="{{url('/')}}">
                <img src="{{ it()->url(setting()->logo) }}" alt="logo">
                @php
                 $sitename_en = explode(' ',trim(setting()->sitename_en));
                 $nameCount = count($sitename_en); // will print Test   
                @endphp
                <span>
                    @foreach ($sitename_en as $sitename_en)
                        @if ($loop->index == $nameCount-1)
                            {{$sitename_en}}
                        @else
                            {{$sitename_en}} <br>
                        @endif

                    @endforeach
                </span>
            </a>
              <!-- Toggle button in mobile and tablet-->
            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navLinks"
                aria-controls="navLinks" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"><i class="fa fa-bars"></i></span>
            </button>

            <!-- Nav Links -->
            <div class="collapse navbar-collapse" id="navLinks">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item {{active_link_f(null,'active')}}">
                        <a class="nav-link" href="{{url('/')}}">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item dropdown {{active_link_f('about-us','active')}}">
                        <a class="nav-link dropdown-toggle" href="#" id="aboutDropdown" role="button"
                            aria-haspopup="true" aria-expanded="false">
                            About
                        </a>
                        <div class="dropdown-menu" aria-labelledby="aboutDropdown">
                            <a class="dropdown-item @if (active_link_f(null,true)) internal-link @endif" href="@if (!active_link_f(null,true)){{url('/')}}@endif#discoverMe">Simple about</a>
                            <a class="dropdown-item {{active_link_f('about-us','active')}}" href="{{url('about-us')}}">Detailed about</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown {{active_link_f('our-courses','active')}} {{active_link_f('free-lessons','active')}}">
                        <a class="nav-link dropdown-toggle" href="#" id="coursesDropdown" role="button"
                            aria-haspopup="true" aria-expanded="false">
                            Courses
                        </a>
                        <div class="dropdown-menu " aria-labelledby="coursesDropdown">
                            <a class="dropdown-item @if (active_link_f(null,true)) internal-link @endif" href="@if (!active_link_f(null,true)){{url('/')}}@endif#ourCourses">Simple list</a>
                            <a class="dropdown-item {{active_link_f('our-courses','active')}}" href="{{url('our-courses')}}">courses details</a>
                            <a class="dropdown-item {{active_link_f('free-lessons','active')}}" href="{{url('free-lessons')}}"><span class="styled-link">free</span> lessons</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown {{active_link_f('product','active')}} {{active_link_f('experts-in','active')}}">
                        <a class="nav-link dropdown-toggle" href="#" id="productsDropdown" role="button"
                            aria-haspopup="true" aria-expanded="false">
                            Products
                        </a>
                        <div class="dropdown-menu" aria-labelledby="productsDropdown">
                            <a class="dropdown-item {{active_link_f('product','active')}}" href="{{url('product')}}">DISC products</a>
                            <a class="dropdown-item {{active_link_f('experts-in','active')}}" href="{{url('experts-in')}}">Experts in</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown {{active_link_f('events-details','active')}}">
                        <a class="nav-link dropdown-toggle" href="#" id="eventsProducts" role="button"
                            aria-haspopup="true" aria-expanded="false">
                            Events
                        </a>
                        <div class="dropdown-menu" aria-labelledby="eventsProducts">
                            <a class="dropdown-item @if (active_link_f(null,true)) internal-link @endif" href="@if (!active_link_f(null,true)){{url('/')}}@endif#simpleEvents">simple events</a>
                            <a class="dropdown-item {{active_link_f('events-details','active')}}" href="{{url('events-details')}}">all events</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if (active_link_f(null,true)) internal-link @endif" href="@if (!active_link_f(null,true)){{url('/')}}@endif#latestNews">news</a>
                    </li>
                    <li class="nav-item {{active_link_f('our-clients','active')}}">
                        <a class="nav-link " href="{{url('/our-clients')}}">our clients</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if (active_link_f(null,true)) internal-link @endif" href="@if (!active_link_f(null,true)){{url('/')}}@endif#getInTouch">contact us</a>
                    </li>
                    <li class="nav-item cart">
                        <a class="nav-link" href="{{url('cart')}}"><i class="fas fa-shopping-cart"></i><span class="product-number" id="product-number">{{CartCount()}}</span></a>
                    </li>
                </ul>
                
                {!! Form::open(['url'=>url('search'),'method'=>'post','id'=>'course','files'=>true,'class'=>'search-form ml-auto pb-4 p-lg-0']) !!}
                    <div class="form-group">
                        <input class="form-control search-bar mr-sm-2" type="search" name="trem" placeholder="Search" aria-label="Search">
                        <button class="search-btn" type="submit"><i class="fa fa-search"></i></button>
                    </div>
                {!! Form::close() !!}

                <button class="show-search-bar d-none d-lg-inline-block" type="button"><i class="fa fa-search"></i></button>
            </div>
        </div>
    </nav>
 