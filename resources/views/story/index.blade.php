@extends('layouts.main.app')
@section('content')
<div class="container-lg parent-container ">

    <section class="feed_section pt-5 ">
        <div class="feed_hero row " >
            <div class="col-12 col-md-8 " >
                {{-- @include('layouts.shared.ads') --}}

            </div>
            <div class="col-md-4 mx-lg-auto mx-xl-0 col-12 reaction_card px-2 px-xl-4 mt-lg-0 mt-md-5 mt-lg-5 lg-right-bar d-none d-md-block">
                
                @include('layouts.shared.categories')

                @if($stories->count() > 1)
                    @include('layouts.shared.trending')
                @endif
            </div>
        </div>
    </section>
    <section class="story_detials position-relative">
        @isset($request_tag)
            <h1 class="feed_title my-5 my-sm-2">{{$request_tag}} Stories</h1>
        @endisset
        
        <div class="row position">
            <div class="col-12 col-md-8 offset-xl-0" id="story-box">
                @foreach($stories as $story)
                <a href="{{route('read-story', $story->slug)}}" class="story-link">
                    <div class="card story-card px-4 mb-5 rounded-4 pt-3" id="{{$story->slug}}">
                        <div class="row story-card-inner">
                            <div class="col-lg-6  story-card-img" style="background-image: url('{{asset('storage/'.$story->cover_photo[0]->file)}}')"></div>
                            
                            <div class="col-12 col-lg-6 d-flex flex-column justify-content-center ">
                                <h1 class="feedStory_title mt-2 mt-lg-0">{{$story->title}} </h1>
                                <h5 class="my-lg-3 my-2 story-author"> {{$story->author->pen_name}}</h5>
                                
                                <div class="d-flex">
                                    @foreach ($story->tags(3) as $key=>$tag)
                                    <div class="card-text cust_card-text  text-capitalize d-flex align-items-center">{{$tag->title}} 
                                        @if($key < (count($story->tags(3)) - 1)) 
                                            <span class="bi bi-dot story-slider-dot"> </span> 
                                        @endif
                                    </div>
                                    @endforeach
                                </div>
                                    
                                <div class="col-12 feed_story">
                                    <div>
                                        @if($story->blurb)
                                            <?= substr(strip_tags($story->blurb), 0, 210) ?> ...
                                        @else
                                            <?= substr(strip_tags($story->content), 0, 210) ?> ...
                                        @endif
                                    </div>
                                
                                </div>
                            </div>
                            
                        </div>
                    
                        
                        <div class="row feed_stats-section mb-4" >
                            <div class="col-12 col-md-9 story_stats">
                                <small class=""><i class="bi bi-book fs-6"></i> {{number_format($story->reads->count())}} Reads</small> 
                                
                                {{-- <small><i class="bi bi-clock fs-6 ms-3"></i>
                                    {{formatReadTimeCount($story->reads()->sum('time_spent'))}}
                                </small> --}}
                                <small class="ms-3"><i class="bi bi-chat-left fs-6"></i> <span class="comment-count">{{($story->comments->count())}}</span> comments</small>
                            </div>
                            
                            {{-- <div class="col-12 col-md-3  mt-lg-0 mt-3 ms-0 mt-md-0" >
                                <a href="{{route('read-story', $story->slug)}}" class="ts-btn ts-btn-md ts-btn-primary" >Read</a>
                            </div> --}}
                            
                        </div>
                    </div>
                </a>
                @endforeach
                
            </div>
             
        </div>
        
       
    </section>
    {{-- @include('layouts.shared.mobile_categories') --}}
   
</div>
<script>
    
    // $('#trigger-mobile-search').on('click', toogleMobileRightSideBar);
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
                tagsParagraph += `<div class="card-text cust_card-text  text-capitalize d-flex align-items-center">${story.tags[i].title} ${dotsElement} </div>`; 
            }

            // initialise the story blurb variable
            let intro;
            // determine story blurb content and trim the characters to 200
            if(story.blurb == null){
                intro = story.content.replace( /(<([^>]+)>)/ig, '').slice(0, 210);
            }else{
                intro = story.blurb.replace( /(<([^>]+)>)/ig, '').slice(0, 210);
            }

            // url for story detail
            const story_url = "{{url('/story/')}}/"+story.slug;

            let story_read_time = story?.reads?.reduce((accumulator, object) => {
                                        return accumulator + object.time_spent;
                                    }, 0);
            story_read_time = formatReadTimeCount(story_read_time);
            // "formatReadTimeCount($story->reads()->sum('time_spent'))";
                                    
            $('#story-box').append(`
            <a href="${story_url}" class="story-link">
                <div class="card story-card px-4 mb-5 rounded-4 pt-3"  id="${story.slug}">
                    <div class="row story-card-inner">
                       
                        <div class="col-lg-6  story-card-img" style="background-image: url('${cover_photo_url}')"></div>
                        <div class="col-12 col-lg-6 d-flex flex-column justify-content-center ">
                            <h1 class="feedStory_title mt-2 mt-lg-0">${story.title} </h1>
                            <h5 class="my-lg-3 my-2 story-author"> ${story.author.pen_name}</h5>
                        
                            <div class=" d-flex"> ${tagsParagraph}</div>
                            <div class="col-12 feed_story">
                                <div>
                                ${intro}
                                </div>
                            </div>
                        </div>
                    </div>
                
                    
                    <div class="row feed_stats-section mb-4" >
                        

                        <div class="col-12 col-md-9 story_stats">
                            <small class=""><i class="bi bi-book fs-6"></i> ${story.reads.length} Reads</small> 
                            
                            <small class="ms-3"><i class="bi bi-chat-left fs-6"></i> <span class="comment-count">${story.comments.length}</span> comments</small>
                        </div>
                        
                    </div>
                </div>
            </a>
            `);
            
        })
    }

    const handleLeftSideBarScroll = () => {
            var scrollHeight = window.pageYOffset
            
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