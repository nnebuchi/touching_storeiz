<div class="lg-right-bar-top-section pt-3 px-2">
    <form action="">
        <div class="input-group mb-3">
            <span class="input-group-text" id="search-element"><i class="fa fa-search"></i></span>
            <input type="text" class="form-control" id="search-input" placeholder="Search Storihom" aria-label="search" aria-describedby="search-element">
          </div>
    </form>
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