<header>
  <nav class="navbar navbar-expand-lg py-4 cust_nav fixed-top">
      <div class="container">
        <a class="navbar-brand cust__navbar-brand" href="{{route('home')}}">Touching Storiez</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
          <ul class="navbar-nav cust_navbar-nav">
              <li class="nav-item dropdown">
                  <a class="cust_nav-link nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Browse
                  </a>
                  <ul class="dropdown-menu me-5 me-lg-0">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                  </ul>
                </li>
                <li class="nav-item">
                  <a class="cust_nav-link nav-link me-5 me-0 ms-lg-5" href="{{route('about')}}">About us</a>
                </li>
          </ul>
          @if(Auth::check() && Auth::user()->is_writer)
            
              <div class="nav-item dropdown ms-auto">
                  <a class="cust_nav-link nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <span><img src="{{asset('assets/img/avatars/avatar.png')}}" height="40" alt="Avatar"></span> {{Auth::user()->pen_name}}
                  </a>
                  <ul class="dropdown-menu me-5 me-lg-0">
                    <li><a class="dropdown-item" href="{{route('add-story-form')}}">Create a new story</a></li>
                    <li><a class="dropdown-item" href="#">My Profile</a></li>
                    <li><a class="dropdown-item" href="{{route('new-ticket')}}">Raise Ticket</a></li>
                    
                  </ul>
                </div>
          @elseif(Auth::check() && !Auth::user()->is_writer)
            <a href="{{ route('become-a-writer') }}" class="cust_btn-1 ms-auto" ><strong> Become a Writer</strong></a>
            <div class="nav-item dropdown ms-auto">
              <a class="cust_nav-link nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <span><img src="{{asset('assets/img/avatars/avatar.png')}}" height="40" alt="Avatar"></span> {{Auth::user()->username}}
              </a>
              <ul class="dropdown-menu me-5 me-lg-0">
               
                <li><a class="dropdown-item" href="#">My Profile</a></li>
                <li><a class="dropdown-item" href="{{route('new-ticket')}}">Raise Ticket</a></li>
                
              </ul>
            </div>
          @else
          <div class="d-flex ms-auto">
            <a href="{{ route('become-a-writer') }}" class="cust_btn-1 ms-auto me-2"> <strong> Become a Writer</strong></a>
            <a href="{{ route('login') }}" class="cust-btn-outline ms-auto" ><strong>Sign in</strong></a>
          </div>
            
          @endif
        </div>
      </div>
        
  </nav>
      
</header>