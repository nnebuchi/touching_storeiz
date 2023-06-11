@include('layouts.shared.mobile_categories')
@include('layouts.shared.mobile_trending')
<footer>
    <section class="footer_section fixed-lg-bottom">
      <div class=" row footer_container ps-5 pe-1 pe-lg-5">
        <div class="col-12 col-lg-3  pt-2 pt-xl-2 pt-lg-0 px-4 px-lg-0 ">
          <a class="navbar-brand cust__navbar-brand" href="#">{{env("APP_NAME")}}</a>
        </div>
  
        <div class="navbar-nav flex-row col-12 col-lg-5 offset-lg-0  px-4 px-lg-0 ">
          <li class="nav-item">
            <a class="cust_nav-link nav-link ms-lg-5" href="#">Contact</a>
          </li>
          <li class="nav-item">
            <a class="cust_nav-link nav-link ms-lg-5 ms-2" href="#">Terms</a>
          </li>
          <li class="nav-item">
            <a class="cust_nav-link nav-link ms-lg-5 ms-2" href="#">Privacy</a>
          </li>
         
        </div>
  
        <div class="col-12 col-lg-4  pt-2 pt-xl-2  pt-lg-0 px-4 px-lg-0 text-lg-end">
          <p class="copyright">© {{env('APP_NAME')}}. <script>document.write(new Date().getFullYear());</script>.
          </p>
        </div>
      </div>
    </section>
   
    <section class="d-md-none py-2" id="bottom-nav">
        <div class="row">
          <div class="col"><a href="{{route('home')}}" class="text-white"><i class="fa fa-home"></i></a></div>
          <div class="col"><i class="fa fa-search" onclick="toogleMobileCategories()"></i></div>
          <div class="col"><i class="fa fa-bell" onclick="toogleMobileTrending()"></i></div>
          <div class="col"><i class="fa fa-envelope"></i></div>
        </div>
    </section>

    <div id="disable-page-overlay"></div>

  </footer>