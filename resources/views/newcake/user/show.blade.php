@extends('layouts.everyone')
@section('css')
<style>
  
  img{
   
    aspect-ratio:1/1;
    display:block;
    object-position: center;
  
  }
  .blur-load {
    background-size: cover;
    background-position: center
  }
  .footer{
   position: absolute;
   bottom:0;
   right:0;
   
   
  }
  .scroll {
    
    overflow-y: auto;
    max-width: 100%;
     max-height: 280px;
    
}
</style>
@stop

@section('content')

<?php
   $totallikes = 0;
   ?>
@foreach($newcake->likes as $like)
<p class="d-none">
{{ $count = 1 }}
</p>
<?php $totallikes += $count ?>
@endforeach

<?php
   $totalunlikes = 0;
   ?>
@foreach($newcake->unlikes as $unlike)
<p class="d-none">
{{ $uncount = 1 }}
</p>
<?php $totalunlikes += $uncount ?>

@endforeach


@if($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach($errors->all() as $errors)
      {{ $errors }}
      @endforeach
    </ul>
  </div>
  @endif



  <?php

//$date = date("Y/m/d");
//$d=(strtotime($date) - strtotime( $comment->created_at ));
 //$month = 60*60*24*7*4;
//$total =ceil($d/$month);
//echo $total;
?>
<!-- Modal -->
<div class="modal fade" id="exampleModal"  class="row d-flex justify-content-center my-5 py-2  " tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel"> comment</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="{{route('comment.store')}}" method="post">
                     @csrf
       
        
        
          <div class="card-footer py-3 border-0" style="background-color: #f8f9fa;">
            <div class="d-flex flex-start w-100">
              <div class="form-outline w-100">
                <textarea name="comment" class="form-control" placeholder="Type comment..." id="textAreaExample" rows="4"
                style="background: #fff;"></textarea>
                
                
              
              </div>
              <input type="hidden" name="newcake_id" value="{{ $newcake->id }}">
            </div>
            
          
        </div>
        
    
      </div>
      <div class="modal-footer">
        
      <button type="submit"  class="btn btn-primary btn-sm button1 text-white">Post comment</button>
      </div>
      </form>
    </div>
  </div>
</div>




<div class="card mt-4 border-0">


<div class="row m-3">
      <div class="col-md-4">
       
      <img src="{{ asset('images/' . $newcake->image_path)  }}" class="card-img-top img-fluid" alt="Fissure in Sandstone" width='500px' height='500px'/>
      

      
  
      <ul class="mt-1" style="display: flex; list-style-type: none;">
        <li class="m-1 my_card"><form action="{{ route('like.store')}}" method="post">
        @csrf
        <input type="hidden" value ="1" name = "like">
        <input type="hidden" value ="{{ Auth::user()->id }}" name = "user_id">
        <input type="hidden" value ="{{ $newcake->id}}" name = "newcake_id">
        <button type="submit" class="btn rounded-pill shadow-lg"><i class="fas fa-thumbs-up me-2"></i> {{ $totallikes }}</button>
       </form> </li>

        <li class="m-1 my_card"><form action="{{ route('unlike.store')}}" method="post">
        @csrf
        <input type="hidden" value ="0" name = "unlike">
        <input type="hidden" value ="{{ Auth::user()->id }}" name = "user_id">
        <input type="hidden" value ="{{ $newcake->id}}" name = "newcake_id">
        <button type="submit" class="btn btn-rounded  rounded-pill shadow-lg"><i class="fas fa-thumbs-down me-2"></i> {{ $totalunlikes }}</button>
       </form> 
       </li>
        <li class="m-1 my_card"><button  data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn rounded-pill shadow-lg"><i class="far fa-comment-dots"></i> comment</button></li>
      </ul>

      

       
      
       

    
      </div>
      <div class="col-md-8 rounded ">

      
      
      
  
    <h3 class="card-title fw-bolder mb-2 mt-1 text-center">{{ $newcake->nameofcake}}</h3>

    
    <div class="scroll mt-0">
   
    <p class="card-text lh-* text-center m-5">{!! $newcake->more !!}.</p>
    </div>
  <div class="footer ">
    <span class="text-gray-500">
      By <span class="fw-bold fst-italic fs-4 text-gray-800">{{ $newcake->user->name }}</span>,Created on {{
        date('jS M Y', strtotime($newcake->updated_at))
      }}
    </span>
    
    </div>

        
      </div>
    
   </div>
   
   


   </div>
   
   <div class="" >
   <div class="overflow-auto  bg-light "style="max-width: 100%; max-height: 300px;  margin-bottom: 60px; margin-top: 80px;">

 
    

      @forelse($newcake->comments as $comment)



<!--comment update Modal -->

<!-- Modal -->
<div class="modal fade" id="exampleModalcomment{{ $comment->id}}" class="row d-flex justify-content-center my-5 py-2  " tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel"> comment update</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="{{ route('comment.update',$comment->id)}} " method="post">
      @method('patch')
                     @csrf
       
        
        
          <div class="card-footer py-3 border-0" style="background-color: #f8f9fa;">
            <div class="d-flex flex-start w-100">
              <div class="form-outline w-100">
                <textarea name="comment" class="form-control" placeholder="Type comment..." id="textAreaExample" rows="4"
                style="background: #fff;">{{ $comment->comment}}</textarea>
                
                
              
              </div>
              <input type="hidden" name="newcake_id" value="{{ $comment->newcake_id }}">
            </div>
            
          
        </div>
        
    
      </div>
      <div class="modal-footer">
      <button type="submit"  class="btn btn-primary btn-sm button1 text-white">update comment</button>
      </div>
      </form>
    </div>
  </div>
</div>





<!-- Modal delete comment -->
<div class="modal fade" id="exampleModalcommentdel{{ $comment->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
       
      </div>
      <div class="modal-body">
        Are u sure u want to delete ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
        <form action="{{route('comment.destroy',$comment->id)}}" method="post">
        @csrf
        @method('DELETE')
       <button type="submit" class="btn btn-small btn-danger my_card text-white">Yes</button>
       </form>
      </div>
    </div>
  </div>
</div>













                                                        <!-- Modal reply comment -->


<div class="modal fade" id="exampleModal{{$comment->id}}" tabindex="-1" class="row d-flex justify-content-center my-5 py-2  "  aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Reply comment</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="{{ route('replycomment.store')}}" method="post">
                     @csrf
        
        
        
          <div class="card-footer py-3 border-0" style="background-color: #f8f9fa;">
            <div class="d-flex flex-start w-100">
              <div class="form-outline w-100">
                <textarea name="reppply" class="form-control" placeholder="Type comment..." id="textAreaExample" rows="4"
                style="background: #fff;"></textarea>
                
                
              
              </div>
             
            </div>
            <input type="hidden" name="comment_id" value="{{ $comment->id }}">
              <input type="hidden" name="newcake_id" value="{{ $newcake->id }}">
              <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
            
          
        </div>
        
    

      </div>
      <div class="modal-footer">
        
      <button type="submit"  class="btn btn-primary btn-sm button1 text-white">Post comment</button>
      </div>
      </form>
    </div>
  </div>
</div>















        <div class="card mb-1 mx-2 mt-3">
          <div class="card-body ">
            <h4 class="text-center mb-4 pb-2"> comments </h4>
              
            <div class="row">
              <div class="col">
                <div class="d-flex flex-start">


                <div class="dropdown show my_card">
  <a  href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
  <img class="rounded-circle shadow-1-strong me-3"
                    src="{{ asset('images/' . optional($comment->user->upload_img)->image_path)  }}" alt="avatar" width="60"
                    height="60" />
  </a>

  <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
    <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#exampleModalcomment{{ $comment->id}}" class="btn shadow-lg">edit</a></li>
    
    <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#exampleModalcommentdel{{ $comment->id}}"  class="btn shadow-lg">delete</a></li>
  </ul>
</div>




                  
                  <div class="flex-grow-1 flex-shrink-1">
                    <div>
                      <div class="d-flex justify-content-between align-items-center">
                        <p class="mb-1">
                        {{ $comment->user->name }}  <span class="small">- 2 hours  
 <?php
  
 $total = abs(time() - strtotime( $comment->created_at));
 // $dates;
  

//$date = date("Y-m-d h:i:sa");
//$d=(strtotime($date) - strtotime( $comment->created_at));
 //$month = 60*60*24;
 //$total = $d/$month;

  echo $total/60;
 

?></span>
                        </p>
                        
                        <button style="float:right" type="button" class="btn my_card" data-bs-toggle="modal" data-bs-target="#exampleModal{{$comment->id}}">
                        <i class="fas fa-reply fa-xs"></i><span class="small"> reply</span>
                             </button>
                      </div>
                      <p class="small mb-0">
                      {{ $comment->comment }} 
                      </p>
                    </div>
                    @foreach($comment->replycomments as $reply)




                                                       <!-- Modal deleting reply comment -->


 

<!-- Modal -->
<div class="modal fade" id="exampleModaldel{{$reply->id}}" class="row d-flex justify-content-center my-5 py-2  "  tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">delete comment</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      Are u sure u want to delete
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <form action="{{route('replycomment.destroy',$reply->id)}}" method="post">
        @csrf
        @method('DELETE')
       <button type="submit" class="btn btn-small btn-danger my_card text-white">Delete</button>
       </form>

      </div>
    </div>
  </div>
</div>



 



                                                       <!-- Modal update reply comment -->



<!-- Modal -->
<div class="modal fade" id="exampleModaupdatel{{$reply->id}}" class="row d-flex justify-content-center my-5 py-2  "  tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Edit Reply comment</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="{{ route('replycomment.update',$reply->id)}}" method="post">
      @method('patch')
                     @csrf
                    
       
        
        
          <div class="card-footer py-3 border-0" style="background-color: #f8f9fa;">
            <div class="d-flex flex-start w-100">
              <div class="form-outline w-100">
                <textarea name="reppply" class="form-control" placeholder="Type comment..." id="textAreaExample" rows="4"
                style="background: #fff;">{{ $reply->reppply }}</textarea>
                
                
              
              </div>
             
            </div>
            <input type="hidden" name="comment_id" value="{{ $reply->comment_id }}">
              <input type="hidden" name="newcake_id" value="{{ $reply->newcake_id }}">
              <input type="hidden" name="user_id" value="{{ $reply->user_id }}">
           
          
        </div>
        
    
      </div>
      <div class="modal-footer">
      <button type="submit"  class="btn btn-primary btn-sm button1 text-white">update reply</button>

      </div>
      </form>
    </div>
  </div>
</div>








 













                    <div class="d-flex flex-start mt-4">

                    <div class="dropdown show my_card">
  <a  href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
  <img class="rounded-circle shadow-1-strong me-3"
                          src="{{ asset('images/' .  optional($reply->user->upload_img)->image_path)  }}" alt="avatar"
                          width="60" height="60" />
  </a>

  <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
    <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#exampleModaupdatel{{$reply->id}}" class="btn shadow-lg">edit</a></li>
    <li><a class="dropdown-item" href="#" class="btn shadow-lg" data-bs-toggle="modal" data-bs-target="#exampleModaldel{{$reply->id}}">Delete</a></li>
   
  </ul>
</div>

                      
                      <div class="flex-grow-1 flex-shrink-1">
                        <div>
                          <div class="d-flex justify-content-between align-items-center">
                            <p class="mb-1">
                            {{ $reply->user->name }} <span class="small">- 3 hours ago</span>
                            </p>
                          </div>
                          <p class="small mb-0">
                          {{ $reply->reppply }}
                          </p>
                        </div>
                      </div>
                    </div>


                  
                        
                          
                    @endforeach
                    
                  </div>
                </div>

                
              </div>
            </div>
          </div>
        </div>
        
        
        @empty
          <h6 class="text-center">No comment yet</h6>
        @endforelse
      


</div> 
</div> 












                </div>











                
                   
@stop