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






  
        

 
  
               





<section>
  <div class="mb-5">
    
  



    <div class="row">
    @foreach($cakes as $cake)

    <?php  
            $totalreply = 0;
            ?>
    
          @foreach($cake->comments as $comment)
          @foreach($comment->replycomments as $reply)
          <?php  
            $totalreply += 1;
            ?>

          @endforeach

         @endforeach


      <div class="col-lg-3 col-md-6 col-sm-6 d-flex">
        <div class="card w-100 my-2 shadow-2-strong  my_card ">
        <a href="{{route('newcake.show',$cake->id)}}" class=" text-decoration-none ">

        <div class="cardcontainer">
          <div class= photo>
          <img src="{{ asset('images/' . $cake->image_path)  }}" loading="lazy" class="card-img-top object-fit: cover;" style="aspect-ratio: 1 / 1" />
          </div>
          <div class="card-body d-flex flex-column">
            <?php  
            $total = 0;
            ?>
          @foreach($cake->comments as $comment)

<?php  
            $total += 1;
            ?>
@endforeach


            <h6 class="card-title text-center text-dark">{{ $cake->nameofcake}} cake</h6>
            <p class="card-text lh-1 text-muted ">Made by: <b>{{ $cake->nameofperson}}</b> </p>
            <p class="card-text lh-1 text-muted ">Phone No: <b> {{ $cake->tell}}</b> </p>
            <p class="card-text text-muted lh-1 text-black">Amount: <b>{{ $cake->price}}</b> Frs</p>
            <p class="txt3"><i class="far fa-clock"></i>{{ $cake->created_at->diffForHumans()}} <span class="comments"><i class="fas fa-comments"></i><?php  echo $totalreply + $total;?> Comments</span></p>
            
            
          </div>
          </div>
          </a>
        </div>
      </div>
      
      @endforeach 
</div>

</div>
</section>










@stop