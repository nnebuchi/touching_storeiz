<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- stylesheet -->
    <link rel="stylesheet" href="{{asset('assets/css/main.css')}}">
    
     <!-- Owl Stylesheets -->
     <link rel="stylesheet" href="{{asset('assets/plugins/owl-carousel/owlcarousel/assets/owl.carousel.min.css')}}">
     <link rel="stylesheet" href="{{asset('assets/plugins/owl-carousel/owlcarousel/assets/owl.theme.default.min.css')}}">

      <!-- owl javascript -->
    <script src="{{asset('assets/plugins/owl-carousel/vendors/jquery.min.js')}}"></script>
    <script src="{{asset('assets/plugins/owl-carousel/owlcarousel/owl.carousel.js')}}"></script>

    <!-- bootstrap css & js -->
    <link rel="stylesheet" href="{{asset('assets/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/bootstrap/js/bootstrap.bundle.js')}}">
    <!-- bootstrap popper js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

    <!-- icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <!-- Buchi JS plugin -->
    <script src="{{asset('assets/plugins/buchi.js')}}"></script>

    <script>
      const url = "{{ url('/') }}";
      const universal_token = "{{csrf_token()}}";
      @auth
        const user_data = <?=json_encode(\Auth::user())?>
      @endauth
    </script>
    <script src="{{asset('assets/plugins/cookies.js')}}"></script>
    
    <title>Home</title>
</head>