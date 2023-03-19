@extends('layouts.main.app')
@section('content')

<div class="container">
    <div id="alert-holder" class="alert-holder"></div>
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
                        
                        @guest
                            <div class=" icons reaction  not-liked" id="like">
                                <img src="{{asset('assets/img/readstory/thumbs-up.png')}}" alt="" class="thumbs">
                            </div>
                            <div class="icons ms-lg-5 ms-2 ms-md-4 ms-lg-3 reaction not-disliked" id="dislike">
                                <img src="../assets/img/readstory/thumbs-down.png" alt="" class="thumbs">
                            </div>
                        @else
                            {{-- This user has no like nor dislike for this story --}}
                        @if($story->current_user_like == null) 
                                <div class=" icons reaction  not-liked" id="like">
                                    <img src="{{asset('assets/img/readstory/thumbs-up.png')}}" alt="" class="thumbs">
                                </div>
                                <div class="icons ms-lg-5 ms-2 ms-md-4 ms-lg-3 reaction not-disliked" id="dislike">
                                    <img src="../assets/img/readstory/thumbs-down.png" alt="" class="thumbs">
                                </div>
                            {{-- This user has liked this story --}}
                            @elseif($story->current_user_like->like_type === 'positive')
                                <div class=" icons reaction liked" id="like">
                                    <img src="{{asset('assets/img/readstory/thumbs-up-filled.png')}}" alt="" class="thumbs">
                                </div>
                                <div class="icons ms-lg-5 ms-2 ms-md-4 ms-lg-3 reaction not-disliked" id="dislike" style="pointer-events:none">
                                    <img src="../assets/img/readstory/thumbs-down.png" alt="" class="thumbs">
                                </div>
                            {{-- This user has disliked this story --}}
                            @elseif($story->current_user_like->like_type === 'negative')
                                <div class=" icons reaction  not-liked" id="like" style="pointer-events:none">
                                    <img src="{{asset('assets/img/readstory/thumbs-up.png')}}" alt="" class="thumbs">
                                </div>
                                <div class="icons ms-lg-5 ms-2 ms-md-4 ms-lg-3 reaction disliked" id="dislike">
                                    <img src="../assets/img/readstory/thumbs-down-filled.png" alt="" class="thumbs">
                                </div>
                            @endif
                        @endguest
                        
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
                                        <small class="ms-3"><i class="bi bi-chat-left fs-6"></i> <span class="comment-count">{{($story->comments->count())}}</span> comments</small>
                                    </div>
                                    
                                    <div class="col-lg-6 col-12 offset-1 col-md-6 offset-md-1 mt-lg-0 mt-3 ms-0 mt-md-0  ms-lg-5" >
                                        <button type="button" class="cust-btn-outline  px-4" id="share-icon" data-bs-toggle="modal" data-bs-target="#shareModal"> <i class="bi bi-share"></i> Share</button>
                                        <button type="button" class="cust_btn-1 ms-lg-4 ms-5 px-4 px-md-2 px-lg-4 ms-md-2"  data-bs-toggle="modal" @auth data-bs-target="#commentModal" @else data-bs-target="#loginModal"  @endauth><i class="fa fa-comment"></i> Comment</button>
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
                    <div id="comment-holder" style="height:500px; overflow-y:scroll; border-bottom:2px solid #c5844d;">
                        @foreach($story->comments as $comment)
                        <div class="border rounded py-3 text-end comment-action-box" id="comment-action-box-{{$story->id}}">
                            
                            <div class="comment-action py-2 px-2"> 
                                <span class="edit-comment" target-input="comment-edit-input-{{$comment->id}}" target-comment="comment-item-{{$comment->id}}"> Edit <i class="fa fa-edit"></i></span>
                                &nbsp; &nbsp;&nbsp;
                                <span class="delete-comment">Remove <i class="fa fa-trash"></i></span>
                            </div>
                        </div>
                        <div class="custom_card border border-1 rounded-2 px-3 py-2 my-4 comment-item" id="comment-item-{{$comment->id}}">
                            <div class="d-flex justify-content-between">
                                <div class="card-title">
                                    {{$comment->user->username}} 
                                    @if($story->user_id === $comment->user_id) <small style="font-size: 10px;">Author</small>@endif
                                </div>
                                <small class="text-mut">
                                    {{$comment->created_at->diffForHumans()}} &nbsp; &nbsp;&nbsp; <span class="comment-action-toggle ms-3 three-dot" style="font-weight:normal;" ><i class="fa fa-ellipsis-v comment-action-toggle"></i></span>
                                </small>
                                
                            </div>
                            <div class="custom-card_text comment-text mt-2">{{stripslashes($comment->content)}} </div>
                        </div>
                        
                        
                        <div id="comment-edit-input-{{$comment->id}}" class="w-100 comment-edit-input">
                            <textarea name="" class="w-100">{{$comment->content}}</textarea>
                            <div>
                                <button class="btn ts-btn-primary-outline btn-sm cancel-edit-comment" target-input="comment-edit-input-{{$comment->id}}" target-comment="comment-item-{{$comment->id}}">Cancel</button>

                                <button class="btn ts-btn-primary btn-sm text-white update-comment-btn"  target-input="comment-edit-input-{{$comment->id}}" target-comment="comment-item-{{$comment->id}}" target-id="{{$comment->id}}" style="background-color:#FF8219;">Update</button>
                            </div>
                        </div>
                        @endforeach
                        
                    </div>
                    
                </div>
                <div class="mt-5">
                    <h3 class="text-capitalize reaction">similiar stories</h3>
                    <div style="height:500px; overflow-y:scroll; border-bottom:2px solid #c5844d;">
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
                        </div>
                   
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

  {{-- Share modal --}}
  <div class="modal fade" id="shareModal" tabindex="-1" aria-labelledby="shareModalLabel" aria-hidden="true" >
    <div class="modal-dialog modal-dialog-scrollable"  >
      <div class="modal-content modal-content-cust "  >
        <div class="modal-head d-flex">
          <h1 class="modal-titl  modal-center mx-auto my-3" id="shareModalLabel">Share</h1>
          <span type="button" class="btn-close close-x my-3" data-bs-dismiss="modal" aria-label="Close"></span>
        </div>
        <div class="modal-bod" >
          <div class="share-holder ts-border-2x pe-3 rounded">
            <ul class="share-list"> 
                {{-- <li>
                  <a href="#">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span class="fa fa-facebook"></span>
                  </a> 
                </li> --}}
            </ul>  
          </div>
        </div>
        <div class="modal-foote text-center">
          <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
          <button type="button" class="cust_btn-1 w-75 mx-auto my-4 share-btn" onclick="copyShareLink()"> <i class="fa fa-copy"></i> Copy Link</button>
        </div>
      </div>
    </div>
  </div>

  <!--Comment  Modal -->
  <div class="modal fade" id="commentModal" tabindex="-1" aria-labelledby="commentModalLabel" aria-hidden="true" >
    <div class="modal-dialog modal-dialog-scrollable"  >
      <div class="modal-content modal-content-cust "  >
        <div class="modal-head d-flex">
          <h1 class="modal-titl  modal-center mx-auto my-3" id="commentModalLabel">Comment</h1>
          <span type="button" class="btn-close close-x my-3" data-bs-dismiss="modal" aria-label="Close"></span>
        </div>
        <div class="modal-bod" >
          <textarea name="" id="comment" class="w-100 p-2 mt-3" rows="5" placeholder="Start typing" ></textarea>
        </div>
        <div class="modal-foote text-center">
          <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
          <button type="button" class="cust_btn-1 w-75 mx-auto my-4 comment-btn" onclick="validateComment()">Comment</button>
        </div>
      </div>
    </div>
  </div>


   <!--Delete Comment  Modal -->
   <div class="modal fade" id="deleteCommentModal" tabindex="-1" aria-labelledby="deleteCommentModalLabel" aria-hidden="true" >
    <div class="modal-dialog modal-dialog-scrollable"  >
      <div class="modal-content modal-content-cust "  >
        <div class="modal-head d-flex">
          <h1 class="modal-titl  modal-center mx-auto my-3" id="deleteCommentModalLabel">Delete Comment?</h1>
          <span type="button" class="btn-close close-x my-3" data-bs-dismiss="modal" aria-label="Close"></span>
        </div>
        <div class="modal-bod" >
          Are you sure you want to delete this comment ?
        <div class="modal-foote text-center">
            <button type="button" class="btn ts-btn-primary-outline" data-bs-dismiss="modal">No</button>
            <button type="button" class="cust_btn-ts-btn-primary mx-auto my-4 comment-btn" target-id="" onclick="DeleteComment(event)">Delete</button>
        </div>
      </div>
    </div>
  </div>

    <!-- login modal -->
    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true" >
        <div class="modal-dialog modal-dialog-scrollable"  >
            <div class="modal-content modal-content-cust "  >
                <div class="modal-header">
                    <h1 class="modal-titl  modal-center mx-auto my-3" id="loginModalLabel">Login</h1>
                    <span type="button" class="btn-close close-x my-3" data-bs-dismiss="modal" aria-label="Close"></span>
                </div>
                <div class="modal-bod" >
                    <small>Sign in to Storihom to interact with like-minds b sharing sharing your thoughts on the stories you read.
                    </small>
                    @if(count($errors) > 0)
                    <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                        @foreach ($errors->all() as $error)
                            {{ $error }}<br/>
                        @endforeach
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    <form action="{{route('sign-in')}}" class="row g-3 needs-validation " method="post" id="login-form">
                        @csrf
                        <div class="col- reg_input-div mt-lg-2 mt-3 mt-sm-2 post_input-div">
                            <div class="col- reg_input-div mt-1 mt-lg-0">
                                <label for="validationCustomUsername" class="form-label"></label>
                                <div class="input-group has-validation">
                                    <input type="email" id="email" name="email" class="form-control rounded-3 py-sm-2 py-1" placeholder="Email"  required>
                                </div>
                            </div>
                            <div class="col- reg_input-div mt-1 mt-lg-0">
                                <label for="validationCustomUsername" class="form-label"></label>
                                <div class="input-group has-validation">
                                    <input type="password" name="password" id="password" class="form-control rounded-3 py-sm-2 py-1 p-word" placeholder="Password" required>
                                    <span class="input-group-text eye" id="eye" onclick="togglePasswordReveal('eye', 'password')"><i class="bi bi-eye-slash"></i></span>
                                    <div class="invalid-feedback">
                                        Enter Password.
                                    </div>
                                </div>
                            </div>

                            <div class=" col my-lg-4  ">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                                    <label class="form-check-label " for="invalidCheck">
                                    <small>Not registered? <a type="button" href="javascript:void(0)"   data-bs-toggle="modal" data-bs-target="#registerModal" href="#">Sign up</a></small> 
                                    </label>
                                    
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-foote text-center">
                <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                <button type="button" class="cust_btn-1 w-75 mx-auto my-4 login-btn" onclick="validateLoginForm()">Login</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Register modal -->
    <div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true" >
        <div class="modal-dialog modal-dialog-scrollable"  >
            <div class="modal-content modal-content-cust "  >
                <div class="modal-header">
                    <h1 class="modal-titl  modal-center mx-auto" id="registerModalLabel">Register</h1>
                    
                    <span type="button" class="btn-close close-x" data-bs-dismiss="modal" aria-label="Close"></span>
                    
                </div>
                <div class="modal-bod " >
                    <small>Join Storihom community snd interact with like-minds b sharing sharing your thoughts on the stories you read.
                    </small>
                    @if(count($errors) > 0)
                    <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                        @foreach ($errors->all() as $error)
                            {{ $error }}<br/>
                        @endforeach
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    <form action="{{route('register')}}" class="row g-3 needs-validation " method="post" id="reg-form">
                        @csrf
                        <div class="col- reg_input-div mt-lg-2 mt-3 mt-sm-2 post_input-div">
                            <div class="col- reg_input-div mt-1 mt-lg-0">
                                <label for="validationCustomUsername" class="form-label"></label>
                                <div class="input-group has-validation">
                                    <input type="email" id="register-email" name="email" class="form-control rounded-3 py-sm-2 py-1" placeholder="Email"  required>
                                </div>
                            </div>
                            <div class="col- reg_input-div mt-1 mt-lg-0">
                                <label for="validationCustomUsername" class="form-label"></label>
                                <div class="input-group has-validation">
                                    <input type="text" id="username" name="username" class="form-control rounded-3 py-sm-2 py-1" placeholder="Username"  required>
                                </div>
                            </div>
                            <div class="col- reg_input-div mt-1 mt-lg-0">
                                <label for="validationCustomUsername" class="form-label"></label>
                                <div class="input-group has-validation">
                                    <input type="password" name="password" id="register-password" class="form-control rounded-3 py-sm-2 py-1 p-word" placeholder="Password" required>
                                    <span class="input-group-text eye" id="reg-eye" onclick="togglePasswordReveal('reg-eye', 'register-password')"><i class="bi bi-eye-slash"></i></span>
                                    <div class="invalid-feedback">
                                        Enter Password.
                                    </div>
                                </div>
                            </div>

                            <div class=" col my-lg-4  ">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                                    <label class="form-check-label " for="invalidCheck">
                                    <small>Already registered? <a type="button" href="javascript:void(0)"   data-bs-toggle="modal" data-bs-target="#loginModal" href="#">Login</a></small> 
                                    </label>
                                    
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-foote text-center">
                <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                <button type="button" class="cust_btn-1 w-75 mx-auto my-4 reg-btn" onclick="validateRegisterForm()">Login</button>
                </div>
            </div>
        </div>
    </div>

    @auth
        <script>
            $("#like").on('click', function(){
                let $this = $(this);

                $this.html(`<i class="fa fa-spin fa-spinner"></i>`);

                $.ajax({
                    type:"post",
                    url:"{{route('like-story', $story->slug)}}",
                    data:{
                        _token:universal_token,
                        user_id: "{{Auth::user()->id}}",
                        story_id: "{{$story->id}}",
                        like_type: "positive"
                    },
                    success: function(response){
                        if(response?.status === 'success'){
                            handleLike($this);
                        }
                    }
                });
                
            });

            $("#dislike").on('click', function(){
                let $this = $(this);

                $this.html(`<i class="fa fa-spin fa-spinner"></i>`);

                $.ajax({
                    type:"post",
                    url:"{{route('like-story', $story->slug)}}",
                    data:{
                        _token:universal_token,
                        user_id: "{{$user_id}}",
                        story_id: "{{$story->id}}",
                        like_type: "negative"
                    },
                    success: function(response){
                        if(response?.status === 'success'){
                            handleDislike($this);
                        }
                    }
                });
            });

            const handleLike = (ele)=>{
                if(ele.hasClass('not-liked')){

                    ele.addClass('liked');
                    ele.removeClass('not-liked');
                    ele.html(`<img src="{{asset('assets/img/readstory/thumbs-up-filled.png')}}" alt="" class="thumbs">`);
                    $("#dislike").css('pointer-events', 'none');
                }else{
                    ele.addClass('not-liked');
                    ele.removeClass('liked');
                    ele.html(`<img src="{{asset('assets/img/readstory/thumbs-up.png')}}" alt="" class="thumbs">`);
                    $("#dislike").css('pointer-events', '');
                }
            }

            const handleDislike =(ele)=>{
                if(ele.hasClass('not-disliked')){
                    
                    ele.addClass('disliked');
                    ele.removeClass('not-disliked');
                    ele.html(`<img src="{{asset('assets/img/readstory/thumbs-down-filled.png')}}" alt="" class="thumbs">`);
                    $("#like").css('pointer-events', 'none');
                }else{
                    ele.addClass('not-disliked');
                    ele.removeClass('disliked');
                    ele.html(`<img src="{{asset('assets/img/readstory/thumbs-down.png')}}" alt="" class="thumbs">`);
                    $("#like").css('pointer-events', '');
                }
            }

            const validateComment = () => {
                
                const submitBtn = document.querySelector(".comment-btn");
                const oldBtnHTML = submitBtn.innerHTML;
                setBtnLoading(submitBtn);

                const validation = runValidation([
                    {
                        id:"comment",
                        rules: {'required':true}
                    }
                    
                ]);

                if(validation === true){
                    submitComment(submitBtn, oldBtnHTML);
                    
                }else{
                    setBtnNotLoading(submitBtn, oldBtnHTML)
                }
            }

            const submitComment = (submitBtn, oldBtnHTML) => {
               $.ajax({
                    type:'post',
                    url:"{{route('story.add_comment', $story->slug)}}",
                    data:{
                        content: $('#comment').val(),
                        story_id: "{{$story->id}}",
                        _token: universal_token
                    },
                    success:function(response){
                        if(response?.status === 'success'){
                            // console.log(response)
                            updateCommentComponents(response.comments.data, response.comment_dates);
                        }else{
                            showAlert('danger', response?.message)
                        }
                        setBtnNotLoading(submitBtn, oldBtnHTML)
                    },
                    error:function(param1, param2, param3){
                        console.log(param3);
                        alert('something went wrong')
                    }
               })
            }

            const updateCommentComponents = (comments, comment_dates) =>{
                let commentElement = ``;
                comments.forEach((comment, index)=>{
                    commentElement += `
                    <div class="custom_card border border-1 rounded-2 px-3 py-2 my-4 comment-item">
                        <div class="d-flex justify-content-between">
                            <div class="card-title">
                                ${comment.user.username}
                            </div>
                            <small class="text-mut">
                                ${comment_dates[index]}
                            </small>
                            
                        </div>
                        <div class="custom-card_text mt-2">
                            ${comment.content}
                        </div>
                    </div>`;
                });

                $('#comment-holder').html(commentElement);
                $('.comment-count').text(comments.length)
                $('#comment').val('');
                $('#commentModal').modal('hide');
                
            }
        </script>
    @else
        <script>
            $("#like").on('click', function(){
                $('#loginModal').modal('show')
            });

            $("#dislike").on('click', function(){
                $('#loginModal').modal('show')
            });



            const validateLoginForm = () => {
                
                const submitBtn = document.querySelector(".login-btn");
                const oldBtnHTML = submitBtn.innerHTML;
                setBtnLoading(submitBtn);

                const validation = runValidation([
                    {
                        id:"email",
                        rules: {'required':true, 'email':true}
                    },
                    {
                        id:'password',
                        rules:{'required':true}
                    },
                    
                ]);

                if(validation === true){
                    submitLoginForm();
                    setBtnNotLoading(submitBtn, oldBtnHTML)
                }else{
                    setBtnNotLoading(submitBtn, oldBtnHTML)
                }
            }

            const submitLoginForm = () => {
                document.querySelector("#login-form").submit();
            }


            const validateRegisterForm = () => {
                
                const submitBtn = document.querySelector(".reg-btn");
                const oldBtnHTML = submitBtn.innerHTML;
                setBtnLoading(submitBtn);

                const validation = runValidation([
                    {
                        id:"register-email",
                        alias:"Email",
                        rules: {'required':true, 'email':true}
                    },
                    {
                        id:"username",
                        rules: {'required':true}
                    },
                    {
                        id:'register-password',
                        alias:"Password",
                        rules:{'required':true, "min_length":8}
                    },
                    
                ]);

                if(validation === true){
                    submitRegForm();
                    setBtnNotLoading(submitBtn, oldBtnHTML)
                }else{
                    setBtnNotLoading(submitBtn, oldBtnHTML)
                }
            }

            const submitRegForm = () => {
                document.querySelector("#reg-form").submit();
            }

        </script>
    @endauth
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

        @guest
            @if(count($errors) > 0)
                $('#loginModal').modal('show')
                $('#loginModal').modal('show')
            @endif
        @endguest

        // $('#shareModal').modal('show');

        const social_share = [
            {
                title:"facebook",
                color:"#4267B2",
                icon:"fa-facebook",
                url:"https://web.facebook.com/sharer/sharer.php?u="+window.location.href 
            },
            {
                title:"whatsapp",
                color:"#25D366",
                icon:"fa-whatsapp",
                url:"whatsapp://send?text="+window.location.href 
            },
            {
                title:"twitter",
                color:"#1DA1F2",
                icon:"fa-twitter",
                url:"https://twitter.com/share?url="+window.location.href 
            },
            {
                title:"linkedin",
                color:"#0072b1",
                icon:"fa-linkedin",
                url:"https://www.linkedin.com/shareArticle?mini=true&url="+window.location.href 
            },

        ]

        social_share.forEach(social=>{
            $(".share-list").append(`
            <li>
                <a href="${social.url}" target="_blank">
                <span style="background-color:${social.color};"></span>
                <span style="background-color:${social.color};"></span>
                <span style="background-color:${social.color};"></span>
                <span style="background-color:${social.color};"></span>
                <span class="fa ${social.icon}" style="background-color:${social.color};><i class="fa ${social.icon}"></i></span>
                </a> 
            </li>
            `);
        });

   
        @if(!Auth::check() || auth()->user()->id != $story->user_id)
            setTimeout(() => {
                $.ajax({
                    type: "post",
                    url: "{{route('record-story-read', $story->slug)}}",
                    data: {
                        browser_cookie: usercookie.token,
                        _token: universal_token
                    },
                    success:function(response){
                        console.log('success');
                    },
                    error:function(par1, par2, par3){
                        console.log(par3)
                    }
                });
            }, 10000);
        @endif

       

    });

    
    $(window).click(function() {
        $('.comment-action-box').hide();
    });

    $('.three-dot, .comment-action-box').each(function(){
        $(this).click(function(event){

            event.stopPropagation();

        });
    })
   

    $('.three-dot').each(function(){
        let $this = $(this);
        $this.on('click', function(){
           console.log($this.closest('.comment-item'))
            $this.closest('.comment-item').prev().show();
        })
        
    })

    $('.edit-comment').each(function(){
        let $this = $(this);
        $this.on('click', function(){
           $('#'+$this.attr('target-input')).show();
           $('#'+$this.attr('target-comment')).hide();
        })
    })

    $('.delete-comment').each(function(){
        let $this = $(this);
        $this.on('click', function(){
            $('#deleteCommentModal').modal('show');
        //    $('#'+$this.attr('target-input')).show();
        //    $('#'+$this.attr('target-comment')).hide();
        })
    })


    $('.cancel-edit-comment').each(function(){
        let $this = $(this);
        $this.on('click', function(){
           $('#'+$this.attr('target-input')).hide();
           $('#'+$this.attr('target-comment')).show();
        })
    })

     $('.update-comment-btn').each(function(){
        let $this = $(this);
        $this.on('click', function(){
            let targetInput =  $('#'+$this.attr('target-input'))
            let targetComment = $('#'+$this.attr('target-comment'))
            // console.log(targetInput.find('textarea')[0].value);
            updateComment($this.attr('target-id'), targetInput.find('textarea')[0].value, targetComment, targetInput)
            
        })
    })

    const updateComment = (comment_id, content, targetComment, targetInput) => {
        $.ajax({
            type:"post",
            url:"{{route('update-comment')}}",
            data:{
                id: comment_id,
                content: content,
                _token: universal_token
            },
            success:function(response){
                
                if(response.status === 'success'){
                    updateCommentElements(targetComment, targetInput)
                }else{
                    alert('Something went wrong');
                }
                
            },
            error:function(par1, par2, par3){
                console.log(par3)
            }
        });
    }

    const deleteComment = (comment_id) => {
        $.ajax({
            type:"post",
            url:"{{route('delete-comment')}}",
            data:{
                id: comment_id,
                _token: universal_token
            },
            success:function(response){
                return response.status;
            },
            error:function(par1, par2, par3){
                console.log(par3);
                return;
            }
        })
    }


    const updateCommentElements = (targetComment, targetInput) => {
        
        targetComment.show();
        let oldCommentDiv = targetComment.find('.comment-text');
        oldCommentDiv.each(function(){
            $(this).text(targetInput.find('textarea')[0].value)
        });
        
        targetInput.hide();
    }
    
    @if(!Auth::check() || auth()->user()->id != $story->user_id)
        const updateReadRecord = () => {
            $.ajax({
                type: "post",
                url: "{{route('update-read-record', $story->slug)}}",
                data: {
                    browser_cookie: usercookie.token,
                    _token: universal_token
                },
                success:function(response){
                    console.log('read time updated');
                },
                error:function(par1, par2, par3){
                    console.log(par3)
                }
            });
        }

        let recordInterval= setInterval(updateReadRecord, 60000);
        
        document.addEventListener("visibilitychange", () => {
            if(document.hidden){
                clearInterval(recordInterval);
            }else{
                recordInterval = setInterval(updateReadRecord, 60000);
            }
        });
    @endif



    const copyShareLink = () => {
        navigator.clipboard.writeText(window.location.href);
        alert("Story Link Copied");
    }    
</script>

@endsection