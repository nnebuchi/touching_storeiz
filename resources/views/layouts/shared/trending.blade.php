<div class="mt-3 px-2 lg-right-bar-lower-section">
    <div class="titles d-flex justify-content-between">
        <h3 class="popular my-3 my-sm-3 my-lg-5">See What People are Reading</h3>
    </div>
    @foreach(trendingStories(7) as $trending)
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