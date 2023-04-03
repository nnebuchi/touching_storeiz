
    @if(!is_null(session('msg')))
    
    @php
      $message=session('msg');
      $myalert=session('alert');
    @endphp
   <div class="alert-msg text-center text-dark mt-lg-0 py-1 py-lg-0">
      <div class="alert alert-{{ session('alert') }} alert-dismissible fade show mt-lg-3  mt-5" role="alert">
        <?= session('msg') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
     </div>
   
    @php
      session()->forget('msg');
      session()->forget('alert');
      @endphp
   
  @endif 
  
  <script>
    $(document).ready(function(){
      setTimeout(() => {
        $('.alert-msg').empty();
        $('.alert-msg').removeClass("py-4");
      }, 10000);
    })
    
  </script>