@extends('layouts.admin')
@section('content')
<div class="row ml-3 mr-3 mt-3">
    <!-- left column -->
    <div class="col-md-12">
      <!-- general form elements -->
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Add Post</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        
      <form id="PostForm" class="form" action="" method="POST"
        enctype="multipart/form-data">
          @csrf
          <div class="card-body">
       <div class="form-group">

        <div class="form-group">
            <label for="exampleInput1">Title</label>
            <input type="text" class="form-control" name="title"  id="exampleInput1" value="" placeholder="Enter title">
          </div>

          <div class="form-group">
            <label>Body</label>
            <textarea class="form-control" rows="3" name="body" placeholder="Enter ..."></textarea>
          </div> 

          <div class="form-group">
              <label for="file-upload">Upload image</label>
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" name="image" class="custom-file-input" id="fileupload">
                  <label class="custom-file-label" id="filename" for="fileupload">choose image</label>
                </div>
            
              </div>
            </div>
        
            <div class="form-group">
            <label>Category</label>
              @isset($categories)
              @foreach($categories as $item)
              <div class="form-check">
              <input class="form-check-input" type="checkbox" name="category[]" id="inlineCheckbox{{$item->id}}" value="{{$item->id}}">
              <label class="form-check-label" for="inlineCheckbox{{$item->id}}">{{$item->name}}</label>
            </div>
              @endforeach
              @endisset
          </div>

       </div>
       
          </div>
          <!-- /.card-body -->

          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Add</button>
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
   
  $("#PostForm").validate({
    rules: {
        title: {
                required: true,
            }, 
        body: {
            required: true,
        },
        image: {
          required: false,
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
              url: "{{route('storePost')}}",
              type: 'post',
              data: formData,
              contentType: false,
              processData: false,
              success: function(response){
                 if(response != 0){
                  Swal.fire(
                'success!',
                'You added a new post!',
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
               'cannot add a new post',
               'error'
)
                }
              }
           });
     
    }
});
</script>

<script>
  $(function(){
    $("#fileupload").change(function(event){
      var x = event.target.files[0].name
      $("#filename").text(x)
    });
  })
  </script>

@endsection