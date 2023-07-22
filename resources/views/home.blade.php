@extends('layouts.everyone')
@section('css')
<style>
  img{
    width:100%;
    aspect-ratio:1/1;
    display:block;
    object-position: center;
    
  }
  .blur-load {
    background-size: cover;
    background-position: center
  }
</style>
@stop
@section('content')





  
  
          
<iframe class="" width="1200" height="415" src="https://www.youtube.com/embed/dRdinLuopTo" title="YouTube video player" frameborder="1" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" ></iframe>
 
  
               

<header class="py-5">
  
            <div class=" px-lg-5">
                <div class="p-4 p-lg-5 bg-light rounded-3 text-center">
                    <div class="m-3 m-lg-5">
                        <h1 class="display-5 fw-bold">A warm cake welcome!</h1>
                        <p class="fs-4">Bootstrap utility classes are used to create this jumbotron since the old component has been removed from the framework. Why create custom CSS when you can use utilities?</p>
                      
                    </div>
                </div>
            </div>
        </header>




<section>
  <div class="mb-5">
    
  



    <div class="row">
    @foreach($cakes as $cake)
      <div class="col-lg-3 col-md-6 col-sm-6 d-flex">
        <div class="card w-100 my-2 shadow-2-strong  my_card ">
        <a href="{{route('newcake.show',$cake->id)}}" class=" text-decoration-none ">
          <img src="{{ asset('images/' . $cake->image_path)  }}" loading="lazy" class="card-img-top object-fit: cover;" style="aspect-ratio: 1 / 1" />
          <div class="card-body d-flex flex-column">
            <h6 class="card-title text-center text-dark">{{ $cake->nameofcake}} cake</h6>
            <p class="card-text lh-1 text-muted ">Made by: <b>{{ $cake->nameofperson}}</b> </p>
            <p class="card-text lh-1 text-muted ">Phone No: <b> {{ $cake->tell}}</b> </p>
            <p class="card-text text-muted lh-1 text-black">Amount: <b>{{ $cake->price}}</b> Frs</p>
            
            
          </div>
          </a>
        </div>
      </div>
      
      @endforeach 
</div>

</div>
</section>










@stop