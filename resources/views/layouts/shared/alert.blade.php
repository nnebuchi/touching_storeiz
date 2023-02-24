<div class="alert-msg text-center text-dark">
    @if(!is_null(session('msg')))
    @php
      $message=session('msg');
      $myalert=session('alert');
    @endphp
    
    <div class="alert alert-{{ session('alert') }} alert-dismissible fade show mt-3" role="alert">
        <?= session('msg') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    
   
    @php
      session()->forget('msg');
      session()->forget('alert');
      @endphp
  @endif 
  
  </div>