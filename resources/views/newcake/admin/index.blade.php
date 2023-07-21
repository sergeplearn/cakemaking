@extends('layouts.apps')
@section('content')



  
  @if($errors->any())
  <div class="alert alert-danger">
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
        <h5 class="modal-title" id="exampleModalLabel"> New Cake</h5>
        
      </div>
      <div class="modal-body">
        
      <form class=" needs-validation" novalidate method="POST" action="{{route('newcake.store')}}" enctype="multipart/form-data" >
@csrf 

<div class="form-group">
    <label for="validationCustom05" class="form-label">name of person</label>
    <input type="text" name="nameofperson" class="form-control" id="validationCustom05" required>
    <div class="invalid-feedback">
      Please provide a valid name of person.
    </div>
  </div>

  <div class="form-group">
    <label for="validationCustom05" class="form-label">name of cake</label>
    <input type="text" name="nameofcake" class="form-control" id="validationCustom05" required>
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
    <label for="validationCustom05" class="form-label">price</label>
    <input type="text" name="price" class="form-control" id="validationCustom05" required>
    <div class="invalid-feedback">
      Please provide a valid price.
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





@can('create',App\Models\newcake::class)
<button type="submit" class="btn btn-info btn-small  mb-3 my_card text-white" data-toggle="modal" data-target="#exampleModal">+ new cake</button>
@endcan
          
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
    @foreach($cakes as $cake)

   

<!-- Modal -->
<div class="modal fade" id="exampleModall{{ $cake->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Cake</h5>
        
      </div>
      <div class="modal-body">
        


      <form class=" needs-validation" novalidate method="POST" action="{{ route('newcake.update',$cake->id)}}"  enctype="multipart/form-data" >
    @method('patch')
@csrf 
<div class="form-group">
    <label for="validationCustom05" class="form-label">name of person</label>
    <input type="text" name="nameofperson" value="{{ $cake->nameofperson }}" class="form-control shadow-xl rounded-xl placeholder-gray-50::placeholder" id="validationCustom05" required>
    <div class="invalid-feedback">
      Please provide a valid name of person.
    </div>
  </div>

  <div class="form-group">
  <input type="hidden" name="user_id" value="{{ $cake->user_id}}" class="form-control" id="validationCustom05" required>
    <label for="validationCustom05" class="form-label">name of cake</label>
    <input type="text" name="nameofcake" value="{{ $cake->nameofcake }}" class="form-control" id="validationCustom05" required>
    <div class="invalid-feedback">
      Please provide a valid name of cake.
    </div>
  </div>

  <div class="form-group">
    <label for="validationCustom05" class="form-label">phone number</label>
    <input type="text" name="tell" value="{{ $cake->tell }}" class="form-control" id="validationCustom05" required>
    <div class="invalid-feedback">
      Please provide a valid tell.
    </div>
  </div>

  <div class="form-group">
    <label for="validationCustom05" class="form-label">price</label>
    <input type="text" name="price" value="{{ $cake->price }}" class="form-control" id="validationCustom05" required>
    <div class="invalid-feedback">
      Please provide a valid price.
    </div>
  </div>

  <div class="form-group">
    <label for="validationCustom05" class="form-label">more</label>
   
    <textarea class="summer form-control"  name="more" required>{{ $cake->more }}</textarea>
    <div class="invalid-feedback">
      Please provide a valid more.
    </div>
  </div>


  
  <div class="form-group text-center">
    <button class="btn btn-info my_card  font-bold  rounded-full" type="submit">Submit form</button>
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
<div class="modal fade" id="exampleModal{{ $cake->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
        <form action="{{route('newcake.destroy',$cake->id)}}" method="post">
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
              src="{{ asset('images/' . $cake->image_path)  }}"
              alt=""
              style="width: 45px; height: 45px"
              class="rounded-circle"
              />
          <div class="ms-3">
            <p class="fw-bold mb-1">{{ $cake->nameofcake}}</p>
          <p class="text-muted mb-0">Price: <b>{{ $cake->price}} Frs</b> </p>
          </div>
        </div>
      
      </td>
     
      <td>
      <div class="">
            <p class="fw-bold mb-1">Name: <b>{{ $cake->nameofperson}} </b> </p>
          <p class="text-muted mb-0">tell: <b>{{ $cake->tell}} </b> </p>
          </div>  
      </td>
      <td>
      @can('update',$cake)
        <button type="button" class="btn btn btn-small btn-info my_card text-white" data-toggle="modal" data-target="#exampleModall{{ $cake->id }}">
 <i class="far fa-pen-to-square"></i>  edit
</button>
      </td>
     @endcan
      @can('delete',$cake)  
      <td><button type="button" class="btn btn-danger my_card text-white" data-toggle="modal" data-target="#exampleModal{{ $cake->id }}">
      <i class="fas fa-trash"></i> Delete
</button></td>
@endcan

    </tr>


    
    @endforeach
   
  </tbody>
</table>




@stop