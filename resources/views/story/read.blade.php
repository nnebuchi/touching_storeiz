@extends('layouts.main.app')
@section('content')

<div class="container">

    <section class="read_section" >
        <div class="read_hero">
            <div class="cust_container-read">
                <div class="owl-carousel owl-theme ad-banner-carousel">
                     
                    <div class="item">
                       <div>
                           <img src="{{asset('assets/img/readstory/coca-cola.png')}}" class="img-fluid rounded-start readCust_card-img"  alt="..." style="max-height: 250px;">
                       </div>
                             
                    </div>
                    <div class="item">
                        <div>
                            <img src="{{asset('assets/img/readstory/coca-cola.png')}}" class="img-fluid rounded-start readCust_card-img"  alt="..." style="max-height: 250px;">
                        </div>
                    </div>
                    <div class="item">
                        <div>
                            <img src="{{asset('assets/img/readstory/coca-cola.png')}}" class="img-fluid rounded-start readCust_card-img"  alt="..." style="max-height: 250px;">
                        </div>
                    </div>
                </div>
            </div>
            </div>

    </section>
    <section class="story_detials">
        <div class="row" >
            <div class="col-12 px-4 col-md-10 offset-md-1 px-md-2 col-lg-10  col-xl-8 offset-xl-0  "  style="border-right:2px solid #EBD6C3;" >
                
                <div class="row">
                    <div class="cover_img">
                       @if($story->cover_photo()->count() > 0)
                        <img src="{{asset('storage/'.$story->cover_photo[0]->file)}}" alt="" class="horror py-4 story-card-img">
                        @else
                        <img src="{{asset('assets/img/feedstory/Rectangle.jpg')}}" alt="" class="horror py-4 story-card-img">
                        @endif
                    </div>
                  <div class="col-8">
                        <h1 class="story_title">
                            {{$story->title}}
                        </h1>
                        <h5 class="my-lg-4 my-2 author"><span class="text-muted">Author:</span> {{$story->author->pen_name}}</h5>
                    </div>
                    
                    <div class="col-3 offset-1 ">
                        <div class=" icons ">
                            <img src="../assets/img/readstory/thumbs-up.png" alt="" class="thumbs">
                        </div>
                        <div class=" icons ms-lg-5 ms-2 ms-md-4 ms-lg-3">
                              <img src="../assets/img/readstory/thumbs-down.png" alt="" class="thumbs">
                        </div>
                            
                        

                    </div>
                    
                </div>
                @if($story->blurb != null)
                <div class="row mt-2 mt-lg-4">
                    <div class="col-12 col-lg-10 col-xl-11">
                        <div class="row quote-row" >
                            <div class="col-2 col-lg-2  align-self-start">
                                <img src="../assets/img/readstory/double-quotes (2).png" alt="" class="quote">
                            </div>
                            <div class="col-8 col-lg-8  align-self-center quote_text">
                                <?=$story->blurb?>
                                

                            </div>
                            <div class="col-2 col-lg-2 align-self-end">
                                <img src="../assets/img/readstory/double-quotes (1).png" alt="" class="quote">

                            </div>
                        </div>
                        {{-- <div class="row" style="border-bottom:2px solid #EBD6C3;padding-bottom: 20px;">
                            <div class="col-12">
                                <p class="text-center quote_author"><b>-Kevin Aloma</b></p>
                            </div>
                        </div> --}}
                        

                    </div>
                </div>
                @endif
                
                <div class="row mt-2">
                    <div class="col-lg-11 col-12" >
                        <div class="row">
                            <div class="col-12 col-md-11 col-lg-12 full_story" style="font-family:Oswald-Regular!important;">
                                <?=$story->content ?>

                                <div class="row story_stats-section" style="border-bottom:2px solid #EBD6C3;padding-bottom: 40px;">
                                    <div class="col-lg-5 col-12 col-md-5 story_stats">
                                        <small class=""><i class="bi bi-book fs-6"></i> 6,000 Reads</small>
                                        <small class="ms-3"><i class="bi bi-chat-left fs-6"></i> 200 Comments</small>
                                    </div>
                                    
                                    <div class="col-lg-6 col-12 offset-1 col-md-6 offset-md-1 mt-lg-0 mt-3 ms-0 mt-md-0  ms-lg-5" >
                                            <button class="cust_btn-2  px-4"><a href="">Share</a> </button>
                                            <button class="cust_btn-1 ms-lg-4 ms-5 px-4 px-md-2 px-lg-4 ms-md-2"><a href="">Comment</a></button>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    
                    
                    </div>
                </div>
            </div>
            <div class="col-lg-9  mx-lg-auto mx-xl-0 offset-lg-1 col-md-8 offset-md-2 col-12 col-xl-4 reaction_card px-4 px-lg-0 px-xl-4 mt-lg-0 mt-3 mt-md-5 mt-lg-5">
                <div>

                    <div class="titles d-flex justify-content-between">
                        <h3 class="reaction">Reactions</h3>
                        <h5 class="ms-auto more">See more</h5>
                    </div>
                    <div class="custom_card border border-1 rounded-2 px-3 py-2 ">
                        <div class="d-flex justify-content-between">
                            <div class="card-title">
                                John Michael
                            </div>
                            <small class="text-mut">
                                2 days ago
                            </small>
                            
                        </div>
                        <div class="custom-card_text mt-2">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non incidunt expedita perspiciatis ullam id voluptatibus.
                        </div>
                    </div>
                    <div class="custom_card border border-1 rounded-2 px-3 py-2 my-4">
                        <div class="d-flex justify-content-between">
                            <div class="card-title">
                                John Michael
                            </div>
                            <small class="text-mut">
                                2 days ago
                            </small>
                            
                        </div>
                        <div class="custom-card_text mt-2">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non incidunt expedita perspiciatis ullam id voluptatibus.
                        </div>
                    </div>
                    <div class="custom_card border border-1 rounded-2 px-3 py-2 ny-4">
                        <div class="d-flex justify-content-between">
                            <div class="card-title">
                                John Michael
                            </div>
                            <small class="text-mut">
                                2 days ago
                            </small>
                            
                        </div>
                        <div class="custom-card_text mt-2">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non incidunt expedita perspiciatis ullam id voluptatibus.
                        </div>
                    </div>
                    <div class="custom_card border border-1 rounded-2 px-3 py-2 my-4">
                        <div class="d-flex justify-content-between">
                            <div class="card-title">
                                John Michael
                            </div>
                            <small class="text-mut">
                                2 days ago
                            </small>
                            
                        </div>
                        <div class="custom-card_text mt-2">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non incidunt expedita perspiciatis ullam id voluptatibus.
                        </div>
                    </div>
                </div>
                <div class="mt-5">
                    <h3 class="text-capitalize reaction">similiar stories</h3>
                    <div class="card similiar_card mb-3" >
                        <div class="row g-0">
                          <div class="col-4">
                            <img src="../assets/img/readstory/Rectangle_0.svg" class="img-fluid rounded-start similiar_card-img " alt="...">
                          </div>
                          <div class="col-8">
                            <div class="card-body">
                              <h5 class="card-title">Ben Did It</h5>
                              <p class="card-text">Harry Okonkwo</p> 
                            </div>
                          </div>
                        </div>
                      </div>
                    <div class="card similiar_card mb-3" >
                        <div class="row g-0">
                          <div class="col-4">
                            <img src="../assets/img/readstory/Rectangle_1.svg" class="img-fluid rounded-start similiar_card-img " alt="...">
                          </div>
                          <div class="col-8">
                            <div class="card-body">
                              <h5 class="card-title">Scream Louder</h5>
                              <p class="card-text">Harry Okonkwo</p> 
                            </div>
                          </div>
                        </div>
                      </div>
                    <div class="card similiar_card mb-3" >
                        <div class="row g-0">
                          <div class="col-4">
                            <img src="../assets/img/readstory/Rectangle_2.svg" class="img-fluid rounded-start similiar_card-img " alt="...">
                          </div>
                          <div class="col-8">
                            <div class="card-body">
                              <h5 class="card-title">Covenant Broken</h5>
                              <p class="card-text">Harry Okonkwo</p> 
                            </div>
                          </div>
                        </div>
                      </div>
                    <div class="card similiar_card mb-3" >
                        <div class="row g-0">
                          <div class="col-4">
                            <img src="../assets/img/readstory/Rectangle_3.svg" class="img-fluid rounded-start similiar_card-img " alt="...">
                          </div>
                          <div class="col-8">
                            <div class="card-body">
                              <h5 class="card-title">Whisper Once More</h5>
                              <p class="card-text">Harry Okonkwo</p> 
                            </div>
                          </div>
                        </div>
                      </div>
                    <div class="card similiar_card mb-3" >
                        <div class="row g-0">
                          <div class="col-4">
                            <img src="../assets/img/readstory/Rectangle_4.svg" class="img-fluid rounded-start similiar_card-img " alt="...">
                          </div>
                          <div class="col-8">
                            <div class="card-body">
                              <h5 class="card-title">Hi</h5>
                              <p class="card-text">Harry Okonkwo</p> 
                            </div>
                          </div>
                        </div>
                      </div>
                    
                </div>
                
                
                
            </div>
        </div>
        
    </section>
  </div>

  <script>
    $(document).ready(function() {
        $('.ad-banner-carousel').owlCarousel({
        loop: true,
        margin: 20,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
                loop: true,
            }
           
        }
        })
    })
</script>
@endsection