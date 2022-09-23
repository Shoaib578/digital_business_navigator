<!DOCTYPE html>
<html lang="en">
<head>

  <!-- Basic Page Needs
  ================================================== -->
  <meta charset="utf-8">
  <title>Digital Bussiness</title>

  <!-- Mobile Specific Metas
  ================================================== -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Bootstrap App Landing Template">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
  <meta name="author" content="Themefisher">
  <meta name="generator" content="Themefisher Small Apps Template v1.0">

  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png" />
  
  <!-- PLUGINS CSS STYLE -->
  <link rel="stylesheet" href="{{$host.'/main/plugins/bootstrap/bootstrap.min.css'}}">
  <link rel="stylesheet" href="{{$host.'/main/plugins/themify-icons/themify-icons.css'}}">
  <link rel="stylesheet" href="{{$host.'/main/plugins/slick/slick.css'}}">
  <link rel="stylesheet" href="{{$host.'/main/plugins/slick/slick-theme.css'}}">
  <link rel="stylesheet" href="{{$host.'/main/plugins/fancybox/jquery.fancybox.min.css'}}">
  <link rel="stylesheet" href="{{$host.'/main/plugins/aos/aos.css'}}">

  <!-- CUSTOM CSS -->
  <link href="{{$host.'/main/css/style.css'}}" rel="stylesheet">

</head>

<body class="body-wrapper" data-spy="scroll" data-target=".privacy-nav">

    <nav class="navbar main-nav navbar-expand-lg px-2 px-sm-0 py-2 py-lg-0">
        
      <div class="container">
        

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
           
            <span class="ti-menu">


            </span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item dropdown ">
                <a class="nav-link " href="{{ route('landing_page') }}" >Home
               
                </a>
                <!-- Dropdown list -->
              
              </li>
              <li class="nav-item dropdown ">
                <a class="nav-link " href="{{ route('news_events') }}" >News/Events
               
                </a>
                <!-- Dropdown list -->
              
              </li>

              


              <li class="nav-item @@about">
                <a class="nav-link" href="{{ route('about')  }}">About</a>
              </li>

            


            <li class="nav-item @@about">
                <a class="nav-link" href="{{ route('main_files')  }}">Files</a>
              </li>

              

              @if(auth()->user())
                <li class="nav-item @@contact">
                  <a class="nav-link" href="{{route('logout')}}">Logout</a>
                </li>
              @else
              <li class="nav-item @@contact">
                <a class="nav-link" href="{{ route('auth') }}">Login</a>
              </li>

              @endif



            </ul>
          </div>
        </div>
      </nav>

      @if (session('status'))
      <div class="bg-gray-500 p-4 rounded-lg mb-6 text-white text-center" style="background-color:#0096FF;color:white;">
          {{ session('status') }}
      </div>
      <br >
  @endif
      @yield("content")
  <!-- To Top -->
  <div class="scroll-top-to">
    <i class="ti-angle-up"></i>
  </div>
  
  <!-- JAVASCRIPTS -->
  <script src="{{$host.'/main/plugins/jquery/jquery.min.js'}}"></script>
  <script src="{{$host.'/main/plugins/bootstrap/bootstrap.min.js'}}"></script>
  <script src="{{$host.'/main/plugins/slick/slick.min.js'}}"></script>
  <script src="{{$host.'/main/plugins/fancybox/jquery.fancybox.min.js'}}"></script>
  <script src="{{$host.'/main/plugins/syotimer/jquery.syotimer.min.js'}}"></script>
  <script src="{{$host.'/main/plugins/aos/aos.js'}}"></script>
  <!-- google map -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAgeuuDfRlweIs7D6uo4wdIHVvJ0LonQ6g"></script>
  <script src="{{$host.'/main/plugins/google-map/gmap.js'}}"></script>
  
  <script src="{{$host.'/main/js/script.js'}}"></script>
</body>

</html>