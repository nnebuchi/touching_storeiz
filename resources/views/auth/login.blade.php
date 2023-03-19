@extends('layouts.main.app')
@section('content')
<div class="container-fluid">

    <section class="login_section" >
              
        <div class="row">
            <div class="col-lg-6 col-md-9 offset-md-1 mx-md-auto px-md-0 col-sm-12 px-sm-4 offset-sm-0  col-12 ">
                <div class="container">
                    <div class="login_reg">
                        
                        <h2 class="text-capitalize login_reg-title  text-center text-md-center text-lg-center pt-lg-5 ">Login</h2>
                        <p class="login_reg-subtitle text-center text-md-center text-lg-center  mt-lg-3 ">Please enter your details</p>
                        <form action="{{route('sign-in')}}" class="row g-3 needs-validation" id="login-form" method="post">
                            @csrf
                            <div class="col- reg_input-div post_input-div mt-1 mt-lg-0">
                                <label for="validationCustomUsername" class="form-label"></label>
                                <div class="input-group has-validation">
                                <input type="email" class="form-control rounded-3 py-sm-2 py-1" id="email" placeholder="Email" aria-describedby="inputGroupPrepend" name="email" required>
                                
                                </div>
                                <div class="text-danger backend-msg">
                                    @error('email')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="col- reg_input-div post_input-div mt-1 mt-lg-0">
                                <label for="validationCustomUsername" class="form-label"></label>
                                <div class="input-group has-validation">
                                    <input type="password" class="form-control rounded-3 py-sm-2 py-1 p-word" id="password" placeholder="Password" aria-describedby="inputGroupPrepend" name="password" required>
                                    <span class="input-group-text eye" id="eye" onclick="togglePasswordReveal('eye', 'password')"><i class="bi bi-eye-slash"></i></span>
                                    
                                </div>
                                <div class="text-danger backend-msg">
                                    @error('password')
                                      {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            
                            
                            <div class=" mt-lg-4 mb-lg-5 mb-sm-3 text-center">
                                <button class=" cust_btn-1 w-75 text-capitalize login-btn" type="button" onclick="validateLoginForm()">Login</button>
                                <p>Not Registered ? <a href="{{route('become-a-writer')}}">Sign Up</a></p> 
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>

<script>
    const validateLoginForm = () => {
        document.querySelectorAll(".backend-msg").forEach(function(field, index){
            field.innerHTML = '';
        })
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
    
    
</script>
@endsection