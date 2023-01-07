<script>
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