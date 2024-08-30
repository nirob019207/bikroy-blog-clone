<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap Sticky Navbar Example</title>
    <link rel="stylesheet" href="{{asset('frontend/style.css')}}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('frontend/css/bootstrap.min.css')}}">    
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="{{asset('frontend/icon/css/all.min.css')}}">
    
</head>
<body class="container-lg">
    
    

    @include('frontend.header')

    <div class=" shadow-xl bg-white">

 

 
  
    
  @yield('content')
  </div>
    
@include('frontend.footer')
  

    <!-- Bootstrap JS -->
    <script src="{{asset('frontend/js/bootstrap.bundle.min.js')}}"></script>
    <!-- Font Awesome JS -->
    <script src="{{asset('frontend/icon/js/all.min.js')}}"></script>
    <script src="{{asset('frontend/script.js')}}">
      
    </script>
    
<script async defer crossorigin="anonymous" 
    src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v16.0&appId=YOUR_APP_ID&autoLogAppEvents=1" 
    nonce="YourNonceValue"></script>
</body>
</html>
