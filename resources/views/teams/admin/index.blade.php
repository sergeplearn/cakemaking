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
  


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
  
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> New Team member</h5>
        
      </div>
      <div class="modal-body">
        
      <form class=" needs-validation" novalidate method="POST" action="{{route('team.store')}}" enctype="multipart/form-data" >
@csrf 

<div class="form-group">
    <label for="validationCustom05" class="form-label">name of person</label>
    <input type="text" name="nameofperson" class="form-control" id="validationCustom05" required>
    <div class="invalid-feedback">
      Please provide a valid name of person.
    </div>
  </div>

  <div class="form-group">
    <label for="validationCustom05" class="form-label">position</label>
    <input type="text" name="position" class="form-control" id="validationCustom05" required>
    <div class="invalid-feedback">
      Please provide a valid name of cake.
    </div>
  </div>

  <div class="form-group">
    <label for="validationCustom05" class="form-label">phone number</label>
    <input type="text" name="tell" class="form-control" id="validationCustom05" required>
    <div class="invalid-feedback">
      Please provide a valid tell.
    </div>
  </div>

  <div class="form-group">
    <label for="validationCustom05" class="form-label">more</label>
   
    <textarea class="summernote form-control" name="more" required></textarea>
    <div class="invalid-feedback">
      Please provide a valid more.
    </div>
  </div>


  <label class="form-label" for="customFile"> half photo</label>
<input type="file" name="image"  value="{{ old('image') }}" class="form-control-file">
    <div class="invalid-feedback d-block">    </div>
  

  <div class="form-group">
    <button class="btn btn-primary my_card text-white" type="submit">Submit form</button>
  </div>
</form>



<script>
  $('.summernote').summernote({
    placeholder:'more about the cake',
    tabsize:2,
    height:300,
  });
</script>

     

      </div>
      
    </div>
  </div>
</div>






<button type="submit" class="btn btn-info btn-small  mb-3 my_card text-white" data-toggle="modal" data-target="#exampleModal">+ new team member</button>

          
<table class="table m-1" id="example">
  <thead >
    <tr>
  
      <th  scope="col">name of cake</th>
      <th  scope="col">preson</th>
      <th  scope="col">edit</th>
      <th  scope="col">Delete</th>
      
      
    </tr>
  </thead>
  <tbody>
    

@foreach($team as $teams)

<!-- Modal -->
<div class="modal fade" id="exampleModall{{$teams->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Teams</h5>
        
      </div>
      <div class="modal-body">
        

        
      <form class=" needs-validation" novalidate method="POST" action="{{route('team.update',$teams->id)}}" enctype="multipart/form-data" >
        @method('patch')
@csrf 

<div class="form-group">
    <label for="validationCustom05" class="form-label">name of person</label>
    <input type="text" name="nameofperson" class="form-control" value="{{$teams->nameofperson}}" id="validationCustom05" required>
    <div class="invalid-feedback">
      Please provide a valid name of person.
    </div>
  </div>

  <div class="form-group">
    <label for="validationCustom05" class="form-label">position</label>
    <input type="text" name="position" class="form-control" value="{{$teams->position}}" id="validationCustom05" required>
    <div class="invalid-feedback">
      Please provide a valid name of cake.
    </div>
  </div>

  <div class="form-group">
    <label for="validationCustom05" class="form-label">phone number</label>
    <input type="text" name="tell" class="form-control" value="{{$teams->tell}}" id="validationCustom05" required>
    <div class="invalid-feedback">
      Please provide a valid tell.
    </div>
  </div>

  <div class="form-group">
    <label for="validationCustom05" class="form-label">more</label>
   
    <textarea class="summer form-control" name="more" required>{{$teams->more}}</textarea>
    <div class="invalid-feedback">
      Please provide a valid more.
    </div>
  </div>


  <label class="form-label" for="customFile"> half photo</label>
<input type="file" name="image"  value="{{ $teams->image_path }}" class="form-control-file">
    <div class="invalid-feedback d-block">    </div>
  

  <div class="form-group">
    <button class="btn btn-primary my_card text-white" type="submit">Submit form</button>
  </div>
</form>



<script>
  $('.summer').summernote({
    placeholder:'more about the cake',
    tabsize:2,
    height:300,
  });
</script>




      </div>
      
    </div>
  </div>
</div>


<!-- delete model -->
<div class="modal fade" id="exampleModaldel{{$teams->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
        <form action=" {{route('team.destroy',$teams)}}" method="post">
        @csrf
        @method('DELETE')
       <button type="submit" class="btn btn-small btn-danger my_card text-white">Delete</button>
       </form>
      </div>
    </div>
  </div>
</div>
    <tr>
      
     
      <td>
        
      <div class="d-flex align-items-center">
          <img
              src="{{ asset('images/' . $teams->image_path)  }}"
              alt=""
              style="width: 45px; height: 45px"
              class="rounded-circle"
              />
          <div class="ms-3">
            
          <p class="text-muted mb-0">Name: <b> {{ $teams->nameofperson}}   </b> </p>
          </div>
        </div>
      
      </td>
     
      <td>
      <div class="">
            <p class="fw-bold mb-1">tell: <b> {{ $teams->tell}}   </b> </p>
          <p class="text-muted mb-0">position: <b> {{ $teams->position}} </b> </p>
          </div>  
      </td>
      <td>
      
        <button type="button" class="btn btn btn-small btn-info my_card text-white" data-toggle="modal" data-target="#exampleModall{{$teams->id}}">
 <i class="far fa-pen-to-square"></i>  edit
</button>
      </td>
    
      <td><button type="button" class="btn btn-danger my_card text-white" data-toggle="modal" data-target="#exampleModaldel{{$teams->id}}">
      <i class="fas fa-trash"></i> Delete
</button></td>


    </tr>


    
   @endforeach
   
  </tbody>
</table>




@stop