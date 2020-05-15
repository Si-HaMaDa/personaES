    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
      <div class="container">
          <!-- Brand Logo -->
          <a class="navbar-brand" href="#">Logo</a>

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
                  <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="aboutDropdown" role="button"
                          aria-haspopup="true" aria-expanded="false">
                          About
                      </a>
                      <div class="dropdown-menu" aria-labelledby="aboutDropdown">
                          <a class="dropdown-item internal-link" href="#discoverMe">Simple about</a>
                          <a class="dropdown-item" href="about-us-details.html">Detailed about</a>
                      </div>
                  </li>
                  <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="coursesDropdown" role="button"
                          aria-haspopup="true" aria-expanded="false">
                          Courses
                      </a>
                      <div class="dropdown-menu" aria-labelledby="coursesDropdown">
                          <a class="dropdown-item internal-link" href="@if (!active_link_f(null,true)){{url('/')}}@endif#ourCourses">Simple list</a>
                          <a class="dropdown-item" href="#">courses details</a>
                          <a class="dropdown-item" href="#"><span class="styled-link">free</span> lessons</a>
                      </div>
                  </li>
                  <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="productsDropdown" role="button"
                          aria-haspopup="true" aria-expanded="false">
                          Products
                      </a>
                      <div class="dropdown-menu" aria-labelledby="productsDropdown">
                          <a class="dropdown-item" href="#">products list</a>
                          <a class="dropdown-item" href="#">DISC products</a>
                          <a class="dropdown-item" href="#">more products</a>
                      </div>
                  </li>
                  <li class="nav-item dropdown {{active_link_f('events-details','active')}}">
                      <a class="nav-link dropdown-toggle" href="#" id="eventsProducts" role="button"
                          aria-haspopup="true" aria-expanded="false">
                          Events
                      </a>
                      <div class="dropdown-menu" aria-labelledby="eventsProducts">
                          <a class="dropdown-item internal-link" href="@if (!active_link_f(null,true)){{url('/')}}@endif#simpleEvents">events quick view</a>
                          <a class="dropdown-item {{active_link_f('events-details','active')}}" href="{{url('events-details')}}">all events</a>
                      </div>
                  </li>
                  <li class="nav-item">
                      
                          
                      
                      <a class="nav-link internal-link" href="@if (!active_link_f(null,true)){{url('/')}}@endif#latestNews">news</a>
                          
                      
                  </li>
                  <li class="nav-item">
                      <a class="nav-link internal-link" href="@if (!active_link_f(null,true)){{url('/')}}@endif#ourTestimonials">testimonials</a>
                  </li>
                  <li class="nav-item dropdown mr-0">
                      <a class="nav-link dropdown-toggle" href="#" id="contactDropdon" role="button"
                          aria-haspopup="true" aria-expanded="false">
                          contact us
                      </a>
                      <div class="dropdown-menu" aria-labelledby="contactDropdon">
                          <a class="dropdown-item internal-link" href="#getInTouch">Simple contact</a>
                          <a class="dropdown-item" href="#">Detailed contact</a>
                      </div>
                  </li>
              </ul>
              <!-- <form>
                  <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                  <button class="search-btn" type="submit"><i class="fa fa-search"></i></button>
                  <button class="show-search-btn" type="button"><i class="fa fa-search"></i></button>
              </form> -->
          </div>
      </div>
  </nav>