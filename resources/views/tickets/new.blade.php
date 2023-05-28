@extends('layouts.main.app')
@section('content')
<div class="container-fluid">
    <section class="ticket_section" >
        <div class="row">
                 <div class="col-lg-6 offset-lg-0 col-sm-10 offset-sm-1 px-sm-0 col-12 px-2 ">
                     <div class="ticket_img-container d-none d-lg-block">
                             <img src="../assets/img/become/rafiki.svg" alt="novelist" class="ticket_hero-img">
                     </div>
                 
                 </div>
                 <div class="col-12 col-sm-12 offset-sm-0 col-md-12 offset-md-0   col-lg-5 offset-lg-0  px-lg-4 col-xl-5 offset-xl-0">
                     <div class="container">
                         <div class="ticket_reg">
                            <div class="row">

                                <div class="col-xl-10 offset-xl-0 col-lg-12 offset-lg-0 px-lg-4 col-md-8 offset-md-0 col-sm-10 mx-sm-auto px-sm-0 offset-sm-0  col-10 offset-1">
                                    <h2 class="text-capitalize ticket_reg-title  text-lg-start  ">Raise a Ticket</h2>
                                    <form action="{{route('submit-ticket')}}" class="row g-3 needs-validation" id="ticket-form" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="col- ticket_input-div">
                                            <label for="validationCustom01" class="form-label"></label>
                                            <textarea name="subject" id="subject" cols="30" rows="1" class="form-control rounded-3" placeholder="Subject" id="validationCustom01" required>{{old('subject')}}</textarea>
                                            <div class="text-danger backend-msg">
                                                @error('subject')
                                                    {{ $message }}
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col- ticket_input-div">
                                            <label for="validationCustom02" class="form-label"></label>
                                            <textarea name="description" id="description" cols="30" rows="5" class="form-control rounded-3" placeholder="Description. . ." id="validationCustom03" required>{{old('description')}}</textarea> 
                                            <div class="text-danger backend-msg">
                                                @error('description')
                                                    {{ $message }}
                                                @enderror
                                            </div>
                                            
                                        </div>
                                        <div class="col- ticket_input-div">
                                            <label for="validationCustom03" class="form-label"></label>
                                        
                                        </div>
                                        <div class="col- ticket_input-div">
                                            <label for="inputTag" class="ticket_input-label" id="file-label-upload">
                                                Attachment (optional) <span class="text-danger">png, jpg, pdf, docx</span>
                                            </label>
                                            <input name="attachment" id="inputTag" type="file" class="form-control" onchange="attachFile(event)" />
                                            <div class="text-danger backend-msg">
                                                @error('attachment')
                                                {{ $message }}
                                                @enderror
                                            </div>
                                        </div>
                                    
                                        <div class="col- my-5">
                                            <button class=" cust_btn-1 w-100 submit-btn" type="button" onclick="validateTicketForm()">Submit Ticket</button>
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
    const validateTicketForm = () => {
        
        document.querySelectorAll(".backend-msg").forEach(function(field, index){
            field.innerHTML = '';
        })
        const submitBtn = document.querySelector(".submit-btn");

        const oldBtnHTML = submitBtn.innerHTML;

        setBtnLoading(submitBtn);

        const validation = runValidation([
            
            {
                id:"subject",
                rules: {'required':true, min_length:4}
            },
            {
                id:"description",
                rules: {'required':true, min_length:10}
            }
            
        ]);

        if(validation === true){
            submitTicketForm();
        }else{
            setBtnNotLoading(submitBtn, oldBtnHTML)
        }
    }

    const submitTicketForm = () => {
        document.querySelector("#ticket-form").submit();
    }

    const attachFile = (event) => {
        document.querySelector('#file-label-upload').innerHTML=event.target.files[0].name
    } 
</script>
@endsection