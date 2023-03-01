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
                    <a href=""  class="ts-btn-lg ts-btn-primary-outline ts-btn ">Sign Up</a>
                    <a href="{{route('stories')}}"  class="ts-btn-lg ts-btn-primary ts-btn ms-lg-5 ms-2 "><strong>Start Reading</strong></a>
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
              @foreach ($stories as $story)
                <div class="item">
                    <div class="card mb-3" >
                        <div class="row g-0">
                        <div class="col-md-4 col-4">
                            <img src="{{asset('storage/'.$story->cover_photo[0]->file)}}" class="img-fluid rounded-start cust_card-img" alt="..." >
                        </div>
                        <div class="col-md-8 col-8">
                            <div class="card-body cust_card-body story-slider-card">
                            <h5 class="card-title cust_card-title text-capitalize">{{$story->title}}</h5>
                            @foreach ($story->tags(3) as $key=>$tag)
                                <p class="card-text cust_card-text d-inline text-capitalize">{{$tag->title}} 
                                    @if($key < (count($story->tags(3)) - 1)) 
                                        <span class="bi bi-dot story-slider-dot"> </span> 
                                    @endif
                                </p>
                            @endforeach
                                
                                
                                <p class="card-text cust_card-tex mt-4">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quod, in? Lorem ipsum dolor sit amet </p>
                            <div class=" card_btns d-flex flex-column-reverse d-md-flex flex-md-column-reverse   d-sm-flex flex-sm-row d-xl-block">
                                <span class="card-text  mt-2 mt-lg-0 ms-2 ms-md-0 ms-lg-0 "><small class="text-mute"> <span><i class="bi bi-book"></i></span> 6,000 Reads</small></span> 
                                <a href="" class="ts-btn-md ts-btn-primary ts-btn ms-lg-3 ms-xl-1 ms-sm-3 ms-md-0">Read</a>
                            </div>
                            
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
              @endforeach
               
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

<script>
    $(document).ready(function() {
        $('.owl-carousel').owlCarousel({
        loop: true,
        margin: 20,
        responsiveClass: true,
        responsive: {
            0: {
            items: 1,
            nav: true
            },
            375:{
            items: 1,
            nav: true,
            margin: 5
            },
            576:{
            items: 1,
            nav: true,
            margin: 5
            },
        
            768: {
            items: 2,
            nav: true
            },
            
        
            991: {
            items: 2,
            nav: true,
            loop: true,
            margin: 20
            },
        
            1000: {
            items: 3,
            nav: true,
            loop: true,
            margin: 20
            }
        }
        })
    })
</script>
@endsection