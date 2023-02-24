<script>

    const uploadCoverPhoto = (event)=>{
      const file = event.target.files[0];
      const tempPath = URL.createObjectURL(file);
      // const styles = {
      //   backgroundImage: `url(${tempPath})`,
      //   color: 'white',
      //   height:'300px'
      // }
      document.querySelector('.input_label').style.backgroundImage = `url(${tempPath})`;
      document.querySelector('.input_label').style.color ='white';
      document.querySelector('.input_label').style.height ='300px';
      document.querySelector('.input_label').style.backgroundSize ='cover';
      
      // url('https://cdn.pixabay.com/photo/2022/01/08/19/51/christmas-tree-6924746_960_720.jpg'); height: 300px; background-size:cover; color:white;
    }

    
    $(document).ready(function() {
        $('.owl-carousel').owlCarousel({
        loop: true,
        margin: 20,
        responsiveClass: true,
        responsive: {
            0: {
            items: 1,
            nav: true
            },
            375:{
            items: 1,
            nav: true,
            margin: 5
            },
            576:{
            items: 1,
            nav: true,
            margin: 5
            },
        
            768: {
            items: 2,
            nav: true
            },
            
        
            991: {
            items: 2,
            nav: true,
            loop: true,
            margin: 20
            },
        
            1000: {
            items: 3,
            nav: true,
            loop: true,
            margin: 20
            }
        }
        })
    })
</script>
<script src="{{asset('assets/plugins/owl-carousel/vendors/highlight.js')}}"></script>
<script src="{{asset('assets/plugins/owl-carousel/js/app.js')}}"></script>
