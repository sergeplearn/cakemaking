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
        <h5 class="modal-title" id="exampleModalLabel"> Admin Registration</h5>
        
      </div>
      <div class="modal-body">
        
  
  <form method="POST" action="{{ route('User.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>


              
                        <div class="row mb-3">
                            <label for="role" class="col-md-4 col-form-label text-md-end">{{ __('role') }}</label>

                            <div class="col-md-6">

                            <select class="form-control @error('user_role') is-invalid @enderror" name="user_role" aria-label="Default select example" required>
  

  <option value="admin">Admin</option>
 

  
</select>
                                

                                @error('user_role')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                         
                    

     

      </div>
      <div class="modal-footer">
        
      <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>

      </div>
      </form>
    </div>
  </div>
</div>

@include('alert.index') 



<button type="submit" class="btn btn-info btn-small  mb-3 my_card text-white" data-toggle="modal" data-target="#exampleModal">+ New admin</button>

          
<table class="table m-1" id="example">
  <thead >
    <tr>
  
      <th  scope="col">name </th>
      <th  scope="col">email</th>
      <th  scope="col">role</th>
      <th  scope="col">edit</th>
      <th  scope="col">Delete</th>
      
      
    </tr>
  </thead>
  <tbody>
   @foreach($user as $users)
   <!-- Button edit modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal{{$users->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">update</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form method="POST" action="{{ route('User.update',$users->id) }}" >
      @method('patch')
                        @csrf
                       
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ $users->name }}" required  autofocus>

                              
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control " name="email" value="{{ $users->email }}" required >

                               
                            </div>
                        </div>


                        

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control " value="{{ $users->password }}" name="password" required >

                               
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" value="{{ $users->password}}" name="password_confirmation" required >
                            </div>
                        </div>


              
                        <div class="row mb-3">
                            <label for="role" class="col-md-4 col-form-label text-md-end">{{ __('role') }}</label>

                            <div class="col-md-6">

                            <select class="form-control " name="user_role" value="$users->user_role" aria-label="Default select example" required>
  

  <option value="admin">Admin</option>
 

  
</select>
                                

                                
                            </div>
                        </div>
                         
      </div>
      <div class="modal-footer">
        
        <button type="submit" class="btn btn-primary">Save changes</button>
      
      </div>

      </form>
    </div>
  </div>
</div>



<!-- Modal Delete-->
<div class="modal fade" id="exampleModaldelete{{$users->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      Are u sure u want to delete this user?
   
      </div>
      <div class="modal-footer">
        
        <form action="{{route('User.destroy',$users->id)}}" method="post">
        @csrf
        @method('DELETE')
       <button type="submit" class="btn btn-small btn-danger my_card text-white">Delete</button>
       </form>
      </div>
    </div>
  </div>
</div>
<tr>
    <td>{{ $users->name}}</td>
    <td>{{ $users->email}}</td>
    <td>{{ $users->user_role}}</td>
    <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal{{$users->id}}">
 Edit
</button></td>
    <td><!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModaldelete{{$users->id}}">
  delete
</button>
</td>
</tr>

   @endforeach
   
  </tbody>
</table>




@stop

