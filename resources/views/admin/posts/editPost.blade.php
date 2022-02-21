@extends('layouts.admin')
@section('content')
<div class="row ml-3 mr-3 mt-3">
    <!-- left column -->
    <div class="col-md-12">
      <!-- general form elements -->
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Edit Product</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->

        
@include('admin.includes.alerts.success')
@include('admin.includes.alerts.error')
    

        <form id="productForm" class="form" action="" method="POST"
        enctype="multipart/form-data">
          @csrf
          <div class="card-body">
       <div class="form-group">

        <div class="form-group">
            <label for="exampleInput1">Name</label>
            <input type="text" class="form-control" name="name"  id="exampleInput1" value="{{$data->name}}" placeholder="Enter name">
          </div>

          <div class="form-group">
            <label>Description</label>
            <textarea class="form-control" rows="3" name="description" placeholder="Enter ...">{{$data->description}}</textarea>
          </div> 

     
          <div class="form-group">
            <label for="exampleInput2">Price</label>
            <input type="text" class="form-control" name="price"  id="exampleInput2" value="{{$data->price}}" placeholder="price">
          </div>


          {{--  --}}
          <div class="row">
            <div class="col-md-4">
        <div class="form-group">
          <label for="exampleInput3">Discount Value</label>
          <input type="text" class="form-control" name="discount"  id="exampleInput3" value="{{$data->discount}}" placeholder="Enter discount value">
        </div>
      </div>

      <div class="col-md-4">
        <div class="form-group"> <!-- Date input -->
        <label class="control-label" for="date">From</label>
        <input class="form-control"  autocomplete="off" id="date" value="{{$data->discount_from}}" name="from" placeholder="MM/DD/YYY" type="text"/>
      </div>
    </div>

    <div class="col-md-4">
      <div class="form-group"> <!-- Date input -->
        <label class="control-label" for="date">To</label>
        <input class="form-control" autocomplete="off" id="date2" value="{{$data->discount_to}}" name="to" placeholder="MM/DD/YYY" type="text"/>
      </div>
    </div>

    </div>
          {{--  --}}

          
        <div class="form-group">
            <label for="exampleSelectBorder">subCategory</label>
            <select class="custom-select border-1 border-light" name="subcategory" id="exampleSelectBorder">
             

              @isset($subcategory)
              @foreach ($subcategory as $item)
              <option value="{{$item->id}}" @if($data->subcategory_id==$item->id) selected @endif>{{$item->name}}</option>
              @endforeach
              @endisset
            </select>
          </div>

       </div>

          {{--start image --}}
      <table class="table">
        <thead>
          <tr>
            <th scope="col">Image</th>
            <th scope="col" width="120px">Option</th> 
          </tr>
        </thead>
        <tbody id="tablebody">
          @isset($image)
          @foreach ($image as $img)
          {{-- put foreach before starting the tr --}}
          <tr>
           
            <td>
            
              <div class="row">
                <div class="col-sm-2">
                  <img class="img-fluid img-bordered" src="{{asset('image/'.$img->image)}}">
              </div>
              <div class="col-sm-10">
              
                  <input type="hidden" name="AllImages[]" value="{{$img->id}}" id="exampleInputFile">
              
            </div>
            </div>
 
           </td>

            <td>
              <button onclick="deleteRow(event)" class="btn btn-sm btn-danger" type="button"><i class="fas fa-minus"></i></button></td>
      
          </tr>
           @endforeach
           @endisset
          {{-- end foreach after ending the tr --}}

            <tr>
              <td>
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" name="image[]" class="custom-file-input" id="exampleInputFile">
                    <label class="custom-file-label" for="exampleInputFile">Choose image</label>
                  </div>  
                </div>
              </td>
  
              <td><button onclick="AddRow(event)" class="btn btn-sm btn-info" type="button"><i class="fas fa-plus"></i></button>
                <button onclick="deleteRow(event)" class="btn btn-sm btn-danger" type="button"><i class="fas fa-minus"></i></button></td>

  
            </tr>

     
        </tbody>
      </table>      {{-- end image --}}


       {{--start property --}}
       <table class="table">
        <thead>
          <tr>
            <th scope="col">Key</th>
            <th scope="col">Value</th>
            <th scope="col">Option</th>
          </tr>
        </thead>
        <tbody id="table2body">
          @isset($property)
          @foreach ($property as $pro)
          <tr>
            <td>
              <input type="text" class="form-control" name="key[]"  id="example1" value="{{$pro->key}}">
            </td>

            <td>
              <input type="text" class="form-control" name="value[]"  id="example2" value="{{$pro->value}}">
            </td>

            <td><button onclick="AddRow2(event)" class="btn btn-sm btn-info" type="button"><i class="fas fa-plus"></i></button>
            <button onclick="deleteRow2(event)" class="btn btn-sm btn-danger" type="button"><i class="fas fa-minus"></i></button></td>

          </tr>
          @endforeach
          @endisset

{{--           
            <tr>
              <td>
                <input type="text" class="form-control" name="key[]"  id="example1" value="">
              </td>

              <td>
                <input type="text" class="form-control" name="value[]"  id="example2" value="">
              </td>
  
              <td><button onclick="AddRow2(event)" class="btn btn-sm btn-info" type="button"><i class="fas fa-plus"></i></button>
              <button onclick="deleteRow2(event)" class="btn btn-sm btn-danger" type="button"><i class="fas fa-minus"></i></button></td>
  
            </tr> --}}
           


        </tbody>
      </table>      {{-- end property --}}


            
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
  $("#productForm").validate({
    rules: {
        name: {
           required: true,
            },
         description: {
                required: true,
         }, 
        price: {
            required: true,
        },          
        discount: {
            required: true,
        },
        from: {
            required: true,
        },
        to: {
            required: true,
        },
        image: {
            required: false,
        },
        key: {
            required: false,
        },
        value: {
            required: false,
        },
     
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
              url: '{{route('updateProduct',$data->id)}}',
              type: 'post',
              data: formData,
              contentType: false,
              processData: false,
              success: function(response){
                 if(response != 0){
                  Swal.fire(
                'success!',
                'You updated this product!',
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
               'cannot update this product',
               'error'
)
                }
              }
           });
     
    }
});

    function AddRow(event){
       var html = '<tr> <td> <div class="input-group"> <div class="custom-file"> <input type="file" name="image[]" class="custom-file-input" id="exampleInputFile"> <label class="custom-file-label" for="exampleInputFile">Choose image</label> </div> </div> </td> <td><button onclick="AddRow(event)" class="btn btn-sm btn-info" type="button"><i class="fas fa-plus"></i></button> <button onclick="deleteRow(event)" class="btn btn-sm btn-danger" type="button"><i class="fas fa-minus"></i></button></td> </tr>';
    $("#tablebody").append(html);
    }

    function deleteRow(event){
      $(event.target).closest('tr').remove();
    }

    function AddRow2(event){
       var html = '<tr> <td> <input type="text" class="form-control" name="key[]" id="example1" value=""> </td> <td> <input type="text" class="form-control" name="value[]" id="example2" value=""> </td> <td><button onclick="AddRow(event)" class="btn btn-sm btn-info" type="button"><i class="fas fa-plus"></i></button> <button onclick="deleteRow(event)" class="btn btn-sm btn-danger" type="button"><i class="fas fa-minus"></i></button></td> </tr>';
    $("#table2body").append(html);
    }

    function deleteRow2(event){
      $(event.target).closest('tr').remove();
    }
</script>
@endsection