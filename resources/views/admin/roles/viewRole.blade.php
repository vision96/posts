@extends('layouts.admin')

@section('content')

<div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-2">
        <h3 class="content-header-title"> View Roles</h3>
        <div class="row breadcrumbs-top">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item"><a href="#">Roles</a>
                    </li>
                    <li class="breadcrumb-item active"> View Roles
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
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-2"></i></a>
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
                    <h3>Roles</h3>
                     </div>  
                   
                    <div class="col-md-2 mr-1" style="float:right;">
                    <a class="btn btn-sm btn-block btn-round btn-b btn-primary btnAddRole" style="font-size: 15px" data-toggle="modal" data-target="#addRoleModal" href="#">Add Role</a> 
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

        <div class="modal fade" id="addRoleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <form action="" id="addRoleform" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Role</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <div class="row">

                                <input type="hidden" id="roleId" name="roleId">

                                <div class="col-md-12 form-group">
                                    <input type="text" name="name" class="form-control" placeholder="Name" />
                                </div>

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary btnAddRole">Save changes</button>

                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>


        <!-- Edit role-->

        <div class="modal fade" id="editRoleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <form action="" id="editRoleform" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Role</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">

                                <input type="hidden" id="id" name="id">

                                <div class="col-md-12 form-group">
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Name" />
                                </div>

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="button btn btn-primary">
           
                                <span class="btn-txt">Edit</span></button>

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
    function deleted(id) {
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
                    url: "{{route('deleteRole')}}",
                    type: 'post',
                    data: {
                        "id": id
                    },
                    datatype: "json",
                    success: function(response) {
                        window.LaravelDataTables["roledatatable-table"].ajax.reload()
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                    },

                    error: function(response) {
                        if (response != 0) {
                            Swal.fire(
                                'error!',
                                'cannot delete this role',
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
 $("#addRoleform").validate({
    rules: {
            name: {
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
              url: "{{route('storeRole')}}",
              type: 'post',
              data: formData,
              contentType: false,
              processData: false,
              success: function(response){
                window.LaravelDataTables["roledatatable-table"].ajax.reload() //from browser (javascript content)

                 if(response != 0){
                  Swal.fire(
                'success!',
                'You added a new role!',
                'success'
)
             $('input').val(""); 
             $('[name="_token"]').val("{{@csrf_token()}}"); 
             $('#addRoleModal').modal('hide');
             $("#addRoleform")[0].reset();

                 }
              },

              error:function(response){
                if(response!=0){
                  Swal.fire(
               'error!',
               'cannot add a new role',
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
                 url: "{{route('editRole')}}",
                 type: 'post',
                 data:  {"id":id},
                 datatype: "json",
                 
                 success: function(response){
                   console.log(response);             

                  $("#id").val(response.id);
                  $("#name").val(response.name);  
                 $('#editRoleModal').modal('show'); 

                 },
   
                 error:function(response){
                   if(response!=0){
                     Swal.fire(
                  'error!',
                  'cannot update this role',
                  'error'
   )
                   }
                 }
              });
           
   
   }  


   $("#editRoleform").validate({
    rules: {
           name: {
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
        var formData2 = new FormData(form);
         $.ajax({
              url: "{{route('updateRole')}}",
              type: 'post',
              data: formData2,
              contentType: false,
              processData: false,
               // your ajax code
              beforeSend: function(){
                 $(".button").attr("disabled", true);
                 $(".btn-txt").text("updating"); 
             
                },
              complete: function(){
                 $(".button").attr("disabled", false);
                 $(".btn-txt").text("Edit role");
                },
              success: function(response){

                window.LaravelDataTables["roledatatable-table"].ajax.reload() //from browser (javascript content)

                 if(response != 0){
                  Swal.fire(
                'success!',
                'You updated a role!',
                'success'
)
             $('input').val(""); 
             $('[name="_token"]').val("{{@csrf_token()}}"); 
             $('#editRoleModal').modal('hide');

                 }
              },

              error:function(response){
                if(response!=0){
                  Swal.fire(
               'error!',
               'cannot update a role',
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
@endsection