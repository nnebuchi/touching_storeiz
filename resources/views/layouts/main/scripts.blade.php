<script>

    const uploadCoverPhoto = (event)=>{
      const file = event.target.files[0];
      const tempPath = URL.createObjectURL(file);
      // const styles = {
      //   backgroundImage: `url(${tempPath})`,
      //   color: 'white',
      //   height:'300px'
      // }

      // $('.become_hero-img').attr('src', ${tempPath});
      // document.querySelector('.become_hero-img').setAttribute('src', tempPath);
      document.querySelector('.input_label').style.backgroundImage = `url(${tempPath})`;
      document.querySelector('.input_label').style.backgroundSize ='cover';
      document.querySelector('.input_label').style.color ='white';
      document.querySelector('.input_label').style.height ='300px';
      document.querySelector('.input_label').style.backgroundSize ='cover';
      
      // url('https://cdn.pixabay.com/photo/2022/01/08/19/51/christmas-tree-6924746_960_720.jpg'); height: 300px; background-size:cover; color:white;
    }

    function formatReadTimeCount(value){
        // dd($value);
        if(value < 60){
            return value+" minutes";
        }else{
            return number_format((value/60))+" hours";
        }
    }

    function number_format(value){
      return  value.toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }

</script>

{{-- <script src="{{asset('assets/bootstrap/js/bootstrap.bundle.js')}}"></script> --}}
<script src="{{asset('assets/plugins/owl-carousel/vendors/highlight.js')}}"></script>
<script src="{{asset('assets/plugins/owl-carousel/js/app.js')}}"></script>
<script src="{{ asset('js/manifest.js') }}"></script>
<script src="{{ asset('js/vendor.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>

{{-- Table search scripts --}}
<script>

  $(document).ready(function(){
    $('.search_input').on('keyup',function(){
        var searchTerm = $(this).val().toLowerCase();
        $('.story-row').each(function(){
            var lineStr = $(this).text().toLowerCase();
            if(lineStr.indexOf(searchTerm) === -1){
                $(this).hide();
            }else{
                $(this).show();
            }
        });
    });

    $('.story-row').on('click', function(){
      let $this = $(this);
      $('.story-row').each(function(){
        $(this).removeClass('active')
      })
      $('.ticket-ci').each(function(){
        if($(this).hasClass('d-none') === false){
          $(this).addClass('d-none')
        }
      })
      $('#'+$this.attr('ci-target')).removeClass('d-none')
      $this.addClass('active')
      
    })
 
  });

  const toogleMobileCategories = () => {
      // $('.sm-right-bar').each(function(){
      //   if($(this).hasClass('d-none') == false){
      //     $(this).removeClass('d-md-none')
      //     $(this).addClass('d-none')
      //   }
      // });
      
      const sideBar = $('#mobile-category-bar');
      if(sideBar.hasClass('d-none')){
          sideBar.removeClass('d-none')
          sideBar.addClass('d-md-none')
          $('#disable-page-overlay').show()
      }else{
          sideBar.removeClass('d-md-none')
          sideBar.addClass('d-none')
          $('#disable-page-overlay').hide()
      }
  }

    // const toogleMobileTrending = () => {
    
    //     const sideBar = $('#mobile-trending-bar');
    //     console.log(sideBar);
    //     if(sideBar.hasClass('d-none')){
    //         sideBar.removeClass('d-none')
    //         sideBar.addClass('d-md-none')
    //     }else{
    //         sideBar.removeClass('d-md-none')
    //         sideBar.addClass('d-none')
    //     }
    // }


 
</script>







