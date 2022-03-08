<a href="{{route('post.edit',$id)}}"
    class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1" data-toggle="tooltip" data-placement="top" title="edit">
    <i class="fas fa-edit"></i>
</a>

<button onclick="deleted('{{$id}}')" type="button" id="btnId" data-url="{{route('post.destroy',$id)}}"
class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1" data-toggle="tooltip" data-placement="top" title="delete">
<i class="fas fa-trash"></i>
</button> 
<!-- @if(auth()->user()->hasRole('Admin')) -->

<!-- @endif -->

<script>
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>