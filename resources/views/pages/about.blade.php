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
                    @guest
                    <a href="{{route('stories')}}"  class="ts-btn-lg ts-btn-primary-outline ts-btn ">Sign Up</a>
                    @else
                    <a href="{{route('add-story-form')}}"  class="ts-btn-lg ts-btn-primary-outline ts-btn ">Start Writing</a>
                    @endguest
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
                                <span class="card-text  mt-2 mt-lg-0 ms-2 ms-md-0 ms-lg-0 "><small class="text-mute"> <span><i class="bi bi-book"></i></span> {{number_format($story->reads_count)}} Reads</small></span> 
                                <a href="{{route('read-story', $story->slug)}}" class="ts-btn-md ts-btn-primary ts-btn ms-lg-3 ms-xl-1 ms-sm-3 ms-md-0">Read</a>
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
     
        <h2 class="trending_hero-title text-center text-capitalize mt-1 mb-5">What can you do on {{env("APP_NAME")}} ?</h2>
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
                            <p class="faq_desc">Storihom is dedicated to preserving and promoting the art of storytelling. </p>
                            <p class="faq_desc">Founded on the fact that stories can never grow old even as they live with us from generations to generations, Storihom is set to educate, inform, transform, reform, entertain, support morals and exalt God the First and Highest Author. By sharing our experiences and perspectives through storytelling, Storihom connects people and inspire positive changes in the world. </p>
                            <p class="faq_desc">Discover a world of living imagination, adventure, and inspiration! Our stories will take you on a journey to distant lands, betroth you to real yet captivating characters and keep you on intrigue with twists and turns.</p>
                            <p class="faq_desc">We value diversity, creativity, and the transformative power of storytelling. 
                            Our platform features a range of writing genres, from fiction and nonfiction to memoir and drama. From classic tales to modern masterpieces, forklores, Bible stories, poems, we've got a story for every taste and interest whether you're in the mood for relaxation, a heartwarming romance, a thrilling mystery or exciting folktales. </p>
                            <p class="faq_desc">The best part? You can read our stories from anywhere, anytime! And with new stories added regularly, you'll never run out of exciting tales to explore.</p>

                            <p class="faq_desc"> Dive into our world of stories on spinning wheels today and experience the wonder of reading like never before.</p>   
                               
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
                            <p class="faq_desc">Are you one with storytelling? Are you a writer with an explosive passion and drill... with a pen that dances across the page? Do you dream of sharing your unique voice and captivating the hearts and minds of readers worldwide? If so, we have an exciting opportunity for you! You can build a good profile here on storihom. Upload your stories and get people enthralled, you can also direct your clients to your profile here. </p>
                            
                            <p class="faq_desc">Unleash your creativity now! Our platform is a haven for writers like you, providing the perfect canvas to paint your thoughts with words. You'll have the freedom to express your unique ideas, explore diverse genres and craft compelling narratives that resonate with readers.</p>
                            
                            <p class="faq_desc">Reach a global audience today! Your words deserve to be read by people from all corners of the globe. We offer a vast and engaged community of readers who are hungry for fresh perspectives and captivating stories that promotes Godliness and morals. Connect with them, build your fan-base and leave a lasting impact on readers around the world.

                            </p>

                            <p class="faq_desc">Expand your Imaginative horizons! Writing is a journey of growth and we are here to accompany you every step of the way. Engage in fruitful discussions with fellow writers, learn from industry experts and access valuable resources to enhance your skills. Our platform is a thriving ecosystem that nurtures your talent and encourages continuous development.
                            </p>
                            
                            <p class="faq_desc">You've got flexibility and convenience! We understand that writers have unique schedules and commitments. Our platform offers the flexibility to work at your own pace, allowing you to write whenever and wherever inspiration strikes. No more rigid office hours or mundane routines. Embrace the freedom to create on your terms.
                            </p>
                            <p class="faq_desc">Professional exposure is Key! In today's digital age, establishing an online presence is crucial for writers. By joining our platform, you gain access to a powerful promotional engine that boosts your visibility. Showcase your portfolio, receive endorsements from satisfied readers and attract exciting opportunities from publishers, media outlets, and potential clients.
                            </p>
                            <p class="faq_desc">Storihom is Supportive community! Writing can sometimes feel like a solitary endeavor, but not anymore. Our vibrant readers and writers stand as a pillar of support, camaraderie and inspiration. Connect with like-minded individuals, receive feedback on your work, and collaborate on exciting projects that push the boundaries of creativity.
                            </p>

                            
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
                                <p class="faq_desc">Our unique and moral-driven platform is a nest where creativity meets opportunity. Join us and unleash your writing prowess to earn while doing what you love. With our platform, you'll enjoy a multitude of benefits and endless possibilities to showcase your talent.
                                </p>
                                <p class="faq_desc">Earn more than what you deserve! We believe in rewarding talent. On our platform, your hard work and dedication translate into financial success. Unlock opportunities to monetize your writing through various avenues such as paid articles and collaborations. Your creativity becomes your currency.
                                </p>
                                <p class="faq_desc">Don't let your words go unnoticed in the abyss. Join our platform today and embark on a fulfilling writing journey that rewards your talent and amplifies your voice. It is time to earn while you write and make your mark in the literary world.
                                </p>

                                
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