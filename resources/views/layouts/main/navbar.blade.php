<header>
  <nav class="navbar navbar-expand-lg py-2 cust_nav fixed-top">
      <div class="container">
        <a class="navbar-brand cust__navbar-brand" href="{{route('home')}}"><img src="{{asset('assets/img/logo/logo_1.png')}}" alt="" style="width:150px; height:50px; object-fit:cover;"></a>
        @auth
          <div class="nav-item dropdown ms-auto me-3 d-lg-none">
            <a class="cust_nav-link nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <span class="d-lg-inline">
                @if(auth()->user()->is_writer && auth()->user()->cover_photo)
                  <img src="{{asset('storage/'.auth()->user()->cover_photo)}}" height="40" class="rounded-circle" alt="Avatar">
                @else
                  <img src="{{asset('assets/img/avatars/avatar.png')}}" height="40" class="rounded-circle" alt="Avatar">
                @endif
              </span> 
            </a>
            <ul class="dropdown-menu me-5 me-lg-0">
            
              <li><a class="dropdown-item" href="{{route('my-stories')}}">My Stories</a></li>
              <li><a class="dropdown-item" href="{{route('add-story-form')}}">Create a new story</a></li>
              <li><a class="dropdown-item" href="{{route('new-ticket')}}">Raise Ticket</a></li>
              <li><a class="dropdown-item text-danger" href="javascript::void()" onclick="logout()">Logout</a></li>
            </ul>
          </div>      
        @endauth
        

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
                    @foreach (genres() as $genre)
                        <li><a class="dropdown-item" href="{{ route('stories').'?genre='.$genre->slug}}">{{$genre->title}}</a></li>
                    @endforeach
                    
                  </ul>
                </li>
                <li class="nav-item">
                  <a class="cust_nav-link nav-link me-5 me-0 ms-lg-5" href="{{route('about')}}">About us</a>
                </li>
          </ul>
          @if(Auth::check() && Auth::user()->is_writer)
            
            <div class="nav-item dropdown ms-auto d-none d-lg-inline">
              <a class="cust_nav-link nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                @if(Auth::user()->cover_photo == null) 
                {{Auth::user()->pen_name}}
                <span class="d-lg-inline"><img src="{{asset('assets/img/avatars/avatar.png')}}" height="40" class="rounded-circle" alt="Avatar"></span>
                @else
                {{Auth::user()->pen_name}}
                <span class="d-lg-inline"><img src="{{asset('storage/'.Auth::user()->cover_photo)}}" height="40" class="rounded-circle" alt="Avatar"></span> 
                @endif
              </a>
              <ul class="dropdown-menu me-5 me-lg-0">
                <li><a class="dropdown-item" href="{{route('add-story-form')}}">Create a new story</a></li>
                <li><a class="dropdown-item" href="{{route('my-stories')}}">My Stories</a></li>
                <li><a class="dropdown-item" href="{{route('new-ticket')}}">Raise Ticket</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item text-danger" href="javascript::void()" onclick="logout()">Logout</a></li>
              </ul>
            </div>
          @elseif(Auth::check() && !Auth::user()->is_writer)
            <a href="{{ route('become-a-writer') }}" class="cust_btn-1 ms-auto" ><strong> Become a Writer</strong></a>
            <div class="nav-item dropdown ms-auto d-none d-lg-inline">
              <a class="cust_nav-link nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                {{Auth::user()->username}}
                <span class="d-lg-inline"><img src="{{asset('assets/img/avatars/avatar.png')}}" height="40" class="rounded-circle" alt="Avatar"></span> 
              </a>
              <ul class="dropdown-menu me-5 me-lg-0">
               
                <li><a class="dropdown-item" href="{{route('my-stories')}}">My Stories</a></li>
                <li><a class="dropdown-item" href="{{route('new-ticket')}}">Raise Ticket</a></li>
                <li><a class="dropdown-item text-danger" href="javascript::void()" onclick="logout()">Logout</a></li>
              </ul>
            </div>
          @else
          <div class="d-lg-flex ms-auto mt-4 mt-lg-0">
            <a href="{{ route('become-a-writer') }}" class="cust_btn-1 ms-auto me-2"> <strong> Become a Writer</strong></a>
            <br class="d-lg-none">
            <br class="d-lg-none">
            <a href="{{ route('login') }}" class="cust-btn-outline ms-auto" ><strong>Sign in</strong></a>
          </div>
            
          @endif
        </div>
      </div>
        
  </nav>
      
</header>