@extends('layouts.main.app')
@section('content')
<script src="{{asset('assets/plugins/ckeditor5/build/ckeditor.js')}}"></script>
<script src="{{asset('assets/plugins/multi-select/dist/js/BsMultiSelect.min.js')}}"></script>

<div class="container-fluid">
    <section class="post_section" >
       <div class="row">
            <div class="col-lg-6 offset-lg-0 col-sm-10 offset-sm-1 px-sm-0 col-12 px-2" style="background-color: #f2f2f2;">
                <div class="post_img-container d-flex justify-content-center">
                    <img src="{{asset('assets/img/become/post.svg')}}" alt="novelist" class="post_hero-img align-self-center">
                </div>
            
            </div>
            <div class="col-12 col-sm-12 offset-sm-0 col-md-12 offset-md-0  col-lg-6 offset-lg-0 story-form-padding">
                <div class="post_reg">
                    <div class="row">

                        <div class=" col-lg-12 px-lg-4 col-md-8 col-sm-10 mx-sm-auto px-sm-0 col-12  offset-sm-1">
                            <h2 class="text-capitalize post_reg-title  text-lg-start  ">post a story</h2>
                            <p class="mt-lg-4 mt-md-3 mt-3 post_reg-subtitle  text-lg-start ">Upload a Cover Image</p>
                            <form action="{{route('add-story')}}" class="row g-3" method="post" id="story-form" enctype="multipart/form-data">
                                @csrf
                                <label for="inputTag"  style="height:100px; background-color:#F2F2F2; cursor:pointer;"  class="rounded text-center py-2 input_label">
                                    <span>
                                        <i class="bi bi-camera fa-2x"></i> <br>
                                        <small>Click here to upload</small>
                                    </span>
                                </label>
                                <div>
                                    <input type="file" name="cover_photo" id="inputTag" onchange="uploadCoverPhoto(event)"/>
                                </div>
                                <div class="text-danger backend-msg">
                                    @error('cover_photo')
                                        {{ $message }}
                                    @enderror
                                </div>
                                <div class="col- post_input-div">
                                    <label for="validationCustom01" class="form-label">Title</label>
                                    <input name="title" id="title" class="form-control rounded-3" placeholder="Title" value="{{ old('title') }}" required>
                                    <div class="text-danger backend-msg">
                                        @error('title')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                                <div class="col- post_input-div">
                                    <label for="" class="form-label">Genre</label>
                                    <select class="form-control" name="genre" id="genre">
                                        <option value="">Pick a Genre</option>
                                        @foreach ($categories as $category)
                                            <option value="{{$category->id}}" @if(old('category') && old('category') == $category->id) selected  @endif>{{$category->title}}</option>
                                        @endforeach
                                    </select>
                                    
                                    <div class="text-danger backend-msg">
                                        @error('category')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                                <div class="col- post_input-div">
                                    <label for="validationCustom02" class="form-label">Tags</label>
                                    <select class="js-example-basic-multiple  form-contro" name="tags[]" id="tags" multiple="multiple" style="width: 100%; border:2px solid grey!important;">
                                        
                                        @foreach ($tags as $tag)
                                            <option value="{{$tag->id}}" @if(old('tags') && old('tags') == $tag->id) selected  @endif>{{$tag->title}}</option>
                                        @endforeach
                                    </select>
                                    
                                    <div class="text-danger backend-msg">
                                        @error('tag')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="col- post_input-div">
                                    <label for="validationCustom03" class="form-label">Story Content</label>
                                    <input type="hidden" name="story" id="story">
                                    {{-- <textarea name="story" id="story" cols="30" rows="10" class="form-control rounded-3" placeholder="Write your story. . ." id="validationCustom03" required>{{old('story')}}</textarea> --}}
                                    <div id="toolbar" style="border:2px solid silver!important" class="rounded"></div>
                                    <div id="storyholder" style="min-height:200px; border:2px solid silver!important" class="rounded" onchange="alert('yes')">
                                        <p id="story-paragraph"></p>
                                    </div>
                                    <div class="invalid-feedback" >
                                        Please write a story.
                                    </div>
                                    <div class="text-danger backend-msg">
                                        @error('story')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            
                                
                                <div class="col- my-5">
                                <button class=" cust_btn-1 w-100 story-btn" type="button" onclick="validateStoryForm()">Post a Story</button>
                                </div>
                           
                            </form>
                        
                
                        </div>
                    </div>
                </div>
                
            </div>
       </div>
    </section>  
</div>

<script>

    // DecoupledEditor
    //     .create( document.querySelector( '#story' ) )
    //     .then( editor => {
    //         const toolbarContainer = document.querySelector( '#toolbar-container' );

    //         toolbarContainer.appendChild( editor.ui.view.toolbar.element );
    //     } )
    //     .catch( error => {
    //         console.error( error );
    //     } );
    

    const watchdog = new CKSource.EditorWatchdog();
			
    window.watchdog = watchdog;
    
    watchdog.setCreator( ( element, config ) => {
        return CKSource.Editor
            .create( element, config )
            .then( editor => {
                // Set a custom container for the toolbar.
                document.querySelector( '#toolbar' ).appendChild( editor.ui.view.toolbar.element );
                document.querySelector( '.ck-toolbar' ).classList.add( 'ck-reset_all' );
    
                return editor;
            } )
    } );
    
    watchdog.setDestructor( editor => {
        // Set a custom container for the toolbar.
        document.querySelector( '#toolbar' ).removeChild( editor.ui.view.toolbar.element );
    
        return editor.destroy();
    } );
    
    watchdog.on( 'error', handleError );
    
    watchdog
        .create( document.querySelector( '#storyholder' ), {
            
            licenseKey: '',   
            
        })
        .catch( handleError );
    
    function handleError( error ) {
        console.error( 'Oops, something went wrong!' );
        console.error( 'Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:' );
        console.warn( 'Build id: dv1ugghy32ul-ocbc2510mho0' );
        console.error( error );
    }



    const validateStoryForm = () => {

        // console.log()
        document.querySelector("#story").value = watchdog._data.main;
        // return;
        document.querySelectorAll(".backend-msg").forEach(function(field, index){
            field.innerHTML = '';
        })
        const submitBtn = document.querySelector(".story-btn");
        
        const oldBtnHTML = submitBtn.innerHTML;
        
        setBtnLoading(submitBtn);

        const validation = runValidation([
            
            {
                id:"title",
                rules: {'required':true, min_length:4}
            },
            {
                id:'tags',
                rules:{'required':true}
            },
            {
                id:"story",
                alias:"Story Content",
                rules: {'required':true, min_length:200}
            },
            {
                id:"genre",
                rules:{'required':true}
            },
            {
                id:"inputTag",
                alias:"Cover Photo",
                rules:{'required':true}
            }
            
            
        ]);

        if(validation === true){
            submitLoginForm();
        }else{
            setBtnNotLoading(submitBtn, oldBtnHTML)
        }
    }

    const submitLoginForm = () => {
        document.querySelector("#story-form").submit();
    }

   
    $("#tags").bsMultiSelect();

  
</script>


@endsection