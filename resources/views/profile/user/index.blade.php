

@extends('layouts.everyone')
@section('content')






@include('alert.index')

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      @if(empty($User->upload_img->id))
<p>please first of all upload a image</p>
@else
      <form action="{{route('upload_img.update',$User->upload_img->id) }} " method="post" enctype="multipart/form-data">
          @csrf
       @method('patch')
          <input type="hidden" value="{{ $User->id }}" name ="user_id">

          <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Profile picture') }}</label>
                           
                            <div class="col-md-6">
                                <input id='image' type="file"  class="form-control" name="image" autocomplete="image">

                               
                            </div>
                        </div>
                        
       
      </div>
      <div class="modal-footer">
      <button type="submit" class="btn btn-primary">Save changes</button>

      </div>
      </form>

@endif




      
      </div>
    </div>
  </div>
</div>










<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">

   

<div class="row my-4">
    <div class="col-md-2">

    </div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-header section-bg text-black">
                profile page
            </div>
            <div class="card-body">
             <div class="row">
                <div class="col-md-8">
                 <span class="h4">  profile profile info</span><a class="btn btn-info btn-small edit " href="">Edit</a>
                    <hr>

                    <table class="table bg-white table-borderless pt-2">
                        <tr>
                            <th scope="row">name</th>
                            <td>{{ $User->name}}</td>
                        </tr>
                        <tr>
                            <th scope="row">email</th>
                            <td>{{ $User->email}}</td>
                        </tr>

                        <tr>
                            <th scope="row">role</th>
                            <td>{{ $User->user_role}}</td>
                        </tr>

                        
                    </table>
                </div>
                <div class="col-md-4">
                    
               <a href="" class="my-card" data-bs-toggle="modal" data-bs-target="#exampleModal"><img class="img-thumbnail my_card" src="{{ asset('images/' .optional($User->upload_img)->image_path)  }}" alt=""></a> 
             </div>


             </div>

            



            </div>
        </div>
    </div>


</div>


<hr>

<div class="text-center"><h3>uploading a new profile image</h3></div>



@if (Auth::check()) 

<div class="row text-center mb-3">
        <div class="col-md-4"></div>
        <div class="col-md-4">


      <form action="{{ route('upload_img.store')}}" method="post" enctype="multipart/form-data">
          @csrf
       
          <input type="hidden" value="{{  $User->id }}" name ="user_id">

          
                            
                           
                           
                            <label for="file" class=" col-form-label text-md-end">{{ __('Profile picture') }}</label>
                                <input id='image' type="file" class="form-control" name="image" autocomplete="image">

                               
                        
                        
                        
       
    
      <div class="text-center pt-3">
      <button type="submit" class="btn btn-primary my_card">Save changes</button>

      </div>

      

      </form>

      </div>
      </div>

   
@endif




</div>
</div>



@stop