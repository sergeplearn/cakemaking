<!doctype html>
<html lang="en">
  <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
 <link rel="stylesheet" href="/../css/mdb.min.css">
    <link rel="stylesheet" href="/../css/style.css">
    <link rel="stylesheet" href="/../css/everyone.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" >
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" ></script>
   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
   <link rel="stylesheet" href=" https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css">  
   <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>

     <!-- CSRF Token -->
     <meta name="csrf-token" content="{{ csrf_token() }}">



<!-- Fonts -->
<link rel="dns-prefetch" href="//fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
@vite(['resources/sass/app.scss', 'resources/js/app.js'])
  </head>
  <body>


  <!--Main Navigation-->
<header>
  <!-- Sidebar -->
  <nav id="sidebarMenu" class="collapse  d-lg-block sidebar collapse bg-white">
    <div class="position-sticky">
      <div class="list-group list-group-flush mx-3 mt-4">
        <a
          href="#"
          class="list-group-item list-group-item-action py-2 ripple"
          aria-current="true"
        >
          <i class="fas fa-tachometer-alt fa-fw me-3"></i><span>Main dashboard</span>
        </a>

        <form action="{{route('User.show',optional(Auth::user())->id)}}" method="get">
         <button type="submit" class="list-group-item list-group-item-action py-2 ripple"><i class="fas fa-lock fa-fw me-3"></i><span>Admin Profile</span></button>
        </form>
        
      
        <a href="{{route('User.index')}}" class="list-group-item list-group-item-action py-2 ripple"
          ><i class="fas fa-lock fa-fw me-3"></i><span>Admin registration</span></a
        >
        <div class="py-5"></div>

        <a class="list-group-item bg-info text-white list-group-item-action py-2 ripple"
         data-toggle="collapse"
         
         href="#collapseExample"
         aria-current="true"
         aria-expanded="false"
         aria-controls="collapseExample">
         <span >items available</span>
        </a>
        <ul id="collapseExample" class="collapse list-group  list-group-flush">
         
         
          <li class="list-group-item bg-info py-1">
          <a href="/home" class="list-group-item list-group-item-action py-2 ripple"
          ><i class="fas fa-house me-3"></i><span>user home</span></a
        >
          </li>
          <li class="list-group-item bg-info py-1">
          <a href="/admin/newcake" class="list-group-item list-group-item-action py-2 ripple"
          ><i class="fas fa-cake-candles me-3"></i><span>cake</span></a
        >
        
          </li>
          <li class="list-group-item bg-info py-1">
          <a href="/admin/team" class="list-group-item list-group-item-action py-2 ripple"
          ><i class="fas fa-user-plus me-3"></i><span>Teams</span></a
        >

          </li>

          </li>
          <li class="list-group-item py-1 bg-info">
          <a href="/admin/testimonial" class="list-group-item list-group-item-action py-2 ripple"
          ><i class="fas fa-book-open-reader me-3"></i><span>Testimonial</span></a
        >

          </li>



          <li class="list-group-item py-1">
          <a href="/comment" class="list-group-item list-group-item-action py-2 ripple"
          ><i class="fas fa-message me-3"></i><span>comment</span></a
        >
          </li>
        </ul>





        
        
      </div>
    </div>
  </nav>
  <!-- Sidebar -->

  <!-- Navbar -->
  <nav id="main-navbar" class="navbar navbar-expand-lg navbar-light bg-info fixed-top">
    <!-- Container wrapper -->
    <div class="container-fluid">
      <!-- Toggle button -->
      <button
        class="navbar-toggler"
        type="button"
        data-mdb-toggle="collapse"
        data-mdb-target="#sidebarMenu"
        aria-controls="sidebarMenu"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <i class="fas fa-bars"></i>
      </button>

      <!-- Brand -->
      <a class="navbar-brand" href="#">
        <img
          src="https://mdbcdn.b-cdn.net/img/logo/mdb-transaprent-noshadows.webp"
          height="25"
          alt="MDB Logo"
          loading="lazy"
        />
      </a>
      

      <!-- Right links -->
      <ul class="navbar-nav ms-auto d-flex flex-row">
    
        <!-- Avatar -->
        
        <ul class="navbar-nav ms-auto">
      <a style="text-decoration:none"; 
          class=" d-flex align-items-center hidden-arrow"
          href="#"
          id="navbarDropdownMenuAvatar"
          role="button"
          data-mdb-toggle="dropdown"
          aria-expanded="false"
        >
        @if(optional(Auth::user()->upload_img)->user_id === Auth::user()->id)
        <img
          src="{{asset('images/' . optional(Auth::user()->upload_img)->image_path)   }}"
          
          class="rounded-circle"
            height="36"
          alt="MDB Logo"
          loading="lazy"
        />
        @else
          <i 
             class="fas fa-user-tie fa-2x my_card">
            
          </i>
          @endif
        </a>

      @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link " href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle text-white my_card" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                        </ul>
      
      
    <!-- Right elements -->






      </ul>
    </div>
    <!-- Container wrapper -->
  </nav>
  <!-- Navbar -->
</header>
<!--Main Navigation-->

<!--Main layout-->
<main style="margin-top: 58px;">
  <div class="container pt-4">
  @yield('content')

  </div>
</main>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="/../js/app.js"></script>
  </body>
</html>