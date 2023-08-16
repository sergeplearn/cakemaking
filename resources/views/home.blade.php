@extends('layouts.everyone')
@section('css')
<style>
  img{
   
    aspect-ratio:1/1;
 
    object-position: center;
    object-fit:cover;
    
  }

  .blur-load::before {
    content: "";
    position: absolute;
    inset:0;
    animation: pulse 2.5s infinite;
    
  }
  .blur-load.loaded::before {
    content:none;
    animation: none;
  }

  @keyframes pulse {
    0% {
      background-color:rgba(255, 255, 255, 0);
    }
    50% {
      background-color:rgba(255, 255, 255, 0.2);
    }
    100% {
      background-color:rgba(255, 255, 255, 0);
    }
  }

  
  .blur-load {
    position: relative;
    background-size: cover;
    background-position: center;
   
  }
  .blur-load.loaded > img {
    opacity: 1;
  }
  .blur-load > img {
    opacity: 0;
    transition: opacity 200ms ease-in-out;
  }

</style>
@stop
@section('content')






  
        

 
  
               





<section class=" mb-10">

<div class="dropdown mb-5 ">
  <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
   select item
  </a>

  <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">

  
    <li><a class="dropdown-item" href="/home">All</a></li>
   

    <li>
      <a class="dropdown-item" href="#">
        categories &raquo;
      </a>
      <ul class="dropdown-menu dropdown-submenu">
      @foreach($categories as  $categories)
    <li><a class="dropdown-item" href="/home/?category_id={{ $categories->id }}">{{ $categories->category }}</a></li>
    @endforeach
        
        <li>
          <a class="dropdown-item" href="#">Submenu item 3 &raquo; </a>
          <ul class="dropdown-menu dropdown-submenu">
            <li>
              <a class="dropdown-item" href="/home/?sort=asc">Multi level 1</a>
            </li>
            <li>
              <a class="dropdown-item" href="#">Multi level 2</a>
            </li>
          </ul>
        </li>
       
      </ul>
      </li>
    
  </ul>
</div>






  
  <h3 class="fw-bold mb-7 text-center">Latest posts</h3>

 
    <div class="row">
      <?php $totalreply = 0; ?>
      
     



      
    @foreach($cakess as $cake)

    

      <div class="col-lg-3 col-md-6 col-sm-6 d-flex">
        <div class="card rounded-6  w-100 my-2 shadow-2-strong  my_card ">
        <a href="{{route('newcake.show',$cake->id)}}" class=" text-decoration-none ">

        <div class="cardcontainer">
       
          <div class="blur-load " style="background-image:url({{ asset('bgimg/' . $cake->image_paths)  }})">
          <img src="{{ asset('images/' . $cake->image_path)  }}" loading="lazy" class="card-img-top  img-fluid img-rounded;" />
 </div>  
        
          <div class="card-body d-flex flex-column">
          

            <h6 class="card-title text-center text-dark">{{ $cake->nameofcake}} cake</h6>
            <hr class="hr hr-blurry px-1 shadow" style="width:100px; margin: auto; height:4px" />
            <table class="table card-text lh-1 text-muted ">
              <tr>
                <th>Made by:</th>
                <td>{{ $cake->nameofperson}}</td>
              </tr>
              <tr>
                <th>Phone No:</th>

              
                <td>{{ $cake->tell}}</td>
              </tr>
              <tr>
                <th>Amount:</th>
                <td>{{ $cake->price}} Frs</td>
              </tr>
            </table>
          
            
            
            <p class="txt3"><i class="far fa-clock"></i>{{ $cake->created_at->diffForHumans()}} <span class="comments"><i class="fas fa-comments"></i> {{$cake->replycomment->count() + $cake->comments->count()}} Comments</span></p>
            
            
          </div>
          </div>
          </a>
        </div>
      </div>
     
      @endforeach 
</div>


<div class="text-center mt-3">
  
<span> {{ $cakess->onEachSide(1)->appends(request()->input())->links() }} </span>
</div>
</section>











<script>
  const blurDivs = document.querySelectorAll(".blur-load")
blurDivs.forEach(div => {
  const img = div.querySelector("img")

  function loaded(){
div.classList.add("loaded");
  }


  
  if(img.complete ){
    loaded()
  }else{
    img.addEventListener("load", loaded)
  }
})
</script>


@stop