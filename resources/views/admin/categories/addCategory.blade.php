@extends('layouts.admin')
@section('content')
<div class="row ml-3 mr-3 mt-3">
    <!-- left column -->
    <div class="col-md-12">
      <!-- general form elements -->
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Add Category</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->

        
      <form id="categoryForm" class="form" action="" method="POST"
        enctype="multipart/form-data">
          @csrf
          <div class="card-body">
       <div class="form-group">

        <div class="form-group">
            <label for="exampleInput1">Name</label>
            <input type="text" class="form-control" name="name"  id="exampleInput1" value="" placeholder="Enter name">
          </div>

          <div class="form-group">
            <label for="exampleInput2">Slug</label>
            <input type="text" class="form-control" name="slug"  id="exampleInput2" value="" placeholder="slug">
          </div>


       </div>
       
          </div>
          <!-- /.card-body -->

          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
      <!-- /.card -->

    


    </div>
</div>
@endsection

@section('javascript')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery.ajaxsubmit@1.0.3/dist/jquery.ajaxsubmit.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
    $.ajaxSetup({
       headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       }
   });
   
  $("#categoryForm").validate({
    rules: {
        name: {
            required: true,
            },
        slug: {
            required: true,
        }
    },
    highlight: function(element) {
        $(element).addClass('is-invalid');
    },
    unhighlight: function(element) {
        $(element).removeClass('is-invalid');
    },
    errorElement: 'span',
    errorClass: 'help-block',
    errorPlacement: function(error, element) {
    error.addClass('invalid-feedback');
    element.closest('.form-group').append(error);
    },
    submitHandler: function(form) {
        // var formData = new FormData($("#exampleInputFile")[0]);
        var formData = new FormData(form);
         $.ajax({
              url: "{{route('storeCategory')}}",
              type: 'post',
              data: formData,
              contentType: false,
              processData: false,
              success: function(response){
                 if(response != 0){
                  Swal.fire(
                'success!',
                'You added a new category!',
                'success'
)
             $('input').val(""); 
                 }else{
                    alert('file not uploaded');
                 }
              },

              error:function(response){
                if(response!=0){
                  Swal.fire(
               'error!',
               'cannot add a new category',
               'error'
)
                }
              }
           });
     
    }
});
</script>
@endsection