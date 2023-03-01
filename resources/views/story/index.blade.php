@extends('layouts.main.app')
@section('content')
<div class="container">

    <section class="feed_section pt-5 mt-5">
        <div class="feed_hero">
            <div class="cust_container-feed">
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
       <h1 class="feed_title my-5 my-sm-2">{{isset($request_tag) ? $request_tag:''}} Stories</h1>
        
        <div class="row" >
          <div class="col-12 px-4 col-md-10 offset-md-1 px-md-2 col-lg-10  col-xl-8 offset-xl-0" id="story-box">
                @foreach ($stories as $story)
                    <div class="card px-4 my-5 rounded-4">
                        <div class="row">
                            <div class="cover_img ">
                            @if($story->cover_photo()->count() > 0)
                            <img src="{{asset('storage/'.$story->cover_photo[0]->file)}}" alt="" class="horror py-4 story-card-img">
                            @else
                            <img src="{{asset('assets/img/feedstory/Rectangle.jpg')}}" alt="" class="horror py-4 story-card-img">
                            @endif
                            </div>
                            <div class="col-12 col-lg-6">
                                <h1 class="feedStory_title">
                                    {{$story->title}}
                                </h1>
                                <h5 class="my-lg-3 my-2 story-author"> {{$story->author->pen_name}}</h5>
                            </div>
                            <div class=" col-12 col-lg-5 offset-lg-1">
                              
                                @foreach ($story->tags(3) as $key=>$tag)
                                <p class="card-text cust_card-text d-inline text-capitalize">{{$tag->title}} 
                                    @if($key < (count($story->tags(3)) - 1)) 
                                        <span class="bi bi-dot story-slider-dot"> </span> 
                                    @endif
                                </p>
                                @endforeach
                            </div>
                        </div>
                
                   
                        <div class="row mt-lg-0 mt-3">
                            <div class="col-12 col-md-11 col-lg-12 feed_story">
                                @if($story->blurb)
                                    <?= substr($story->blurb, 0, 500) ?> ...
                                @else
                                    <?= substr($story->content, 0, 500) ?> ...
                                @endif
                                
                            </div>
                        </div>
                    
                        
                        <div class="row feed_stats-section mb-4" >
                            <div class="col-lg-6 col-12 col-md-6 story_stats d-flex d-lg-block">
                                <small class=""><i class="bi bi-book fs-6"></i> 6,000 Reads</small>
                                <small class="ms-3"><i class="bi bi-chat-left fs-6"></i> 200 Comments</small>
                                <small class="ms-3"><i class="bi bi-hand-thumbs-up fs-6"></i> 200 Likes</small>
                            </div>
                            
                            <div class="col-lg-5 col-12 offset-1 col-md-5 offset-md-1 mt-lg-0 mt-3 ms-0 mt-md-0  ms-lg-0 d-flex justify-content-end " >
                                <button onclick="loadMoreStories()">Loaed More</button>
                                 <a href="{{route('read-story', $story->slug)}}" class="ts-btn ts-btn-md ts-btn-primary" >Read</a>
                            </div>
                            
                        </div>
                    </div>
                @endforeach
                
                {{-- {{$stories->links()}} --}}
                <div class="d-flex justify-content-evenly">
                   <div class="next-btn">
                      <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                         <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                       </svg>
                   </div>
                   <div class="row justify-content-between align-self-center">
                      
                      <div class="col-1">
                        <div  class="next_page active_page" >
                            <p class="text-center one" >1</p>
                        </div>
                      </div>
                      <div class="col-1">
                        <div  class="next_page" onclick="makeActive()">
                            <p class="text-center one" >2</p>
                        </div>
                      </div>
                      <div class="col-1">
                        <div  class="next_page">
                            <p class="text-center one" >3</p>
                        </div>
                      </div>
                      <div class="col-1">
                        <div  class="next_page">
                            <p class="text-center one" >4</p>
                        </div>
                      </div>
                      <div class="col-1">
                        <div  class="next_page">
                            <p class="text-center one" >5</p>
                        </div>
                      </div>
                      <div class="col-1">
                        <div  class="next_page">
                            <p class="text-center one" >6</p>
                        </div>
                      </div>
                     
                   </div>
                   <div class="next-btn ">
                      <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                         <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                       </svg>
                   </div>
                </div>       
          </div>
            <div class="col-lg-9  mx-lg-auto mx-xl-0 offset-lg-1 col-md-8 offset-md-2 col-12 col-xl-4 reaction_card px-4 px-lg-0 px-xl-4 mt-lg-0 mt-3 mt-md-5 mt-lg-5">
               
                <div class="mt-lg-0 mt-4 ">
                   <div class="titles d-flex justify-content-between mb-4 mt-5">
                      <h3 class="popular">Popular Categories</h3>
                      <h5 class="ms-auto more">See more</h5>
                  </div>
                  @foreach($tags as $tag)
                   <div class="car popular_card mb-3" >
                    <a href="{{route('stories').'?tag='.$tag->slug}}" class="tag-link">
                        <div class="row g-0 justify-content-center ">
                          <div class="col-4">
                            <img src="{{asset('assets/img/tags/'.$tag->cover_photo)}}" class="img-fluid rounded-start popular_card-img " alt="Tag Smbol">
                          </div>
                          <div class="col-6 align-self-center ">
                            <div class="card-body  ms-4 ">
                              <h5 class="card-title">{{$tag->title}}</h5>
                              <p class="card-text mt-3">200 stories</p> 
                            </div>
                          </div>
                          <div class="col-2 align-self-center">
                            <span class="icon"> 
                               <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                                  <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                                </svg>
                            </span>
                          </div>
                        </div>
                    </a>
                        
                   </div>
                   @endforeach
                </div>
               
                <div class="mt-5">
                   <div class="titles d-flex justify-content-between">
                       <h3 class="popular my-3 my-sm-3 my-lg-5">See What People are Reading</h3>
                   </div>
                   <div class="custom_card border border-1 rounded-4 mb-4 px-3 py-4 ">
                      <div class="d-flex justify-content-between">
                         <div class="card-body feed-card" >
                            <h5 class="card-title">Kill Me Twice</h5>
                            <p class="card-text my-1">Harry Okonkwo</p> 
                         </div>
                         <div class="story_genre">
                            <span class="text-mut">
                               5 mins
                           </span><br>
                           <span class="text-mute">
                               sci-fi
                           </span>
                         </div>
                          
                          
                       </div>
                       
                   </div>
                   <div class="custom_card border border-1 rounded-4 mb-4 px-3 py-4 ">
                      <div class="d-flex justify-content-between">
                         <div class="card-body feed-card" >
                            <h5 class="card-title">Kill Me Twice</h5>
                            <p class="card-text my-1">Harry Okonkwo</p> 
                         </div>
                         <div class="story_genre">
                            <span class="text-mut">
                               5 mins
                           </span><br>
                           <span class="text-mute">
                               sci-fi
                           </span>
                         </div>
                          
                          
                       </div>
                       
                   </div>
                   <div class="custom_card border border-1 rounded-4 mb-4 px-3 py-4 ">
                      <div class="d-flex justify-content-between">
                         <div class="card-body feed-card" >
                            <h5 class="card-title">Kill Me Twice</h5>
                            <p class="card-text my-1">Harry Okonkwo</p> 
                         </div>
                         <div class="story_genre">
                            <span class="text-mut">
                               5 mins
                           </span><br>
                           <span class="text-mute">
                               sci-fi
                           </span>
                         </div>
                          
                          
                       </div>
                       
                   </div>
                   <div class="custom_card border border-1 rounded-4 mb-4 px-3 py-4 ">
                      <div class="d-flex justify-content-between">
                         <div class="card-body feed-card" >
                            <h5 class="card-title">Kill Me Twice</h5>
                            <p class="card-text my-1">Harry Okonkwo</p> 
                         </div>
                         <div class="story_genre">
                            <span class="text-mut">
                               5 mins
                           </span><br>
                           <span class="text-mute">
                               sci-fi
                           </span>
                         </div>
                          
                          
                       </div>
                       
                   </div>
                   <div class="custom_card border border-1 rounded-4 px-3 py-4 ">
                      <div class="d-flex justify-content-between">
                         <div class="card-body feed-card" >
                            <h5 class="card-title">Kill Me Twice</h5>
                            <p class="card-text my-1">Harry Okonkwo</p> 
                         </div>
                         <div class="story_genre">
                            <span class="text-mut">
                               5 mins
                           </span><br>
                           <span class="text-mute">
                               sci-fi
                           </span>
                         </div>
                          
                          
                       </div>
                       
                   </div>
                  
                   </div>
               </div>
               
            </div>
        
       
    </section>
</div>
<script>
    var pageCount = 2;
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

    const loadMoreStories = () => {
        const route = "{{route('more-story')}}";
        $.ajax({
            method:'get',
            url:route+'?page='+pageCount,
            success:function(response){
                console.log(response);
                // $('#story-box').html(`
                //     <div class="card px-4 my-5 rounded-4">
                //         <div class="row">
                //             <div class="cover_img ">
                //             @if($story->cover_photo()->count() > 0)
                //             <img src="{{asset('storage/'.$story->cover_photo[0]->file)}}" alt="" class="horror py-4 story-card-img">
                //             @else
                //             <img src="{{asset('assets/img/feedstory/Rectangle.jpg')}}" alt="" class="horror py-4 story-card-img">
                //             @endif
                //             </div>
                //             <div class="col-12 col-lg-6">
                //                 <h1 class="feedStory_title">
                //                     {{$story->title}}
                //                 </h1>
                //                 <h5 class="my-lg-3 my-2 story-author"> {{$story->author->pen_name}}</h5>
                //             </div>
                //             <div class=" col-12 col-lg-5 offset-lg-1">
                              
                //                 @foreach ($story->tags(3) as $key=>$tag)
                //                 <p class="card-text cust_card-text d-inline text-capitalize">{{$tag->title}} 
                //                     @if($key < (count($story->tags(3)) - 1)) 
                //                         <span class="bi bi-dot story-slider-dot"> </span> 
                //                     @endif
                //                 </p>
                //                 @endforeach
                //             </div>
                //         </div>
                
                   
                //         <div class="row mt-lg-0 mt-3">
                //             <div class="col-12 col-md-11 col-lg-12 feed_story">
                //                 @if($story->blurb)
                //                     <?= substr($story->blurb, 0, 500) ?> ...
                //                 @else
                //                     <?= substr($story->content, 0, 500) ?> ...
                //                 @endif
                                
                //             </div>
                //         </div>
                    
                        
                //         <div class="row feed_stats-section mb-4" >
                //             <div class="col-lg-6 col-12 col-md-6 story_stats d-flex d-lg-block">
                //                 <small class=""><i class="bi bi-book fs-6"></i> 6,000 Reads</small>
                //                 <small class="ms-3"><i class="bi bi-chat-left fs-6"></i> 200 Comments</small>
                //                 <small class="ms-3"><i class="bi bi-hand-thumbs-up fs-6"></i> 200 Likes</small>
                //             </div>
                            
                //             <div class="col-lg-5 col-12 offset-1 col-md-5 offset-md-1 mt-lg-0 mt-3 ms-0 mt-md-0  ms-lg-0 d-flex justify-content-end " >
                //                 <button onclick="loadMoreStories()">Loaed More</button>
                //                  <a href="{{route('read-story', $story->slug)}}" class="ts-btn ts-btn-md ts-btn-primary" >Read</a>
                //             </div>
                            
                //         </div>
                //     </div>
                // `);
                pageCount ++;
            },
            error:function(par1, par2, par3){
                alert(par3)
            }
        });
    }
</script>
@endsection