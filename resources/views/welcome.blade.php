@extends('layouts.main.app')
@section('content')
<section class="hero_section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-xl-5 col-md-12 col-12 px-4">
                <div class="hero_text">
                    <h1 class="hero_title" >Short stories </h1>
                    <h2 class="hero_subtitle"> from the best writers and the widest  categories.</h2> 
                    <p class="hero_desc-text mt-3 d-none d-md-block">Browse through thousands of short stories from writers around the world. find what picks your fancy and dive in. Become a writer, share your work and earn while entertaining.</p>
                </div>
                <div class="hero_btns mt-4 d-lg-block d-md-flex">
                    <button class="cust_btn-2 px-lg-5"><a href="">Sign Up</a> </button>
                    <button class="cust_btn-1 ms-lg-5 ms-2 px-lg-4"><a href="">Start Reading</a></button>
                </div>
            </div>
            <div class="col-lg-6 col-xl-6 offset-xl-1 offset-lg-0 mt-lg-0 mt-4 px-4 px-lg-0">
                <img src="{{asset('assets/img/landing_page/hero-img.svg')}}" alt="" class="hero_img py-5 py-lg-0">
            </div>
        </div>
    </div>
</section>
<section class="trending_section" >
    <div class="trending_hero">
        <div class="cust-container">
            <h2 class="trending_hero-title text-center text-capitalize mt-1 mb-5">Trending now</h2>
            <div class="owl-carousel owl-theme">
                    <div class="item">
                        <div class="card mb-3" >
                            <div class="row g-0">
                              <div class="col-md-4 col-4">
                                <img src="{{asset('assets/img/landing_page/card-img-1.svg')}}" class="img-fluid rounded-start cust_card-img" alt="..." >
                              </div>
                              <div class="col-md-8 col-8">
                                <div class="card-body cust_card-body">
                                  <h5 class="card-title cust_card-title text-capitalize">seven seasons of horror</h5>
                                    <p class="card-text cust_card-text d-inline text-capitalize">Horror<span class="bi bi-dot"> </span></p>
                                    <p class="card-text cust_card-text d-inline ms-lg-4 ms-xl-0  ms-xl-0 text-capitalize">Humour<span class="bi bi-dot"></span></p>
                                    <p class="card-text cust_card-text d-inline ms-lg-4  ms-xl-0 text-capitalize">Cringe</p>
                                    <p class="card-text cust_card-tex mt-4">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quod, in? Lorem ipsum dolor sit amet </p>
                                  <div class=" card_btns d-flex flex-column-reverse d-md-flex flex-md-column-reverse   d-sm-flex flex-sm-row d-xl-block">
                                    <span class="card-text  mt-2 mt-lg-0 ms-2 ms-md-0 ms-lg-0 "><small class="text-mute"> <span><i class="bi bi-book"></i></span> 6,000 Reads</small></span> 
                                    <button class="cust_btn-1 ms-lg-3 ms-xl-1 ms-sm-3 ms-md-0"><a href="">Read</a></button>
                                  </div>
                                 
                                </div>
                              </div>
                            </div>
                        </div>
                    </div>
                <div class="item">
                    <div class="card mb-3" >
                        <div class="row g-0">
                          <div class="col-md-4 col-4">
                            <img src="{{asset('assets/img/landing_page/card-img-3.svg')}}" class="img-fluid rounded-start cust_card-img cust_card-unique" alt="..." >
                          </div>
                          <div class="col-md-8 col-8">
                            <div class="card-body cust_card-body">
                                <h5 class="card-title cust_card-title text-capitalize">lifetime</h5>
                                <p class="card-text cust_card-text d-inline text-capitalize">Erotic<span class="bi bi-dot"> </span></p>
                                <p class="card-text cust_card-text d-inline ms-lg-4 ms-xl-0  text-capitalize">romantic<span class="bi bi-dot"></span></p>
                                <p class="card-text cust_card-text d-inline ms-lg-4 ms-xl-0  text-capitalize">thriller</p>
                                <p class="card-text cust_card-tex mt-4">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quod, in? Lorem ipsum dolor sit amet </p>
                                <div class=" card_btns d-flex flex-column-reverse   d-md-flex flex-md-column-reverse d-sm-flex flex-sm-row d-lg-block ">
                                  <span class="card-text  mt-2 mt-lg-0 ms-2 ms-md-0 ms-lg-0  "><small class="text-mute"> <span><i class="bi bi-book"></i></span> 6,000 Reads</small></span> 
                                  <button class="cust_btn-1  ms-lg-3 ms-xl-1 ms-sm-3  ms-md-0 "><a href="">Read</a></button>
                                </div>
                               
                              </div>
                          </div>
                        </div>
                      </div>
                </div>
                <div class="item">
                    <div class="card mb-3" >
                        <div class="row g-0">
                          <div class="col-md-4 col-4">
                            <img src="{{asset('assets/img/landing_page/card-img-2.svg')}}" class="img-fluid rounded-start cust_card-img cust_card-unique" alt="..." >
                          </div>
                          <div class="col-md-8 col-8">
                            <div class="card-body cust_card-body">
                                <h5 class="card-title cust_card-title text-capitalize">Tears of the sun</h5>
                                <p class="card-text cust_card-text d-inline text-capitalize">Tragedy<span class="bi bi-dot"> </span></p>
                                <p class="card-text cust_card-text d-inline ms-lg-4 ms-xl-0  text-capitalize">Holocaust<span class="bi bi-dot"></span></p>
                                <p class="card-text cust_card-text d-inline ms-lg-4 ms-xl-0  text-capitalize">Cringe</p>
                                <p class="card-text cust_card-tex mt-4">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quod, in? Lorem ipsum dolor sit amet </p>
                                <div class=" card_btns d-flex flex-column-reverse  d-md-flex flex-md-column-reverse d-sm-flex flex-sm-row d-lg-block ">
                                  <span class="card-text  mt-2 mt-lg-0 ms-2 ms-md-0 ms-lg-0  "><small class="text-mute"> <span><i class="bi bi-book"></i></span> 6,000 Reads</small></span> 
                                  <button class="cust_btn-1  ms-lg-3 ms-xl-1 ms-sm-3  ms-md-0 "><a href="">Read</a></button>
                                </div>
                               
                              </div>
                          </div>
                        </div>
                      </div>
                </div>
                <div class="item">
                    <div class="card mb-3" >
                        <div class="row g-0">
                          <div class="col-md-4 col-4">
                            <img src="{{asset('assets/img/landing_page/card-img-3.svg')}}" class="img-fluid rounded-start cust_card-img" alt="...">
                          </div>
                          <div class="col-md-8 col-8">
                            <div class="card-body cust_card-body">
                                <h5 class="card-title cust_card-title text-capitalize">seven seasons of horror</h5>
                                <p class="card-text cust_card-text d-inline text-capitalize">Horror<span class="bi bi-dot"> </span></p>
                                <p class="card-text cust_card-text d-inline ms-lg-4 ms-xl-0  text-capitalize">Humour<span class="bi bi-dot"></span></p>
                                <p class="card-text cust_card-text d-inline ms-lg-4 ms-xl-0  text-capitalize">Cringe</p>
                                <p class="card-text cust_card-tex mt-4">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quod, in? Lorem ipsum dolor sit amet </p>
                                <div class=" card_btns d-flex flex-column-reverse  d-md-flex flex-md-column-reverse d-sm-flex flex-sm-row d-lg-block ">
                                  <span class="card-text  mt-2 mt-lg-0 ms-2 ms-md-0 ms-lg-0  "><small class="text-mute"> <span><i class="bi bi-book"></i></span> 6,000 Reads</small></span> 
                                  <button class="cust_btn-1  ms-lg-3 ms-xl-1 ms-sm-3  ms-md-0 "><a href="">Read</a></button>
                                </div>
                               
                              </div>
                          </div>
                        </div>
                      </div>
                </div>
                <div class="item">
                    <div class="card mb-3" >
                        <div class="row g-0">
                          <div class="col-md-4 col-4">
                            <img src="{{asset('assets/img/landing_page/card-img-3.svg')}}" class="img-fluid rounded-start cust_card-img" alt="...">
                          </div>
                          <div class="col-md-8 col-8">
                            <div class="card-body cust_card-body">
                                <h5 class="card-title cust_card-title text-capitalize ">seven seasons of horror</h5>
                                <p class="card-text cust_card-text d-inline text-capitalize">Horror<span class="bi bi-dot"> </span></p>
                                <p class="card-text cust_card-text d-inline ms-lg-4 ms-xl-0  text-capitalize">Humour<span class="bi bi-dot"></span></p>
                                <p class="card-text cust_card-text d-inline ms-lg-4 ms-xl-0  text-capitalize">Cringe</p>
                                <p class="card-text cust_card-tex mt-4">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quod, in? Lorem ipsum dolor sit amet </p>
                                <div class=" card_btns d-flex flex-column-reverse  d-md-flex flex-md-column-reverse d-sm-flex flex-sm-row d-lg-block ">
                                  <span class="card-text  mt-2 mt-lg-0 ms-2 ms-md-0 ms-lg-0  "><small class="text-mute"> <span><i class="bi bi-book"></i></span> 6,000 Reads</small></span> 
                                  <button class="cust_btn-1  ms-lg-3 ms-xl-1 ms-sm-3  ms-md-0 "><a href="">Read</a></button>
                                </div>
                               
                              </div>
                          </div>
                        </div>
                      </div>
                </div>
                <div class="item">
                    <div class="card mb-3">
                        <div class="row g-0">
                          <div class="col-md-4 col-4">
                            <img src="{{asset('assets/img/landing_page/card-img-3.svg')}}" class="img-fluid rounded-start cust_card-img" alt="...">
                          </div>
                          <div class="col-md-8 col-8">
                            <div class="card-body cust_card-body">
                                <h5 class="card-title cust_card-title text-capitalize">seven seasons of horror</h5>
                                <p class="card-text cust_card-text d-inline text-capitalize">Horror<span class="bi bi-dot"> </span></p>
                                <p class="card-text cust_card-text d-inline ms-lg-4 ms-xl-0  text-capitalize">Humour<span class="bi bi-dot"></span></p>
                                <p class="card-text cust_card-text d-inline ms-lg-4 ms-xl-0  text-capitalize">Cringe</p>
                                <p class="card-text cust_card-tex mt-4">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quod, in? Lorem ipsum dolor sit amet </p>
                                <div class=" card_btns d-flex flex-column-reverse  d-md-flex flex-md-column-reverse d-sm-flex flex-sm-row d-lg-block ">
                                  <span class="card-text  mt-2 mt-lg-0 ms-2 ms-md-0 ms-lg-0  "><small class="text-mute"> <span><i class="bi bi-book"></i></span> 6,000 Reads</small></span> 
                                  <button class="cust_btn-1  ms-lg-3 ms-xl-1 ms-sm-3  ms-md-0 "><a href="">Read</a></button>
                                </div>
                               
                              </div>
                          </div>
                        </div>
                      </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</section>
<section class="faq-section">
    <div class="container">
     
        <h2 class="trending_hero-title text-center text-capitalize mt-1 mb-5">What can you do on African Wattpad ?</h2>
        <div class="position-relative donut-container d-none d-md-block">
          <img src="{{asset('assets/img/landing_page/donuts.svg')}}" alt="" class="donuts">
          <img src="{{asset('assets/img/landing_page/donuts.svg')}}" alt="" class="donuts">
          <img src="{{asset('assets/img/landing_page/donuts.svg')}}" alt="" class="donuts">
          <img src="{{asset('assets/img/landing_page/donuts.svg')}}" alt="" class="donuts">
        </div>
        <div class="position-relative vector-container">
          <img src="{{asset('assets/img/landing_page/Vector 2.svg')}}" alt="" class="vector">
          <img src="{{asset('assets/img/landing_page/Vector 3.svg')}}" alt="" class="vector">
        </div>
        <div class="row what">
         
            <div class="col-12 px-4 col-md-4  col-lg-4 ">
                <div class="row">
                    <div class="col-3">
                        <h1 class="sn">1</h1> 
                    </div>
                    <div class="col-9">
                        <div class="d-inline">
                            <h2 class="faq_title">Read</h2>
                            <p class="faq_desc">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Molestias, excepturi! Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda, quasi?</p>
                        </div>
                    </div>
                </div>
               
               
            </div>
            <div class="col-12 px-4 col-md-4  col-lg-4">
                <div class="row">
                    <div class="col-12">

                        <img src="{{asset('assets/img/landing_page/thinking-face.svg')}}" alt="" class="faq_img">
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-3">
                        <h1 class="sn">2</h1> 
                    </div>
                    <div class="col-9">
                        <div class="d-inline">
                            <h2 class="faq_title">Write</h2>
                            <p class="faq_desc">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Molestias, excepturi! Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda, quasi?</p>
                        </div>
                    </div>
                </div>
            </div>
                <div class="col-12 px-4 col-md-4  col-lg-4 mt-5 mt-lg-0">
                    <div class="row">
                        <div class="col-3">
                            <h1 class="sn">3</h1> 
                        </div>
                        <div class="col-9">
                            <div class="d-inline">
                                <h2 class="faq_title">Earn</h2>
                                <p class="faq_desc">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Molestias, excepturi! Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda, quasi?</p>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</section>
@endsection