<!doctype html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="/../css/everyone.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <!-- <link rel="stylesheet" href="/../css/mdb.min.css">-->
   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
    <link rel="stylesheet" href="/../css/everyone.css">
    @yield('css')

     <!-- CSRF Token -->
     <meta name="csrf-token" content="{{ csrf_token() }}">

<title>{{ config('app.name', 'Laravel') }}</title>

<!-- Fonts -->
<link rel="dns-prefetch" href="//fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">





<!-- Scripts -->

  </head>
  <body class="antialiased leading-none font-sans text-black h.screen bg-gray-100">



@if (Auth::check()) 

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter123" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">update ur profile image</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="{{ route('upload_img.store')}}" method="post" enctype="multipart/form-data">
          @csrf
       
          <input type="hidden" value="{{ Auth::user()->id }}" name ="user_id">

          <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Profile picture') }}</label>
                           
                            <div class="col-md-6">
                                <input id='image' type="file" class="form-control" name="image" autocomplete="image">

                               
                            </div>
                        </div>
                        
       
      </div>
      <div class="modal-footer">
      <button type="submit" class="btn btn-primary">Save changes</button>

      </div>
      </form>
    </div>
  </div>
</div>

@endif






<!-- Navbar -->
<nav class="navbar sticky-top space-x-4 navbar-expand-lg bg-gray  shadow">

  <!-- Container wrapper -->
  <div class="container-fluid">
    <!-- Toggle button -->
    <button
      class="navbar-toggler"
      type="button"
      data-mdb-toggle="collapse"
      data-mdb-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <i class="fas fa-bars"></i>
    </button>

    <!-- Collapsible wrapper -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">

    

      <!-- Navbar brand -->
      <a class="navbar-brand mt-2 mt-lg-0" href="#">
        <img
          src="https://mdbcdn.b-cdn.net/img/logo/mdb-transaprent-noshadows.webp"
          height="15"
          alt="MDB Logo"
          loading="lazy"
        />
      </a>
      <!-- Left links -->
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link  my_card text-dark text-sm sm:text-base" href="{{ url('/') }}">Home</a>
        </li>

        <li class="nav-item">
          <a class="nav-link  my_card text-dark text-sm sm:text-base" href="{{ url('/home') }}">cakes</a>
        </li>

        <li class="nav-item">
          <a class="nav-link  my_card text-dark text-sm sm:text-base" href="{{ url('/user/teams') }}">Teams</a>
        </li>
        <li class="nav-item">
          <a class="nav-link  my_card text-dark text-sm sm:text-base" href="{{ url('/user/testimonial') }}">Testimonial</a>
        </li>
        
        
      </ul>
      <!-- Left links -->
    </div>
    <!-- Collapsible wrapper -->

    <!-- Right elements -->
    <div class="d-flex align-items-center">
      
      <!-- Icon -->
      
      
      
      <ul class="navbar-nav ms-auto">

      @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link text-dark text-sm sm:text-base" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link text-dark text-sm sm:text-base" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif

      
                            @else
<!-- Modal -->

                            
      <a class="my_card" style="text-decoration:none"; 
          class=" d-flex align-items-center hidden-arrow"
          
          id="navbarDropdownMenuAvatar"
          role="button"
          data-mdb-toggle="dropdown"
          aria-expanded="false"
         
        >
    
       
        <img
            src="{{ asset('images/' . optional(Auth::user()->upload_img)->image_path) }}"
            class="rounded-circle"
            height="36"
            alt="Black and White Portrait of a Man"
            loading="lazy"
            class="btn"
            data-bs-toggle="modal" 
            data-bs-target="#exampleModalCenter123"
          />
         
        </a>
    
      
                       
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle  my_card text-dark text-sm sm:text-base" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    @if(Auth::user()->user_role === "admin" || Auth::user()->user_role === "super_admin" )
                                    
        <a class="dropdown-item" href="{{ url('/admin/') }}">Admin panal</a>
                                     @endif
                                   
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                                
                            </li>
                        @endguest
                        </ul>
      
      
    <!-- Right elements -->
  </div>
  <!-- Container wrapper -->
</nav>
<!-- Navbar -->



  <div class="container py-4 mb-5">

  @yield('content')

  </div>

  <footer class="bg-gray-800 py-20 mt-20 text-center   text-lg-start fixed-bottom" >
  
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
    © 2020 Copyright:
    <a class="text-dark" href="https://mdbootstrap.com/">MDBootstrap.com</a>
  </div>
  
</footer>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
   

    <script src="/../js/app.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/brands.min.js" integrity="sha512-KYlRezs7yAa59UnX6zAvY7I96Te02kycQn02Sr6FU/fBpxcXAwumRe5DHVrqVnWTt9HY/PktrAPZzSe9UE1Yxg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  </body>
</html>