<a href="{{route('singleUser',$id)}}" type="button" data-dismiss="modal"
class="btn btn-outline-success editbtn btn-min-width box-shadow-3 mr-1 mb-1" data-toggle="tooltip" data-placement="top" title="Attach role">
<i class="fas fa-eye"></i>
</a> 

<button onclick="edit('{{$id}}')"  type="button" data-dismiss="modal"
class="btn btn-outline-primary editbtn btn-min-width box-shadow-3 mr-1 mb-1" data-toggle="tooltip" data-placement="top" title="edit user">
<i class="fas fa-edit"></i>
</button> 

<button onclick="deleted('{{$id}}')"  type="button"
class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1" data-toggle="tooltip" data-placement="top" title="delete user">
<i class="fas fa-trash"></i>
</button> 

<script>
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>