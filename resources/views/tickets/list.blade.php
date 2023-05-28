@extends('layouts.main.app')
@section('content')
<link rel="stylesheet" href="{{asset('assets/plugins/thumbnail-preview/css/h-smart-thumbnail.min.css')}}">

<div class="container" style="margin-top: -50px!important">

            
  <section class="publication">
    <div class="mb-2">
      <a href="{{route('new-ticket')}}" class="btn ts-btn-secondary add-ticket">New Ticket <i class="fa fa-plus"></i></a>
    </div>
     @include('layouts.shared.writer-table-start')
     @if(count($errors) > 0)
     <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
         @foreach ($errors->all() as $error)
             {{ $error }}<br/>
         @endforeach
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
     </div>
     @endif
      <div class="row my-5">
        <div class="col-xl-9 col-lg-12 table-responsive">
             
           <table class="table">
              <thead>
                <tr>
                  <th scope="col" width="100" class="text-center">Ticket No. </th>
                  <th scope="col" width="250" class="text-center">Subject </th>
                  <th scope="col" width="150" class="text-center">Status </th>
                  <th scope="col" width="150" class="text-center">Date Created </th>
                  <th scope="col" width="200" class="text-center">Action </th>
                  
                </tr>
              </thead>
             
          </table>      
        </div>
        
        
      </div>
      <div class="row " style="border-top: 1px solid #D9AD89;">
        <div class="col-xl-9 col-lg-12 table-responsive " style="padding: 30px 0;">
          @if(count($tickets) > 0)
           <table class="table cust_table">
             
              <tbody class="text-center">
                @foreach($tickets as $index=>$ticket)
                <tr class="table_hover story-row {{$index === 0 ? 'active': ''}}" ci-target="ticket-ci-{{$ticket->id}}">
                  <td width="100">ST-{{$ticket->id}}</td>
                  <td width="250"><?=php_to_html($ticket->subject)?></td>
                  <td width="150" class="text-center">{{$ticket->status}}</td>
                  <td width="150">{{date('j F, Y', strtotime($ticket->created_at))}}</td>
                  <td width="200">

                    <button class="ts-btn-primary btn btn-sm mb-1 mb-sm-0" data-bs-toggle="modal" data-bs-target="#deleteTicketModal-{{$ticket->id}}"><i class="fa fa-trash"> </i> <span class="d-none d-lg-inline">Delete</span></button>

                    <button class="ts-btn-secondary btn btn-sm mb-1 mb-sm-0 edit-ticket-btn" target-ticket-id="{{$ticket->id}}" desc="{{php_to_html($ticket->description)}}" subject="{{php_to_html($ticket->subject)}}" type="button" data-bs-toggle="modal" data-bs-target="#editModal"><i class="fa fa-edit"></i> <span class="d-none d-lg-inline">Edit</span> </button>
                  </td>
                </tr>
                @endforeach
                <tr style="height: 30px;"> 
                </tr>
              </tbody>
            </table>
          @else
            <p class="text-center text-danger"><strong>No Tickets here</strong></p>
          @endif
        </div>
        <div class="col-xl-3 col-lg-12 cust-border" >
          <div class="row">
            
             <div class="col-xl-12">
              @if(count($tickets) > 0)
                <h2 class="analytics-reactions text-capitalize">Content</h2>
                @foreach($tickets as $index=>$ticket)
                  <div class="ticket-ci {{$index > 0 ? 'd-none':'' }}" id="ticket-ci-{{$ticket->id}}">
                    <div class="custom_card border border-1 rounded-2 px-3 py-2 my-4">
                        <div class="custom-card_text mt-2 ticket-ci-content" style="white-space: pre-wrap"><?=php_to_html($ticket->description)?> </div>
                    </div>
                    <div id="jquery-script-menu">
                      <div class="jquery-script-center">
                        <div id="carbon-block"></div>
                    
                      <div class="jquery-script-clear"></div>
                      </div>
                    </div>
                    
                    @if(!is_null($ticket->attachment))
                    <div class="carbon-plugin" style="display:none" style="margin-top: 20px;">
                      <ul>
                        <li>
                          <img src="{{asset('storage/'.$ticket->attachment)}}">
                        </li>
                      </ul>
                    </div>
                    @endif
                  </div>
                @endforeach
              @endif
             </div>
          </div>
          
        </div>
      </div>
     
  </section>
  <div class="body-cover"></div>


   <!-- edit modal -->

      <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true" >
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content modal-content-cust">
                <div class="modal-header">
                    <h1 class="modal-titl  modal-center mx-auto my-3" id="editModalLabel">Edit Ticket</h1>
                    <span type="button" class="btn-close close-x my-3" data-bs-dismiss="modal" aria-label="Close"></span>
                </div>
                <div class="modal-bod" >
                    <small>You are able to edit this ticket because the status is pending
                    </small>
                   
                    <form id="ticket-form" action="{{route('update-ticket')}}" class="row g-3 needs-validation " method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="col- reg_input-div mt-lg-2 mt-3 mt-sm-2 post_input-div">
                          <div class="col- ticket_input-div">
                            <label for="validationCustom01" class="form-label"></label>
                            <textarea name="subject" id="subject" cols="30" rows="1" class="form-control rounded-3" placeholder="Subject" id="validationCustom01" required></textarea>
                            <div class="text-danger backend-msg">
                                @error('subject')
                                    {{ $message }}
                                @enderror
                            </div>
                          </div>
                          <div class="col- ticket_input-div">
                              <label for="validationCustom02" class="form-label"></label>
                              <textarea name="description" id="description" cols="30" rows="5" class="form-control rounded-3" placeholder="Description. . ." id="validationCustom03" required></textarea> 
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
                          <input type="hidden" id="ticket-id" name="id">
                        </div>
                    </form>
                </div>
                <div class="modal-foote text-center">
                    <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                    <button type="button" class="cust_btn-1 w-75 mx-auto my-4 login-btn" onclick="validateTicketForm()">Login</button>
                </div>
            </div>
        </div>
    </div>

    @foreach($tickets as $ticket)
      <div class="modal fade" id="deleteTicketModal-{{$ticket->id}}" tabindex="-1" aria-labelledby="deleteTicketModal-{{$ticket->id}}Label" aria-hidden="true" >
        <div class="modal-dialog modal-dialog-scrollable"  >
            <div class="modal-content modal-content-cust "  >
                <div class="modal-head d-flex">
                    <h1 class="modal-titl  modal-center mx-auto my-3" id="deleteTicketModal-{{$ticket->id}}Label">Delete Comment?</h1>
                    <span type="button" class="btn-close close-x my-3" data-bs-dismiss="modal" aria-label="Close"></span>
                </div>
                <div class="modal-bod" >
                    Are you sure you want to delete this ticket ?
                    <div class="modal-foote text-center">
                        <button type="button" class="btn ts-btn-primary-outline" data-bs-dismiss="modal">No</button>
                        <a href="{{route('delete-ticket', $ticket->id)}}"  type="button" class="cust_btn-1 ts-btn-primary mx-auto my-4 comment-btn">Delete</a>
                    </div>
                </div>
            </div>
        </div>
      </div>
    @endforeach
   

  <style>
    .h-big-pic-view-main{
      margin-top: 50px!important;
      position: fixed!important;
      top: 0!important;
      left: 0!important;
      margin-top: 100px!important;
      margin-left: 33%;
      z-index: 100000;
    }

    .h-big-pic-view-header{
      background: white;
    }

    .body-cover{
      background: black!important;
      opacity: 0.5;
      height:100vh;
      width: 100%;
      position:fixed;
      z-index:10000;
      top:0;
      left:0;
      display: none;
    }

    
  </style>

  {{-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script> --}}
  <script src="https://unpkg.com/imagesloaded@4/imagesloaded.pkgd.min.js"></script>
  <script src="{{asset('assets/plugins/thumbnail-preview/js/h-smart-thumbnail.min.js')}}"></script>
  <script type="text/javascript">
    $('.carbon-plugin').hSmartThumbnail();
    $('.carbon-plugin').imagesLoaded( function() {
      $('.carbon-plugin').css("display", "block");
    });
  </script>
  <script>
    try {
      fetch(new Request("https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js", { method: 'HEAD', mode: 'no-cors' })).then(function(response) {
        return true;
      }).catch(function(e) {
        var carbonScript = document.createElement("script");
        carbonScript.src = "//cdn.carbonads.com/carbon.js?serve=CK7DKKQU&placement=wwwjqueryscriptnet";
        carbonScript.id = "_carbonads_js";
        document.getElementById("carbon-block").appendChild(carbonScript);
      });
    } catch (error) {
      console.log(error);
    }

    $(document).ready(function(){
      $('.carbon-plugin').find('li').each(function(){
        $(this).on('click', disableBody)
      })

      $('body').find('.icon-close').on('click', enableBody)
    })

  </script>

  <script>
    const disableBody = () => {
      $('.body-cover').css('display', 'block')
    }

    const enableBody = () => {
      $('.body-cover').css('display', 'none')
    }

    const validateTicketForm = () => {
        
        document.querySelectorAll(".backend-msg").forEach(function(field, index){
            field.innerHTML = '';
        })
        const submitBtn = document.querySelector(".login-btn");

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
            updateTicket();
        }else{
            setBtnNotLoading(submitBtn, oldBtnHTML)
        }
    }

    const updateTicket = () => {
        document.querySelector("#ticket-form").submit();
    }

    const attachFile = (event) => {
        document.querySelector('#file-label-upload').innerHTML=event.target.files[0].name
        
      // document.querySelector('#'+event.target.getAttribute('target-label')).innerHTML=event.target.files[0].name
    }

    $('.edit-ticket-btn').each(function(){
      $(this).on('click', function(){
        $('#subject').val($(this).attr('subject'));
        $('#description').val($(this).attr('desc'));
        $('#ticket-id').val($(this).attr('target-ticket-id'));
      })
    })
   
  </script>

  @endsection