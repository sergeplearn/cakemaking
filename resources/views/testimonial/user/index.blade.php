@extends('layouts.everyone')
@section('css')
<style>
#img{
    
}.user-img {
    float:right
}
</style>
@stop

@section('content')

<header class="py-4">
            <div class=" px-lg-5">
                <div class="p-4 p-lg-5 bg-light rounded-3 text-center">
                    <div class="m-4 m-lg-5">
                        <h1 class="display-5 fw-bold">A warm cake welcome!</h1>
                        <p class="fs-4">Bootstrap utility classes are used to create this jumbotron since the old component has been removed from the framework. Why create custom CSS when you can use utilities?</p>
                      
                    </div>
                </div>
            </div>
        </header>

@foreach($testimonial as $testimonial)
      <div class="card mt-4    mb-4 shadow">

      <h3 class="card-title fw-bolder text-center mb-2 m-2 mt-2 ps-3 pe-3">{{ $testimonial->nameofperson}}</h3>
    
      <p class="text-center mb-2"><i>{{$testimonial->position}}.</i></p>
      <hr class="hr hr-blurry px-1 shadow" style="width:100px; margin: auto; height:4px" />
      <div class="ps-4 pe-4">
      
      
    
      <blockquote class="card-text blockquote text-break ">
      <i class="fas fa-quote-left fa-3x"></i>
      {!!$testimonial->more!!}
      <i class="fas fa-quote-right fa-3x float-end"></i>
      </blockquote>
      
      </div>
      
      <hr class="hr hr-blurry px-1 shadow" style="height:4px" />
     <div class="align-items-center d-flex align-items-center justify-content-center ">
         <img src="{{ asset('images/' . $testimonial->image_path)  }}" class="rounded-circle pb-2" width='150px' height='150px' alt="" id="img">
         </div>
      </div>


      @endforeach

@stop

