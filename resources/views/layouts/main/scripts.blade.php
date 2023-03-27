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
<script src="{{asset('assets/plugins/owl-carousel/vendors/highlight.js')}}"></script>
<script src="{{asset('assets/plugins/owl-carousel/js/app.js')}}"></script>