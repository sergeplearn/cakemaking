// Example starter JavaScript for disabling form submissions if there are invalid fields
(function () {
    'use strict'
  
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.querySelectorAll('.needs-validation')
  
    // Loop over them and prevent submission
    Array.prototype.slice.call(forms)
      .forEach(function (form) {
        form.addEventListener('submit', function (event) {
          if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
          }
  
          form.classList.add('was-validated')
        }, false)
      })
  })()


  $(document).ready(function () {
    $('#example').DataTable({
      //"aLengthMenu": [[4], [4]],
      "ordering":false,
    
      "bLengthChange":false,
       pageLength:5,
    
      info:false,
      
  } );
});

//alert duration
$(".alerts").delay(5000).slideUp(1000, function() {
  $(this).alert('close');
});



