@extends('layouts.master')

@section('title')
Categories - List
@endsection
@section('style-libraries')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
{{--    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.6.15/dist/sweetalert2.all.min.js"></script>--}}
@endsection
@section('styles')
@endsection
@section('content')
<div class="card">
    <div class="card-body">
        <h5 class="card-title">List Category</h5>
        <div class="table-responsive">
            <table id="zero_config" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>Category Name</th>
                    <th>Category Description</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($category as $item => $value)
                    <tr>
                        <td>{{$value->name}}</td>
                        <td>{{$value->description}}</td>
                        <td>
                            <button type="button" class="btn btn-primary"
                                    onclick=" location.href='{{url("editCategory",$value->id)}}' ">Edit
                            </button>
                            <button type="button" class="btn btn-primary"
                                    onclick="return confirm_delete('{{$value->id}}')">
                                Delete
                            </button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>Category Name</th>
                    <th>Category Description</th>
                    <th>Action</th>
                </tr>
                </tfoot>
            </table>
        </div>

    </div>
</div>
@endsection
<!--        </div>-->
<!--    </div>-->
<!--hiển thị file name-->
@section('scripts')
<!-- this page js -->
<script src="{{asset("assets/extra-libs/multicheck/datatable-checkbox-init.js")}}"></script>
<script src="{{asset("assets/extra-libs/multicheck/jquery.multicheck.js")}}"></script>
<script src="{{asset("assets/extra-libs/DataTables/datatables.min.js")}}"></script>
<script>
    /****************************************
     *       Basic Table                   *
     ****************************************/
    $('#zero_config').DataTable();

    function confirm_delete(id) {
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
                fetch('{{url("deleteCategory")}}' + id, {
                    method: 'DELETE',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                }).then((res)=>{
                    if (res.ok){
                        Swal.fire('Delete success!', '', 'success').then((result) => {
                            if (result.isConfirmed) {
                                location.reload();
                            }
                        })
                    }else{
                        Swal.fire('Delete fail!', '', 'error');
                    }
                });
            }
        })
    }

    let msg = {{$_GET['msg'] ?? 'null'}};
    if (msg == "update-success") {
        Swal.fire('Update success!', '', 'success').then((result) => {
            if (result.isConfirmed) {
                window.location.href = '{{url("listCategory")}}';
            }
        })
    }
</script>
@endsection
