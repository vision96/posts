@extends('layouts.admin')
@section('content')
<div class="row ml-3 mr-3 mt-3">
    <!-- left column -->
    <div class="col-md-12">
      <!-- general form elements -->
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Edit Post</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->

        <form id="editPostForm" class="form" action="" method="POST"
        enctype="multipart/form-data">
          @csrf
          <div class="card-body">

          <div class="form-group">
            <label for="exampleInput1">Title</label>
            <input type="text" class="form-control" name="title"  id="exampleInput1" value="" placeholder="Enter title">
          </div>

          <div class="form-group">
            <label>Body</label>
            <textarea class="form-control" rows="3" name="body" placeholder="Enter ..."></textarea>
          </div> 

          <div class="row">

          <div class="col-sm-2">
          <img class="img-fluid img-bordered" src="{{asset('image/'.$data->image)}}">
          </div>
          <div class="col-sm-10">

              <div class="form-group">

                <label for="exampleInputFile">upload image</label>
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" name="image" class="custom-file-input" id="exampleInputFile">
                    <label class="custom-file-label" for="exampleInputFile">Choose image</label>
                  </div>
                </div>
              </div>

                </div>

            </div>

            <!-- start categories -->
            <div class="form-group">
            <label>Category</label>
              @isset($categories)
              @foreach($categories as $item)
              

              <div class="form-check">      
              <input class="form-check-input" type="checkbox" name="category" id="inlineCheckbox{{$item->id}}" value="{{$item->id}}"
              @foreach($data->categories as $dataItem)  @if ($dataItem->id == $item->id) checked @endif @endforeach>

              <label class="form-check-label" for="inlineCheckbox{{$item->id}}">{{$item->name}}</label>
            </div>
            

              @endforeach
              @endisset
          </div>
          <!-- end categories -->
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
  $("#editPostForm").validate({
    rules: {
        title: {
                required: true,
            }, 
        body: {
            required: true,
        },
        image: {
          required: true,
        },
        category: {
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
              url: "{{route('updatePost',$data->id)}}",
              type: 'post',
              data: formData,
              contentType: false,
              processData: false,
              success: function(response){
                 if(response != 0){
                  Swal.fire(
                'success!',
                'You updated this post!',
                'success'
)
             
                 }else{
                    alert('file not uploaded');
                 }
              },

              error:function(response){
                if(response!=0){
                  Swal.fire(
               'error!',
               'cannot update this post',
               'error'
)
                }
              }
           });
     
    }
});
</script>
@endsection