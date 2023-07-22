@extends('layouts.everyone')
@section('css')

@stop

@section('content')

<header class="py-2">
            <div class=" px-lg-5">
                <div class="p-4 p-lg-5 bg-light rounded-3 text-center">
                    <div class="m-4 m-lg-5">
                        <h1 class="display-5 fw-bold">A warm cake welcome!</h1>
                        <p class="fs-4">Bootstrap utility classes are used to create this jumbotron since the old component has been removed from the framework. Why create custom CSS when you can use utilities?</p>
                      
                    </div>
                </div>
            </div>
        </header>
@foreach($team as $teams)
<div class="card mt-4 border-0 mb-4">


<div class="row m-3">
      <div class="col-md-8">
      <h3 class="card-title  fw-bolder mb-2 mt-2 ">{{ $teams->nameofperson}}</h3>
      <p><i>{{ $teams->position }}</i></p>
      <hr class="hr hr-blurry px-1 shadow-lg" style="height:4px" />
      <p class="card-text text-left text-break  mt-4 ">
      {!!$teams->more!!}
      </p>
</div>
      <div class="col-md-4">
         <img src="{{ asset('images/' . $teams->image_path)  }}" width='70%' height='70%' class="rounded-circle " id="img" alt="">
      </div>
      </div>
      </div>

@endforeach

    








@stop

