@extends('layouts.admin')

@section('content')
    
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title"> View Posts</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Posts</a>
                                </li>
                                <li class="breadcrumb-item active"> View Posts
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
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script>

 function deleted(id){
  var url = $("#btnId").data("url"); 
  console.log(url);
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
              url: url,
              type: 'delete',
              data:  {"id":id},
              datatype: "json",
              statusCode: {
                401: function() {
                    Swal.fire({
                        icon: 'info',
                        html:
                            'You do not have the <b>permission</b> to delete the post' ,
                        showCloseButton: true,
                        confirmButtonText: 'ok!',                    
                        });
                     }
              },
              success: function(response){
                Swal.fire(
               'Deleted!',
               'Your file has been deleted.',
               'success'
              ).then(function(){ 
               window.LaravelDataTables["postdatatable-table"].ajax.reload()
                 });
              },

              error:function(response){
                if(response!=0){
                  Swal.fire(
               'error!',
               'cannot delete this post',
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
@endsection

@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
@endsection
