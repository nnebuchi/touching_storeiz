export default function LoginModal({user}){

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
            setBtnNotLoading(submitBtn, oldBtnHTML);
        }else{
            setBtnNotLoading(submitBtn, oldBtnHTML);
        }
    }

    const submitLoginForm = () => {
        document.querySelector("#login-form").submit();
    }

    let action_url;
    if(user){
        action_url = `${url}/sign-in`;
    }else{
        action_url = `${url}/sign-in?user_token=${usercookie.token}`;
    }

    return (
        <div className="modal fade" id="loginModal" tabIndex="-1" aria-labelledby="loginModalLabel" aria-hidden="true" >
        <div className="modal-dialog modal-dialog-scrollable">
            <div className="modal-content modal-content-cust">
                <div className="modal-header">
                    <h1 className="modal-titl  modal-center mx-auto my-3" id="loginModalLabel">Login</h1>
                    <span type="button" className="btn-close close-x my-3" data-bs-dismiss="modal" aria-label="Close"></span>
                </div>
                <div className="modal-bod" >
                    <small>Sign in to Storihom to interact with like-minds by sharing sharing your thoughts on the stories you read.
                    </small>
                    
                    <form action={action_url} className="row g-3 needs-validation " method="post" id="login-form" >
                        <input type="hidden" name="_token" value={universal_token} />
                        <div className="col- reg_input-div mt-lg-2 mt-3 mt-sm-2 post_input-div">
                            <div className="col- reg_input-div mt-1 mt-lg-0">
                                <label htmlFor="validationCustomUsername" className="form-label"></label>
                                <div className="input-group has-validation">
                                    <input type="email" id="email" name="email" className="form-control rounded-3 py-sm-2 py-1" placeholder="Email"  required />
                                </div>
                            </div>
                            <div className="col- reg_input-div mt-1 mt-lg-0">
                                <label htmlFor="validationCustomUsername" className="form-label"></label>
                                <div className="input-group has-validation">
                                    <input type="password" name="password" id="password" className="form-control rounded-3 py-sm-2 py-1 p-word" placeholder="Password" required />
                                    <span className="input-group-text eye" id="eye" onClick={()=>togglePasswordReveal('eye', 'password')}><i className="bi bi-eye-slash"></i></span>
                                    <div className="invalid-feedback">
                                        Enter Password.
                                    </div>
                                </div>
                            </div>

                            <div className=" col my-lg-4  ">
                                <div className="form-check">
                                    <input className="form-check-input" type="checkbox" value="" required />
                                    <label className="form-check-label " htmlFor="invalidCheck">
                                    <small>Not registered? <a type="button" href="#"   data-bs-toggle="modal" data-bs-target="#registerModal" >Sign up</a></small> 
                                    </label>
                                    
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div className="modal-foote text-center">
                    <button type="button" className="cust_btn-1 w-75 mx-auto my-4 login-btn" onClick={validateLoginForm}>Login</button>
                </div>
            </div>
        </div>
    </div>
    );
}