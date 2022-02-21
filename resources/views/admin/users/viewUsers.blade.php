@extends('layouts.admin')

@section('content')
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title"> View Users</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Users</a>
                                </li>
                                <li class="breadcrumb-item active"> View Users
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            
            <div class="content-body">
                <!-- DOM - jQuery events table -->
                <section id="dom">
                    <div class="row ml-3 mr-3">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <a class="heading-elements-toggle"><i
                                            class="la la-ellipsis-v font-medium-2"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                            <li><a data-action="close"><i class="ft-x"></i></a></li>
                                        </ul>
                                    </div>

                                                     
                    <div class="row">
                    <div class="col-md-9" style="float:right;">
                    <h3>Users</h3>
                     </div>  
                   
                    <div class="col-md-2 mr-1" style="float:right;">
                    <a class="btn btn-sm btn-block btn-round btn-b btn-primary btnAddUser" style="font-size: 15px" data-toggle="modal" data-target="#exampleModal" href="#">Add User</a> 
                  </div>
              </div>
                                </div>

                   

                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard table-responsive">
                                        {!!$dataTable->table()!!}
                                        <div class="justify-content-center d-flex">
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>

                    

                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <form action="" id="ajaxform" method="POST" enctype="multipart/form-data">
                      @csrf
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                     
                          <div class="row">
                  
                               <input type="hidden" id="productId" name="productId"> 
                  
                  
                            <div class="col-md-12 form-group">
                              <input type="text" name="name" class="form-control" placeholder="Name" data-rule="minlen:4"/>
                              <div class="validate"></div>
                            </div>
                  
                  
                            <div class="col-md-12 form-group">
                              <input type="email" class="form-control" name="email" placeholder="Email"  data-rule="email"/>
                              <div class="validate"></div>
                            </div>
                           
                            <div class="col-md-12 form-group">
                              <input type="password" class="form-control" name="password" placeholder="password"  data-rule="minlen:6" />
                              <div class="validate"></div>
                            </div>
                  
                              <div class="col-md-12 form-group">
                                <div class="input-group">
                                  <div class="custom-file">
                                    <input type="file" name="image" class="custom-file-input" id="exampleInputFile">
                                    <label class="custom-file-label" for="exampleInputFile">Choose image</label>
                                  </div>
                              
                                </div>
                              </div>

                            <div class="col-md-12 mb-3">
                               <!-- <div class="loading">Loading</div>  -->
                            <div class="error"></div>
                            <div class="success"></div>
                          </div>
                          </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary btnAddUser">Save changes</button>

                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                      </div>
                    </div>
                    </form>
                  </div>


               <!-- Edit User Code  -->

                  <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <form action="" id="editform" method="POST" enctype="multipart/form-data">
                     @csrf
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                     
                     <div class="row">

                     <div class="col-sm-4">
                            <img class="img-fluid img-bordered" id="image" src="">
                             </div>
                     </div>

                    <div class="row  mt-3">
      
                    <div class="col-md-12 form-group">
                              <input type="text" name="name" class="form-control" placeholder="Name" id="name" data-rule="minlen:4"/>
                              <div class="validate"></div>
                            </div>

                        </div>

                          <div class="row">
                  
                             <input type="hidden" id="id" name="id"> 
                  
                            <div class="col-md-12 form-group">
                              <input type="email" class="form-control" name="email" placeholder="Email" id="email" data-rule="email"/>
                              <div class="validate"></div>
                            </div>
                           
                            <div class="col-md-12 form-group">
                              <input type="password" class="form-control" name="password" placeholder="password" id="password" data-rule="minlen:6" />
                              <div class="validate"></div>
                            </div>
                  
                            
                             <div class="col-sm-12">

                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="custom-file">
                               <input type="file" name="image" class="custom-file-input" id="exampleInputFile2">
                               <label class="custom-file-label" for="exampleInputFile">Choose image</label>
                                    </div>
                                </div>
                              </div>

                               </div>
                          

                            <div class="col-md-12 mb-3">
                               <!-- <div class="loading">Loading</div>  -->
                            <div class="error"></div>
                            <div class="success"></div>
                          </div>
                          
                          </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="button btn btn-primary">
                            <i class="loading-icon fas fa-spinner hide"></i>

                            <span class="btn-txt">Edit user</span></button>

                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                      </div>
                    </div>
                    </form>
                  </div>

                </section>
            </div>
@endsection

@section('javascript')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>

function deleted(id){
     Swal.fire({
     title: 'Are you sure?',
     text: "You won't be able to revert this!",
     icon: 'warning',
     showCancelButton: true,
     confirmButtonColor: '#3085d6',
     cancelButtonColor: '#d33',
     confirmButtonText: 'Yes, delete it!'
   }).then((result) => {
     if (result.isConfirmed) {
     
       $.ajaxSetup({
       headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       }
   });
       $.ajax({
                 url: '{{route('DeleteUser')}}',
                 type: 'post',
                 data:  {"id":id},
                 datatype: "json",
                 success: function(response){
                    window.LaravelDataTables["admindatatable-table"].ajax.reload() //from browser (javascript content)
                   Swal.fire(
                  'Deleted!',
                  'Your file has been deleted.',
                  'success'
       )
                 },
   
                 error:function(response){
                   if(response!=0){
                     Swal.fire(
                  'error!',
                  'cannot delete this user',
                  'error'
   )
                   }
                 }
              });
      
     }
   })
    }  
   
   </script>
   
{!!$dataTable->scripts()!!}

<script>
 $("#ajaxform").validate({
    rules: {
            name: {
                required: true,
            },
            email: {
                required: true,
                email: true
            },
            password: {
                required: true,
                minlength: 5
            },
            image: {
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
              url: '{{route('StoreUser')}}',
              type: 'post',
              data: formData,
              contentType: false,
              processData: false,
              success: function(response){
                window.LaravelDataTables["admindatatable-table"].ajax.reload() //from browser (javascript content)

                 if(response != 0){
                  Swal.fire(
                'success!',
                'You added a new user!',
                'success'
)
             $('input').val(""); 
             $('[name="_token"]').val("{{@csrf_token()}}"); 
             $('#exampleModal').modal('hide');
             $("#ajaxform")[0].reset();

                 }else{
                    alert('file not uploaded');
                 }
              },

              error:function(response){
                if(response!=0){
                  Swal.fire(
               'error!',
               'cannot add a new user',
               'error'
)
                }
              }
           });
     
    }
});

   
  </script>


<script>

   function edit(id){

    $.ajaxSetup({
       headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       }
   });

 
    $.ajax({
                 url: '{{route('editUser')}}',
                 type: 'post',
                 data:  {"id":id},
                 datatype: "json",
                 
                 success: function(response){
                   console.log(response);             

                  $("#id").val(response.id);
                  $("#name").val(response.name); 
                  $("#email").val(response.email); 
                  $("#image").attr("src",'/image/'+response.image); 
                  
                 $('#editModal').modal('show'); 

                 },
   
                 error:function(response){
                   if(response!=0){
                     Swal.fire(
                  'error!',
                  'cannot update this user',
                  'error'
   )
                   }
                 }
              });
           
   
   }  


   $("#editform").validate({
    rules: {
           name: {
                required: true,
            },
            email: {
                required: true,
                email: true
            },
            password: {
                required: true,
                minlength: 5
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
        var formData2 = new FormData(form);
         $.ajax({
              url: '{{route('updateUser')}}',
              type: 'post',
              data: formData2,
              contentType: false,
              processData: false,
               // your ajax code
              beforeSend: function(){
                 $('.loading-icon').show();
                 $(".button").attr("disabled", true);
                 $(".btn-txt").text("updating"); 
             
                },
              complete: function(){
                 $('.loading-icon').hide();
                 $(".button").attr("disabled", false);
                 $(".btn-txt").text("Edit user");
                },
              success: function(response){

                window.LaravelDataTables["admindatatable-table"].ajax.reload() //from browser (javascript content)

                 if(response != 0){
                  Swal.fire(
                'success!',
                'You updated a user!',
                'success'
)
             $('input').val(""); 
             $('[name="_token"]').val("{{@csrf_token()}}"); 
             $('#editModal').modal('hide');
             $("#editform")[0].reset();

                 }else{
                    alert('file not uploaded');
                 }
              },

              error:function(response){
                if(response!=0){
                  Swal.fire(
               'error!',
               'cannot update a user',
               'error'
)
                }
              }
           });
     
    }
});

   
   </script> 

@endsection

@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
<style>
.btnAddUser{
    color: #fff;
    margin-left:23px;
  }
.hide{
  display:none;
}
</style>
@endsection
