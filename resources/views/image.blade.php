@extends('layouts.everyone')

@section('content')

<form action="/file-upload"
      class="dropzone"
      id="my-awesome-dropzone">
    
      <script>
  Dropzone.discover();
</script>
    
    </form>
@stop