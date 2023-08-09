@extends('layouts.apps')
@section('content')


<div class="row">
    <div class="col-md-3 ">
        <a class="text-decoration-none text-dark" href="">
        <div class="card shadow my_card text-center p-3">
            <h4>Cake <i></i></h4>
            <h3>{{$newcakes->count()}}</h3>
        </div>
        </a>
    </div>

    <div class="col-md-3 ">
        <a class="text-decoration-none text-dark" href="">
        <div class="card shadow my_card text-center p-3">
            <h4>Teams <i></i></h4>
            <h3>{{$teams->count()}}</h3>
        </div>
        </a>
    </div>

    <div class="col-md-3 ">
        <a class="text-decoration-none text-dark" href="">
        <div class="card shadow my_card text-center p-3">
            <h4>Testimonials <i></i></h4>
            <h3>{{$testimonials->count()}} </h3>
        </div>
        </a>
    </div>

    <div class="col-md-3 ">
        <a class="text-decoration-none text-dark" href="">
        <div class="card shadow my_card text-center p-3">
            <h4>Users <i></i></h4>
            <h3>{{$users->count()}}</h3>
        </div>
        </a>
    </div>
</div>









@stop