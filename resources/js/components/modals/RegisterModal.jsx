export default function RegisterModal(){

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

    let action_url = `${url}/register`;

    return (
        <div className="modal fade" id="registerModal" tabIndex="-1" aria-labelledby="registerModalLabel" aria-hidden="true" >
            <div className="modal-dialog modal-dialog-scrollable"  >
                <div className="modal-content modal-content-cust "  >
                    <div className="modal-header">
                        <h1 className="modal-titl  modal-center mx-auto" id="registerModalLabel">Register</h1>
                        
                        <span type="button" className="btn-close close-x" data-bs-dismiss="modal" aria-label="Close"></span>
                        
                    </div>
                    <div className="modal-bod " >
                        <small>Join Storihom community snd interact with like-minds b sharing sharing your thoughts on the stories you read.
                        </small>
                       
                        <form action={action_url} className="row g-3 needs-validation " method="post" id="reg-form">
                            <input type="hidden" name="_token" value={universal_token} />
                            <div className="col- reg_input-div mt-lg-2 mt-3 mt-sm-2 post_input-div">
                                <div className="col- reg_input-div mt-1 mt-lg-0">
                                    <label htmlFor="validationCustomUsername" className="form-label"></label>
                                    <div className="input-group has-validation">
                                        <input type="email" id="register-email" name="email" className="form-control rounded-3 py-sm-2 py-1" placeholder="Email"  required />
                                    </div>
                                </div>
                                <div className="col- reg_input-div mt-1 mt-lg-0">
                                    <label htmlFor="validationCustomUsername" className="form-label"></label>
                                    <div className="input-group has-validation">
                                        <input type="text" id="username" name="username" className="form-control rounded-3 py-sm-2 py-1" placeholder="Username"  required />
                                    </div>
                                </div>
                                <div className="col- reg_input-div mt-1 mt-lg-0">
                                    <label htmlFor="validationCustomUsername" className="form-label"></label>
                                    <div className="input-group has-validation">
                                        <input type="password" name="password" id="register-password" className="form-control rounded-3 py-sm-2 py-1 p-word" placeholder="Password" required />
                                        <span className="input-group-text eye" id="reg-eye"  onClick={()=>togglePasswordReveal('reg-eye', 'register-password')}><i className="bi bi-eye-slash"></i></span>
                                        <div className="invalid-feedback">
                                            Enter Password.
                                        </div>
                                    </div>
                                </div>

                                <div className=" col my-lg-4  ">
                                    <div className="form-check">
                                        <input className="form-check-input" type="checkbox" value="" id="invalidCheck" required />
                                        <label className="form-check-label " htmlFor="invalidCheck">
                                        <small>Already registered? <a type="button" data-bs-toggle="modal" data-bs-target="#loginModal" href="#">Login</a></small> 
                                        </label>
                                        
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div className="modal-foote text-center">
                        <button type="button" className="cust_btn-1 w-75 mx-auto my-4 reg-btn" onClick={validateRegisterForm}>Login</button>
                    </div>
                </div>
            </div>
        </div>
    );
}