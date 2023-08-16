@extends('layouts.everyone')
@section('content')



        

                <div id="carouselExample" class="carousel slide">


                  
  <div class="carousel-inner">

    @foreach($slideimage as $slideimage)

    <div class="carousel-item {{$slideimage->active}} c-item">
      <img src="{{ asset('images/' . optional($slideimage)->image_path)  }}" class="d-block w-100 c-img" alt="...">
      <div class="carousel-caption top-0 mt-5 ">
        <h5 class="mt-5 text-uppercase fw-bold display-1"> 
{{$slideimage->title}}
</h5>
        <p class="fs-3">{{$slideimage->blog}}.</p>
      </div>
    </div>
    

@endforeach  
    
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>







<div  style=" margin-top: 100px;" >
  <h3 class="text-center mt-1 fw-bold display-3">Cakes We Offer</h3>
  <p class = "text-center mt-2">A dish in gastronomy is a specific food preparation, a “distinct article or variety of food,” ready to eat, <br> or be served.</p>

  <div class="d-flex justify-content-between mt-5">
    
    <div class="ms-5">
      
    <img src="images/1688351372_.jpg" class="rounded-circle shadow" style=" object-fit: cover;" width="300px" height="300px"  alt="...">
  <h3 class = "mt-5 me-5 text-center fw-bold">birthday cakes</h3>
  <p class = "text-center">birthday cakes for children , elder and grand pa and ma are all avialable </p>
  </div>
    <div class="ms-5"> <img src="images/1689032196_louise123.jpg" class="rounded-circle shadow" style=" object-fit: cover;" width="300px" height="300px"  alt="...">
    <h3 class = "mt-5 me-5 text-center fw-bold">Weding cakes</h3>
  <p class = "text-center">text-center ourfkljs sdkfl ksdjf sdfk sdkfjsd ksdjfskdjf sdkjfsdkjf sdf skjdf</p>
</div>
    <div class="ms-5"> <img src="images/1689145697_Julian Hood.jpg" class="rounded-circle shadow" style=" object-fit: cover;" width="300px" height="300px"  alt="...">
    <h3 class = "mt-5 me-5 text-center fw-bold">Celebration cakes</h3>
  <p class = "text-center">text-center ourfkljs sdkfl ksdjf sdfk sdkfjsd ksdjfskdjf sdkjfsdkjf sdf skjdf</p>
  </div>
  </div>
</div>



<div style="margin-left:41%; margin-top:3%;margin-bottom:4%">
 
  <a href="/home" class="btn btn-lg btn-info px-5 py-4 text-center my_card">View All Cakes <i class="fas fa-arrow-right-long"></i></a>

  </div>

       
  







  
    
@stop