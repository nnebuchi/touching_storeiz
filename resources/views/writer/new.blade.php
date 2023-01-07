@extends('layouts.main.app')
@section('content')
<div class="container-fluid">

    <section class="become_section" >
      <div class="row">
        <div class="col-lg-6 offset-lg-0 col-sm-10 offset-sm-1 px-sm-0   col-12 px-4  ">
            <div class="img_container">
                    <img src="../assets/img/become/novelist.svg" alt="novelist" class="become_hero-img">
            </div>
          
        </div>
        <div class="col-12 col-sm-12 offset-sm-0 col-md-10 offset-md-1   col-lg-6 offset-lg-0 d-non">
            <div class="container">
              <div class="become_reg">
            
                  <div class="row">
                      <div class="col-lg-12 col-md-9 offset-md-1 mx-md-auto px-md-0 col-sm-12 px-sm-4 offset-sm-0  col-10 offset-1">
                        <h2 class="text-capitalize become_reg-title text-md-center text-lg-start  ">become a writer</h2>
                        <p class="mt-lg-4 mt-md-3 mt-3 become_reg-subtitle text-md-center text-lg-start ">Upload a Profile Picture 
                          </p>
                          <div class="text-danger" >
                            @error('cover_photo')
                              {{ $message }}
                            @enderror
                          </div>
                          <form action="{{ route('writer.new') }}" class="row g-3" method="post" enctype="multipart/form-data" >
                            @csrf
                            
                            <label for="inputTag" class="input_label">
                              
                              <span><i class=" fs-1 bi bi-camera"></i> <small class="" id="cover-upload-text">Click here to upload</small></span>
                            </label>
                            <input type="file" name="cover_photo" id="inputTag" onchange="uploadCoverPhoto(event)"/>

                              
                            <div class="col- input_div mt-lg-5 mt-3 mt-sm-5">
                              <label for="validationCustom01" class="form-label"></label>
                              <input type="text" name="first_name" class="form-control rounded-3 py-2" id="validationCustom01" placeholder="First name" @guest value="{{ old('first_name') }}" @endguest required>
                              <div class="text-danger" >
                                @error('first_name')
                                  {{ $message }}
                                @enderror
                              </div>
                            </div>
                            <div class="col- input_div">
                              <label for="validationCustom02" class="form-label"></label>
                              <input type="text" name="last_name" class="form-control rounded-3 py-2" id="validationCustom02" placeholder="Last name" @guest value="{{ old('last_name') }}" @endguest required>
                              <div class="text-danger" >
                                @error('last_name')
                                  {{ $message }}
                                @enderror
                              </div>
                            </div>
                            <div class="col- input_div">
                              <label for="validationCustomUsername" class="form-label"></label>
                              <div class="input-group has-validation">
                                <input type="text" name="pen_name" class="form-control rounded-3 py-2" id="validationCustomUsername" placeholder="Pen Name" aria-describedby="inputGroupPrepend" @guest value="{{ old('pen_name') }}" @endguest required>
                                
                              </div>
                              <div class="text-danger" >
                                @error('pen_name')
                                  {{ $message }}
                                @enderror
                              </div>
                            </div>
                            <div class="col- input_div">
                              <label for="validationCustomUsername" class="form-label"></label>
                              <div class="input-group has-validation">
                                <input type="email" name="email" class="form-control rounded-3 py-2" id="validationCustomUsername" placeholder="Email" aria-describedby="inputGroupPrepend" @guest value="{{ old('email') }}" @endguest required>
                                
                              </div>
                              <div class="text-danger" >
                                @error('email')
                                  {{ $message }}
                                @enderror
                              </div>
                            </div>
                            @guest
                            <div class="col- input_div">
                              <label for="validationCustomUsername" class="form-label"></label>
                              <div class="input-group ">
                                <input type="password" name="password" class="form-control rounded-start py-2" id="password" placeholder="Password" required minlength="8">
                                <span class="input-group-text rounded-end"  id="eye" onclick="togglePasswordReveal()"><i class="bi-eye"></i></span>
                                <div class="text-danger" >
                                  @error('password')
                                    {{ $message }}
                                  @enderror
                                </div>
                                {{-- <div class="invalid-feedback">
                                  Password must be 8 characters
                                </div> --}}
                              </div>
                            </div>
                            @endguest
                          
                            <div class="col- mt-2">
                              <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                                <label class="" for="invalidCheck">
                                  <small>I have read and accepted the <a href="#">terms and conditions</a> </small> 
                                </label>
                                <div class="invalid-feedback">
                                  Check this to proceed
                                </div>
                              </div>
                            </div>
                            
                            <div class="col- my-5">
                              <button class=" cust_btn-1 w-100" type="submit">Become a Writer</button>
                            </div>
                          </form>
                        
                
                      </div>
                  </div>
              </div>
                  
            </div>
        </div>
      </div>
    </section>
</div>

<script>
  function togglePasswordReveal(){

    const passwordInput = document.querySelector("#password");
    if(passwordInput.getAttribute("type") === 'text'){
      passwordInput.setAttribute("type", "password");
      document.querySelector("#eye").innerHTML = `<i class="bi-eye"></i>`;
    }else{
      passwordInput.setAttribute("type", "text");
      document.querySelector("#eye").innerHTML = `<i class="bi-eye-slash"></i>`;
    }

    }

    const uploadCoverPhoto = (event)=>{
      const file = event.target.files[0];
      const tempPath = URL.createObjectURL(file);
      // const styles = {
      //   backgroundImage: `url(${tempPath})`,
      //   color: 'white',
      //   height:'300px'
      // }
      document.querySelector('.input_label').style.backgroundImage = `url(${tempPath})`;
      document.querySelector('.input_label').style.color ='white';
      document.querySelector('.input_label').style.height ='300px';
      document.querySelector('.input_label').style.backgroundSize ='cover';
      
      // url('https://cdn.pixabay.com/photo/2022/01/08/19/51/christmas-tree-6924746_960_720.jpg'); height: 300px; background-size:cover; color:white;
    }
</script>
<script>
  (() => {
       'use strict'

       // Fetch all the forms we want to apply custom Bootstrap validation styles to
       const forms = document.querySelectorAll('.needs-validation')

       // Loop over them and prevent submission
       Array.from(forms).forEach(form => {
           form.addEventListener('submit', event => {
           if (!form.checkValidity()) {
               event.preventDefault()
               event.stopPropagation()
           }

           form.classList.add('was-validated')
           }, false)
       })
       })()
   </script>
<style>
  #cover-upload-text{
    position: absolute;
    margin-top:30px;
    margin-left: -75px;
  }
</style>
@endsection