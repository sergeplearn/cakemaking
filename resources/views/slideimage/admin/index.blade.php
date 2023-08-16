@extends('layouts.apps')
@section('content')



@include('alert.index')
  @if($errors->any())
  <div class="alert alerts alert-danger">
    <ul>
      @foreach($errors->all() as $errors)
      {{ $errors }}
      @endforeach
    </ul>
  </div>
  @endif

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
  
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> New Slide image</h5>
        
      </div>
      <div class="modal-body">
        
      <form class=" needs-validation" novalidate method="POST"  action="{{route('slideimage.store')}}" enctype="multipart/form-data" >
@csrf 

<div class="form-group">
    <label for="validationCustom05" class="form-label">title</label>
    <input type="text" name="title" class="form-control" id="validationCustom05" required>
    <div class="invalid-feedback">
      Please provide a valid name of title.
    </div>
  </div>




  <div class="form-group">
    <label for="validationCustom05" class="form-label">active</label>
    <input type="text" name="active" class="form-control" id="validationCustom05" >
   
  </div>

  

  <div class="form-group">
    <label for="validationCustom05" class="form-label">blog</label>
   
    <textarea class="summernote form-control" name="blog" required></textarea>
    <div class="invalid-feedback">
      Please provide a valid bog.
    </div>
  </div>

  <div class="form-group">
  <label class="form-label" for="customFile"> image</label>
<input type="file" name="image"   class="form-control-file">
    <div class="invalid-feedback d-block">    </div>
 
   </div>

  <div class="form-group">
    <button class="btn btn-primary my_card text-white" type="submit">Submit form</button>
  </div>
</form>




     

      </div>
      
    </div>
  </div>
</div>


@include('alert.index')





<button type="submit" class="btn btn-info btn-small  mb-3 my_card text-white" data-toggle="modal" data-target="#exampleModal"> new slideimage  <i class="fas fa-plus fa-lg"></i></button>

          
<table class="table m-1" id="example">
  <thead >
    <tr>
  
      <th  scope="col"> image </th>
      <th  scope="col">title</th>
      <th  scope="col">edit</th>
      <th  scope="col">Delete</th>
      
      
    </tr>
  </thead>
  <tbody>
@foreach($slideimage as $slideimage)
    <tr>
      
     
      <td>
        
      <div class="d-flex align-items-center">
          <img
              src="{{ asset('images/' . $slideimage->image_path)  }}"
              alt=""
              style="width: 45px; height: 45px"
              class="rounded-circle"
              />
          
        </div>
      
      </td>
     
      <td>
      <div class="">
            <p class="fw-bold mb-1"> {{$slideimage->title}} </p>
         
          </div>  
      </td>
      <td>
    edit
      </td>
    
      <td>
        delete
      </td>


    </tr>

    
    @endforeach
   
  </tbody>
</table>




@stop