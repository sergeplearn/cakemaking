@extends('layouts.apps')
@section('content')



  
  @if($errors->any())
  <div class="alert alerts alert-danger">
    <ul>
      @foreach($errors->all() as $errors)
      {{ $errors }}
      @endforeach
    </ul>
  </div>
  @endif




@include('alert.index')

          
<table class="table m-1" id="example">
  <thead >
    <tr>
  
      <th  scope="col">name of cake</th>
      <th  scope="col">preson</th>
      <th  scope="col">recover</th>
    
      
      
    </tr>
  </thead>
  <tbody>
    @foreach($cakes as $cake)

    <!-- delete model -->
<div class="modal fade" id="exampleModal{{ $cake->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Cake</h5>
        
      </div>
      <div class="modal-body">
       Are u sure u want to undelete
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <form action="/admin/deleted_items/{{ $cake->id}}" method="get">
        @csrf
       
       <button type="submit" class="btn btn-small btn-danger my_card text-white">recover</button>
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
     
    

    
    <td><button type="button" class="btn btn-danger my_card text-white" data-toggle="modal" data-target="#exampleModal{{ $cake->id }}">
      <i class="fas fa-trash-restore"></i>recover
      
</button></td>
      
     
    </tr>

    
    @endforeach
   
  </tbody>
</table>




@stop