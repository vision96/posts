@extends('layouts.admin')
@section('content')
<div class="row ml-3 mr-3 mt-3">
    <!-- left column -->
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">View user</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->

            <div class="card-body">
                <div class="media">
                    <img src="{{asset('image/'.$user->image)}}" class="mr-3" alt="..." onerror="this.src='/images/default.png';" style="width:100px;height:100px;object-fit: cover;">
                    <div class="media-body mt-3">
                        <h5 class="mt-0">{{$user->name}}</h5>
                        <h5 class="mt-0">{{$user->email}}</h5>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->

        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Attach Role</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->


            <form id="RoleUserForm" class="form" action="" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">

                        <div class="form-group col-md-4">
                        <label for="inputRole">Role</label>
                        <select id="inputRole" class="form-control" name="role">
                            @foreach($roles as $role)
                            <option value="{{$role->id}}">{{$role->name}}</option>
                            @endforeach
                        </select>
                        </div>
                  

                        <!-- <div class="form-group">
                            <label>Role</label>
                            @isset($roles)
                            @foreach($roles as $role)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="role[]" id="inlineCheckbox{{$role->id}}" value="{{$role->id}}"
                                @foreach($user->roles as $dataUser)  @if ($dataUser->id == $role->id) checked @endif @endforeach>
                                <label class="form-check-label" for="inlineCheckbox{{$role->id}}">{{$role->name}}</label>
                            </div>
                            @endforeach
                            @endisset
                        </div>
                     -->
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

<div class="content-body">
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
                                <h5>User Roles</h5>
                            </div>

                        </div>
                    </div>



                    <div class="card-content collapse show">
                        <div class="card-body card-dashboard table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">role</th>
                                        <th scope="col">action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($user_roles as $rolee)
                                    <tr>
                                        <td>{{$rolee->name}}</td>
                                        <td>
                                            <button onclick="deleted('{{$rolee->id}}')" type="button" class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="justify-content-center d-flex">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </section>
</div>

@endsection

@section('javascript')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery.ajaxsubmit@1.0.3/dist/jquery.ajaxsubmit.min.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>


<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $("#RoleUserForm").validate({
        rules: {
            role: {
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
                url: "{{route('addRoleUser',$user->id)}}",
                type: 'post',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response != 0) {
                        Swal.fire(
                            'success!',
                            'You added a new user role!',
                            'success'
                        ).then(function(){ 
                            window.location.reload();
                         });
                        $('input').val("");
                    }
                },

  
                error: function(response) {
                    if (response != 0) {
                        Swal.fire(
                            'error!',
                            'cannot add a new user role',
                            'error'
                        )
                    }
                }
            });

        }
    });
</script>

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
                    url: "{{route('DeleteUserRole',$user->id)}}",
                    type: 'get',
                    data: {
                        "id": id
                    },
                    datatype: "json",
                    success: function(response) {
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        ).then(function(){ 
                            window.location.reload();
                         });
                    },

                    error: function(response) {
                        if (response != 0) {
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

@endsection