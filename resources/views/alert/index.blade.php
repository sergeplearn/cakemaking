
@foreach($errors->all() as $error)
<div class="alert alerts alert-warning " >
  <strong>Ohhppss!</strong>  {{ $error }}
  
</div>
  

    @endforeach
      

@if(session('msgs'))
<script nonce="2726c7f26c98">
   swal.fire({
  title: "Good job!",
  text: "Your Transaction was successful!",
  timer: 1000,
  timerProgressBar: true,
  icon: "success",
  showConfirmButton: false,
});
</script>
@endif


@if(session('empty'))
<script nonce="2726c7f26c98">
   swal.fire({
  title: "oohh sorry nothing was found!",
  text: "nothing was found!",
  timer: 5000,
  timerProgressBar: true,
  icon: "error",
  showConfirmButton: false,
});
</script>  
@endif


@if(session('delete'))
<script nonce="2726c7f26c98">
  swal.fire({
  title: "Good job!",
  text: "Your Transaction was successful!",
  timer: 5000,
  timerProgressBar: true,
  icon: "success",
  showConfirmButton: false,
  
});
</script>
@endif