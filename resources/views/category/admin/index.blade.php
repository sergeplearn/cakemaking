@extends('layouts.apps')
@section('content')



@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
  
@include('alert.index') 

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
  
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> New categories</h5>
        
      </div>
      <div class="modal-body">
        
      <form class=" needs-validation" novalidate method="POST" action="{{route('categories.store')}}" enctype="multipart/form-data" >
@csrf 

<div class="form-group">
    <label for="validationCustom05" class="form-label">category</label>
    <input type="text" name="category" class="form-control" id="validationCustom05" required>
    <div class="invalid-feedback">
      Please provide a valid name of person.
    </div>
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

<div class="row">
  <div class="col-md-1">

  </div>
  <div class="col-md-10">

 

<button type="submit" class="btn btn-info btn-small text-center mb-3 my_card text-white" data-toggle="modal" data-target="#exampleModal">+ categories</button>

          
<table class="table m-1" id="example">
  <thead >
    <tr>
  
      <th class="text-center" scope="col">number</th>
      <th class="text-center" scope="col">preson</th>
      <th class="text-center" scope="col">edit</th>
      <th class="text-center" scope="col">Delete</th>
      
      
    </tr>
  </thead>
  <tbody>
    
<?php
$count = 1
?>
@foreach($categories as $categories)

<!-- delete model -->
<div class="modal fade" id="exampleModal{{$categories->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Cake</h5>
        
      </div>
      <div class="modal-body">
        Are u sure u want to delete
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <form action=" " method="post">
        @csrf
        @method('DELETE')
       <button type="submit" class="btn btn-small btn-danger my_card text-white">Delete</button>
       </form>
      </div>
    </div>
  </div>
</div>
    <tr>
      
     
      <td class="text-center">
        
     {{ $count++ }}
      
      </td>
     
      <td class="text-center">
     {{$categories->category}}
      </td>
      <td class="text-center">
      
       <button class="btn btn-sm btn-info">Edit</button>
      </td>
    
      <td class="text-center">
      <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#exampleModal{{$categories->id}}">Delete</button>
      </td>


    </tr>


    @endforeach

   
  </tbody>
</table>

</div>
  <div class="col-md-1"></div>
</div>



@stop