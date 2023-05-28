<div class="row">
    <div class="col-xl-9 col-sm-6">
       <h1 class="publication_title feed_title">{{$title}}</h1>
    </div>
    <div class="col-xl-3 col-sm-6 mt-3 text-sm-end d-none d-sm-block">
      <h1 class="publisher_name popular"><span><i class="bi bi-person "></i></span>{{auth()->user()->first_name.' '.auth()->user()->last_name}}</h1>
    </div>
 </div>
 <div class="row">
    <div class="col-sm-9">
      <div class="input-group mt-5">
        <input type="search" class="form-control search_input" id="" placeholder="Search">
        <div class="input-group-text bg-white custgrp_text">
          <span><i class="bi bi-search "></i></span>
        </div>
      </div>
    </div>
    <div class="col-sm-3 d-none d-sm-block">
      <div class="input-group mt-5">
        <input type="search" class="form-control filter_input" id="" placeholder="Filter">
        <div class="input-group-text bg-white custgrp_text">
            <span><i class="bi bi-funnel "></i></span>
        </div>

      </div>
    </div>
 </div>