

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Warehouse &mdash; Free Website Template by Free-Template.co</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="Free-Template.co" />

    <link rel="shortcut icon" href="ftco-32x32.png">

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,900|Oswald:300,400,700" rel="stylesheet">
    

    <link rel="stylesheet" href="{{ asset('assit-user/fonts/icomoon/style.css') }}">
    
    <link rel="stylesheet" href="{{ asset('assit-user/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assit-user/css/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('assit-user/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assit-user/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assit-user/css/jquery.fancybox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assit-user/css/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('assit-user/fonts/flaticon/font/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('assit-user/css/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('assit-user/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assit-user/css/profile.css') }}">
    <link rel="stylesheet" href="{{ asset('assit-user/css/comment.css') }}">
      <!-- Font Awesome -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
            
      <!-- Bootstrap 5 CSS -->
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.7.0/dist/css/bootstrap.min.css">
      
      <!-- FullCalendar CSS -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css">
      
      <!-- jQuery -->
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      
      <!-- FullCalendar JS -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>
      
   

    

  </head>
  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
  
  <div class="site-wrap" id="home">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>
   
    
    <header class="site-navbar py-4 js-sticky-header site-navbar-target" role="banner">

      <div class="container">
        <div class="row align-items-center">
          
          <div class="col-6 col-xl-2">
            <h1 class="mb-0 site-logo m-0 p-0"><a href="{{ route('home.index') }}" class="mb-0">Warehouse</a></h1>
          </div>

          <div class="col-12 col-md-10 d-none d-xl-block">
            <nav class="site-navigation position-relative text-right" role="navigation">

              <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
                <li><a href="{{ route('home.index') }}" class="nav-link">Home</a></li>
                <li><a href="#properties-section" class="nav-link">Properties</a></li>
                <li><a href="#about-section" class="nav-link">About</a></li>
                <li><a href="#services-section" class="nav-link">Sevices</a></li>
                <li><a href="#contact-section" class="nav-link">Contact</a></li>
                @if (session('user_id'))
                  <li><a href="{{ route('logout') }}" class="nav-link">Logout</a></li> 
                  <li><a href="{{ route('userprofile.index') }}" class="nav-link">Profile</a></li>


                @else
                    <li><a href="{{ route('sign-up.index') }}" class="nav-link">Sign In</a></li>
                @endif

              </ul>
            </nav>
          </div>


          <div class="col-6 d-inline-block d-xl-none ml-md-0 py-3"><a href="#" class="site-menu-toggle js-menu-toggle text-white float-right"><span class="icon-menu h3"></span></a></div>

        </div>
      </div>
      
    </header>