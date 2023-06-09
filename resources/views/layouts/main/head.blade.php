<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @isset($social_photo)
    <meta property="og:image" content="{{$social_photo}}" />
    @endisset

    @isset($social_title)
      <title>{{$social_title}} - {{env('APP_NAME')}} Stories </title>
    @else
        <title>{{env('APP_NAME')}}</title>
    @endisset
    

    @isset($social_description)
      <meta  property="og:description" name="description" content="{{$social_description}}">
    @else
      <meta  property="og:description" name="description" content="Browse through thousands of short stories from writers around the world. find what picks your fancy and dive in. Become a writer, share your work and earn while entertaining.">
    @endisset


    @isset($social_keywords)
      <meta name="keywords" content="{{$social_keywords}}">
    @else
      <meta name="keywords" content="stories, wattpad, african stories, comtemporary stories, epic stories, tragic stoies, decent stories, comedy stories, tragoc-comedy stories, read stories online, write stories and earn, publish stories online"> 
    @endisset
    
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/logo/icon_1.ico') }}">
    <!-- stylesheet -->
    <link rel="stylesheet" href="{{asset('assets/css/main_style.css')}}">
    
     <!-- Owl Stylesheets -->
     <link rel="stylesheet" href="{{asset('assets/plugins/owl-carousel/owlcarousel/assets/owl.carousel.min.css')}}">
     <link rel="stylesheet" href="{{asset('assets/plugins/owl-carousel/owlcarousel/assets/owl.theme.default.min.css')}}">

      <!-- owl javascript -->
    <script src="{{asset('assets/plugins/owl-carousel/vendors/jquery.min.js')}}"></script>
    <script src="{{asset('assets/plugins/owl-carousel/owlcarousel/owl.carousel.js')}}"></script>

    <!-- bootstrap css & js -->
    <link rel="stylesheet" href="{{asset('assets/bootstrap/css/bootstrap.min.css')}}">
    <!-- bootstrap popper js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>

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
    
    
</head>