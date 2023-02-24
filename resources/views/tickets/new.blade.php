@extends('layouts.main.app')
@section('content')
<div class="container-fluid">
    <section class="ticket_section" >
        <div class="row">
                 <div class="col-lg-6 offset-lg-0 col-sm-10 offset-sm-1 px-sm-0   col-12 px-2  ">
                     <div class="ticket_img-container">
                             <img src="../assets/img/become/rafiki.svg" alt="novelist" class="ticket_hero-img">
                     </div>
                 
                 </div>
                 <div class="col-12 col-sm-12 offset-sm-0 col-md-12 offset-md-0   col-lg-5 offset-lg-0  px-lg-4 col-xl-5 offset-xl-0">
                     <div class="container">
                         <div class="ticket_reg">
                            <div class="row">

                                <div class="col-xl-10 offset-xl-0 col-lg-12 offset-lg-0 px-lg-4 col-md-8 offset-md-0 col-sm-10 mx-sm-auto px-sm-0 offset-sm-0  col-10 offset-1">
                                    <h2 class="text-capitalize ticket_reg-title  text-lg-start  ">Raise a Ticket</h2>
                                    <form action="" class="row g-3 needs-validation" novalidate>
                                        <div class="col- ticket_input-div">
                                            <label for="validationCustom01" class="form-label"></label>
                                            <textarea name="" id="subject" cols="30" rows="1" class="form-control rounded-3" placeholder="Subject" id="validationCustom01" required></textarea>
                                            <div class="text-danger backend-msg">
                                                @error('subject')
                                                    {{ $message }}
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col- ticket_input-div">
                                            <label for="validationCustom02" class="form-label"></label>
                                            <textarea name="" id="description" cols="30" rows="10" class="form-control rounded-3" placeholder="Description. . ." id="validationCustom03" required></textarea> 
                                                
                                            @error('description')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                        <div class="col- ticket_input-div">
                                            <label for="validationCustom03" class="form-label"></label>
                                        
                                        </div>
                                        <div class="col- ticket_input-div">
                                            <label for="inputTag" class="ticket_input-label" >
                                                Attachment (optional)
                                            </label>
                                            <input id="inputTag" type="file" class="form-control" />
                                            @error('attachment')
                                            {{ $message }}
                                            @enderror
                                        </div>
                                    
                                        <div class="col- my-5">
                                            <button class=" cust_btn-1 w-100" type="button">Submit Ticket</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                         </div>
                     </div>
                 </div>
     </section>  
</div>

@endsection