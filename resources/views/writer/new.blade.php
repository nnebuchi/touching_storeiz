@extends('layouts.main.app')
@section('content')
<div class="container-fluid">

    <section class="become_section" >
      <div class="row">
        <div class="col-md-6 offset-md-0 col-sm-5 offset-sm-0 px-sm-0 col-12 px-4 bg-grey-5 become-left d-none d-sm-block bg-grey">
            <div class="img_container d-flex justify-content-center become-bg" >
                <img src="../assets/img/become/novelist.svg" alt="novelist" class="become_hero-img">
            </div>
          
        </div>
        <div class="col-12 col-sm-7 offset-sm-0 col-md-6 offset-md-0 d-non py-5 py-lg-0" style="heigh:100%">
            <div class="containe">
              <div class="become_reg">
                  <div class="row">
                      <div class="col-lg-12 mx-md-auto px-md-3 col-sm-12 px-sm-4 offset-sm-0  col-10 offset-1">
                        <h2 class="text-capitalize become_reg-title text-md-center text-lg-start">become a writer</h2>
                        <p class="mt-lg-4 mt-md-3 mt-3 become_reg-subtitle text-md-center text-lg-start ">Upload a Profile Picture 
                          </p>
                          <div class="text-danger" >
                            @error('cover_photo')
                              {{ $message }}
                            @enderror
                          </div>
                          <form action="{{ route('writer.new') }}" class="row g-3" method="post" enctype="multipart/form-data" id="writer-form">
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

                              
                            <div class="col- input_div mb-2 mt-lg-2 mt-3 mt-sm-5">
                              <label for="validationCustom01" class="form-label"></label>
                              <input type="text" name="first_name" class="form-control rounded-3 py-2" id="first_name" placeholder="First name" @guest value="{{ old('first_name') }}" @endguest required>
                              <div class="text-danger" >
                                @error('first_name')
                                  {{ $message }}
                                @enderror
                              </div>
                            </div>
                            <div class="col- input_div mb-2">
                              <label for="validationCustom02" class="form-label"></label>
                              <input type="text" name="last_name" class="form-control rounded-3 py-2" id="last_name" placeholder="Last name" @guest value="{{ old('last_name') }}" @endguest required>
                              <div class="text-danger" >
                                @error('last_name')
                                  {{ $message }}
                                @enderror
                              </div>
                            </div>
                            <div class="col- input_div mb-2">
                              <label for="validationCustomUsername" class="form-label"></label>
                              <div class="input-group has-validation">
                                <input type="text" name="pen_name" class="form-control rounded-3 py-2" id="pen_name" placeholder="Pen Name" aria-describedby="inputGroupPrepend" @guest value="{{ old('pen_name') }}" @endguest required>
                                
                              </div>
                              <div class="text-danger" >
                                @error('pen_name')
                                  {{ $message }}
                                @enderror
                              </div>
                            </div>
                            <div class="col- input_div mb-2">
                              <label for="validationCustomUsername" class="form-label"></label>
                              <div class="input-group has-validation">
                                <input type="email" name="email" class="form-control rounded-3 py-2" id="email" placeholder="Email" aria-describedby="inputGroupPrepend" @guest value="{{ old('email') }}" @else value="{{auth()->user()->email}}" disabled @endguest required>
                                
                              </div>
                              <div class="text-danger" >
                                @error('email')
                                  {{ $message }}
                                @enderror
                              </div>
                            </div>
                            @guest
                            <div class="col- input_div mb-2">
                              <label for="validationCustomUsername" class="form-label"></label>
                              <div class="input-group ">
                                <input type="password" name="password" class="form-control rounded-start py-2" id="password" placeholder="Password" required minlength="8">
                                <span class="input-group-text rounded-end"  id="eye" onclick="togglePasswordReveal('eye', 'password')"><i class="bi-eye"></i></span>
                                <div class="text-danger" >
                                  @error('password')
                                    {{ $message }}
                                  @enderror
                                </div>
                               
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
                              <button class=" cust_btn-1 w-100 login-btn" type="button" onclick="validateLoginForm()">Become a Writer</button>
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
  // function togglePasswordReveal(){

  //   const passwordInput = document.querySelector("#password");
  //   if(passwordInput.getAttribute("type") === 'text'){
  //     passwordInput.setAttribute("type", "password");
  //     document.querySelector("#eye").innerHTML = `<i class="bi-eye"></i>`;
  //   }else{
  //     passwordInput.setAttribute("type", "text");
  //     document.querySelector("#eye").innerHTML = `<i class="bi-eye-slash"></i>`;
  //   }

  // }

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
              id:"first_name",
              rules: {'required':true}
          },
          {
              id:"last_name",
              rules: {'required':true}
          },
          {
              id:"pen_name",
              rules: {'required':true}
          },
          {
            id:"inputTag",
            alias:"Cover Photo",
            rules:{"required":true}
          }
          
      ]);
      
      if(validation === true){
          submitLoginForm();
          setBtnNotLoading(submitBtn, oldBtnHTML)
      }else{
          setBtnNotLoading(submitBtn, oldBtnHTML)
      }
    }

    const submitLoginForm = () => {
      document.querySelector("#writer-form").submit();
    } 

</script>

<style>
  #cover-upload-text{
    position: absolute;
    margin-top:30px;
    margin-left: -75px;
  }
</style>
@endsection