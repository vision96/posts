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
                    <img src="/images/image.jpg" class="mr-3" alt="..." style="width:100px;height:100px;object-fit: cover;">
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
                        {!!$dataTable->table()!!}
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

{!!$dataTable->scripts()!!}

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
                        )
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
@endsection