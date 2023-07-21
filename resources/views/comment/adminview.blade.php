
@extends('layouts.apps')
@section('content')




<section style="background-color: #eee;">
  <div class="container my-5 py-5">
    <div class="row d-flex justify-content-center">
      <div class="col-md-12 col-lg-10 col-xl-8">

      <div class="overflow-auto mt-1 bg-light"style="max-width: 100%; max-height: 200px; ">
      @foreach($comments as $comment)
        <div class="card my-4">
          <div class="card-body">
            <div class="d-flex flex-start align-items-center">
              <img class="rounded-circle shadow-1-strong me-3"
                src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(19).webp" alt="avatar" width="60"
                height="60" />
              <div>
                <h6 class="fw-bold text-primary mb-1">{{ $comment->user->name}}</h6>
                <p class="text-muted small mb-0">
                  Shared publicly - Jan 2020
                </p>
              </div>
            </div>

            <p class="mt-3 mb-4 pb-2">
            {{ $comment->comment}}
            </p>
            <div class="float-end mt-2 pt-1">
              <button type="button" class="btn btn-danger btn-sm my_card text-white">Delete comment</button>
              
            </div>
            
        </div>
        

      </div>
      @endforeach
      </div>
    </div>
  </div>
</section>










@stop