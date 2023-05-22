@extends('layouts.main.app')
@section('content')
<div class="container parent-container">

    <section class="feed_section pt-5">
        <div class="feed_hero row ">
            <div class="cust_container-feed col-12 col-md-8">
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
            <div class="col-md-4 mx-lg-auto mx-xl-0 col-12 reaction_card px-2 px-xl-4 mt-lg-0 mt-md-5 mt-lg-5 lg-right-bar d-none d-md-block">
                <div class="lg-right-bar-top-section">
                    <div class="titles d-flex justify-content-between mb-4 mt-2 px-2">
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
                                <p class="card-text mt-3">{{number_format($tag->stories_count)}} stories</p> 
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

                @if($stories->count() > 1)
                <div class="mt-3 px-2 lg-right-bar-lower-section">
                    <div class="titles d-flex justify-content-between">
                        <h3 class="popular my-3 my-sm-3 my-lg-5">See What People are Reading</h3>
                    </div>
                    @foreach($trending_stories as $trending)
                    <div class="custom_card border border-1 rounded-4 mb-4 px-3 py-4 ">
                        <div>
                            <div class="d-flex justify-content-between">
                                <div class="card-body feed-card" >
                                    <h5 class="card-title"> <a href="{{route('read-story', $trending->slug)}}">{{$trending->title}}</a> </h5>
                                </div>
                                <div class="story_genre">
                                    <span class="text-mut">
                                        {{$trending->reads_count}} reads
                                    </span>
                                    
                                </div>
                                
                            </div>
                        </div>
                        <div>
                            <div class="d-lg-flex justify-content-between">
                                <div class="card-body feed-card" >
                                    <p class="card-text my-1">{{$trending->author->pen_name}}</p> 
                                </div>
                                <div class="story_genre">
                                    
                                    <small class="text-mute" style="font-size:12px;">
                                        @foreach($trending->tags(2) as $t_key=>$t_tag)
                                            {{$t_tag->title}} @if($t_key < 1) &nbsp;<span class="bi bi-dot story-slider-dot"> </span>@endif
                                        @endforeach
                                        
                                    </small>
                                </div>
                                
                            </div>
                        </div>
                        
                        
                    </div>
                    @endforeach
                    
                    
                </div>
                @endif
            </div>
        </div>
    </section>
    <section class="story_detials position-relative">
        @isset($request_tag)
            <h1 class="feed_title my-5 my-sm-2">{{$request_tag}} Stories</h1>
        @endisset
        
        <div class="row position">
            <div class="col-12 px-4 col-md-8 px-md-2 offset-xl-0" id="story-box">
                @foreach($stories as $story)
                    <div class="card px-4 my-5 rounded-4" id="{{$story->slug}}">
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
                            <div class="col-12 feed_story">
                                <div>
                                    @if($story->blurb)
                                        <?= substr(strip_tags($story->blurb), 0, 200) ?> ...
                                    @else
                                        <?= substr(strip_tags($story->content), 0, 200) ?> ...
                                    @endif
                                </div>
                               
                            </div>
                        </div>
                    
                        
                        <div class="row feed_stats-section mb-4" >
                            <div class="col-12 col-md-9 story_stats">
                                <small class=""><i class="bi bi-book fs-6"></i> {{number_format($story->reads->count())}} Reads</small> 
                                
                                <small><i class="bi bi-clock fs-6 ms-3"></i>
                                    {{formatReadTimeCount($story->reads()->sum('time_spent'))}}
                                </small>
                                <small class="ms-3"><i class="bi bi-chat-left fs-6"></i> <span class="comment-count">{{($story->comments->count())}}</span> comments</small>
                            </div>
                            
                            <div class="col-12 col-md-3  mt-lg-0 mt-3 ms-0 mt-md-0" >
                                <a href="{{route('read-story', $story->slug)}}" class="ts-btn ts-btn-md ts-btn-primary" >Read</a>
                            </div>
                            
                        </div>
                    </div>
                @endforeach
                    
            </div>
           
                
        </div>
        
       
    </section>
</div>
<script>
    // initialise page count variable for laravel pagination to be used to fetch more stories using ajax
    var pageCount = 2;
    // save the intial value of the Y scroll distance
    var oldScrollY = window.scrollY;
    var scrolled = false;
    var more_exists = true;

    // function to load more stories using laravel pagination
    const loadMoreStories = () => {
        const urlSearchParams = new URLSearchParams(window.location.search);
        const params = Object.fromEntries(urlSearchParams.entries());
        let route = "{{route('more-story')}}";
        let url_params = [
            {
                key: "page",
                value: pageCount
            }
        ];

        for(x in params){
            url_params.push({key: x, value:params[x]});
        }
        // if(params.hasOwnProperty('tag')){
        //     url_params.push({key: "tag", value:params.tag});
             
        // }

        url_params.forEach((par, index)=>{
            route += index === 0 ? `?${par.key}=${par.value}` : `&${par.key}=${par.value}`;
        });
        console.log(route);
        // return;
        
        $.ajax({
            method:'get',
            url:route,
            success:function(response){
                // increment page count
                // pageCount = pageCount + 1;
                console.log(response);
                // loop thorugh retrieved data

                addStoryToDom(response.stories.data)
                
                if(response.stories.next_page_url != null){
                    splitNextPageURL= response.stories.next_page_url.split("?page=");
                    nextPageNumber = splitNextPageURL[1];
                    pageCount = nextPageNumber;
                    console.log(nextPageNumber)
                }else{
                    more_exists = false
                }
                
                
            },
            error:function(par1, par2, par3){
                console.log(par3)
            }
        });

    }

    const handleInfiniteScroll =  () => { 
        
        if(!scrolled){

            scrolled = true;
            // check if a downward scroll has occured
            if (oldScrollY < window.scrollY) {
                
                // check if we are close to the bottom of the story page
                const endOfPage = window.innerHeight + window.pageYOffset >= (document.querySelector('#story-box').offsetHeight)*0.8;
                if (endOfPage && more_exists) {  
                    loadMoreStories();
                }
                // update the vertical scroll offset
                oldScrollY = window.scrollY;
                // delay to prevent multiple scroll detection per time
                setTimeout(() => {
                    scrolled = false;
                }, 1000);
            }
        }
        
        
    };

    const addStoryToDom = (data) => {
        data.forEach(function(story, index){
            
            let cover_photo_url;
            // set cover photo to be displaed
            if(story.cover_photo.length > 0){
                cover_photo_url ="{{asset('storage/')}}/"+story.cover_photo[0].file;
            }else{
                cover_photo_url ="{{asset('assets/img/feedstory/Rectangle.jpg')}}";
            }
            // initialise variable for story tags (categories) elements
            let tagsParagraph =``;
            let dotsElement;
            let tags_count = story.tags.length <= 3 ? story.tags.length : 3;
            for (let i = 0; i < tags_count; i++) {

                if(i < (story.tags.length - 1)){
                    // the dots that demacates two storyy tags (categories)
                    dotsElement = `<span class="bi bi-dot story-slider-dot"> </span>`;
                }else{
                    dotsElement =``;
                }
                // update the variable value for story tags (categories) elements
                tagsParagraph += `<p class="card-text cust_card-text d-inline text-capitalize">${story.tags[i].title} ${dotsElement} </p>`; 
            }

            // initialise the story blurb variable
            let intro;
            // determine story blurb content and trim the characters to 200
            if(story.blurb == null){
                intro = story.content.replace( /(<([^>]+)>)/ig, '').slice(0, 200);
            }else{
                intro = story.blurb.replace( /(<([^>]+)>)/ig, '').slice(0, 200);
            }

            // url for story detail
            const story_url = "{{url('/story/')}}/"+story.slug;

            let story_read_time = story?.reads?.reduce((accumulator, object) => {
                                        return accumulator + object.time_spent;
                                    }, 0);
            story_read_time = formatReadTimeCount(story_read_time);
            // "formatReadTimeCount($story->reads()->sum('time_spent'))";
                                    
            $('#story-box').append(`
                <div class="card px-4 my-5 rounded-4"  id="${story.slug}">
                    <div class="row">
                        <div class="cover_img ">
                            <img src="${cover_photo_url}" alt="" class="horror py-4 story-card-img">
                        </div>
                        <div class="col-12 col-lg-6">
                            <h1 class="feedStory_title">${story.title} </h1>
                            <h5 class="my-lg-3 my-2 story-author"> ${story.author.pen_name}</h5>
                        </div>
                        <div class=" col-12 col-lg-5 offset-lg-1"> ${tagsParagraph}</div>
                    </div>
            
            
                    <div class="row mt-lg-0 mt-3">
                        <div class="col-12 col-lg-12 feed_story"> ${intro} </div>
                    </div>
                
                    
                    <div class="row feed_stats-section mb-4" >
                        

                        <div class="col-12 col-md-9 story_stats">
                            <small class=""><i class="bi bi-book fs-6"></i> ${story.reads.length} Reads</small> 
                            
                            <small><i class="bi bi-clock fs-6 ms-3"></i>
                                ${story_read_time}
                            </small>
                            <small class="ms-3"><i class="bi bi-chat-left fs-6"></i> <span class="comment-count">${story.comments.length}</span> comments</small>
                        </div>
                        
                        <div class="col-12 col-md-3  mt-lg-0 mt-3 ms-0 mt-md-0" >
                            <a href="${story_url}" class="ts-btn ts-btn-md ts-btn-primary" >Read</a>
                        </div>
                        
                    </div>
                </div>
            `);
            
        })
    }

    const handleLeftSideBarScroll = () => {
        // if (sideScrollY < window.scrollY) {
            var scrollHeight = window.pageYOffset
            // scrollDiff = window.pageYOffset - initialPoint
            // fixedDiv.style.marginBottom ='0px';
            // fixedDiv.style.marginTop = (scrollHeight-fixedDivHeight).toString()+"px";
            if(scrollHeight >= fixedDivHeight*0.65){
                fixedDiv.style.removeProperty('top')
                fixedDiv.style.position = 'fixed';
                fixedDiv.style.bottom = '0px';
            }else{
                fixedDiv.style.removeProperty('bottom')
                fixedDiv.style.position = 'absolute';
                fixedDiv.style.top = '0px';
            }
            sideScrollY= window.scrollY
        // }else{
            
           
        //     var scrollHeight = window.pageYOffset 
        //     fixedDiv.style.position = 'absolute';
        //     fixedDiv.style.top = (scrollHeight).toString()+"px";
        // }
        
        // initialPoint = 

        // container.addEventListener('scroll', function() {
           
        // });
    }

    var sideScrollY = window.scrollY;
    var container = document.querySelector('.parent-container');
    var fixedDiv = document.querySelector('.lg-right-bar');
    fixedDivHeight = getComputedStyle(fixedDiv).height
    // containerDivHeight = getComputedStyle(container).height
    
    fixedDivHeight = parseInt(fixedDivHeight.slice(0, -2));

    fixedDiv.style.removeProperty('bottom')
    fixedDiv.style.position = 'absolute';
    fixedDiv.style.top = '0px';
    window.addEventListener("scroll", handleInfiniteScroll, false);
    window.addEventListener("scroll", handleLeftSideBarScroll, false);

    // carousel for ad banner
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