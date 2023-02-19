@extends('layouts.master')

@section('title')
    User - List
@endsection
@section('style-libraries')

@endsection
@section('styles')
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">List Product</h5>
            <div class="table-responsive">
                <table id="zero_config" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>User name</th>
                        <th>Full name</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($user as $item => $value)
                        <tr>
                            <td>{{$value->username}}</td>
                            <td>{{$value->fullname}}</td>
                            <td>{{$value->role==0?'admin':'user'}}</td>
                            <td>
                                <button type="button" class="btn btn-primary"
                                        onclick=" location.href='{{url("editUser",$value->id)}}'">Edit
                                </button>
                                <button type="button" class="btn btn-primary"
                                        onclick="return confirm_delete('{{$value->id}}') ">
                                    Delete
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>User name</th>
                        <th>Full name</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                </table>
            </div>

        </div>
    </div>
@endsection
@section('scripts')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.6.15/dist/sweetalert2.all.min.js"></script>
    <script src="view/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <!--<script src="views/assets/extra-libs/sparkline/sparkline.js"></script>-->
    <!-- this page js -->
    <script src="view/assets/extra-libs/multicheck/datatable-checkbox-init.js"></script>
    <script src="view/assets/extra-libs/multicheck/jquery.multicheck.js"></script>
    <script src="view/assets/extra-libs/DataTables/datatables.min.js"></script>
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
                    fetch('{{url("deleteUser")}}' + id, {
                        method: 'DELETE',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                    }).then((res) => {
                        if (res.ok) {
                            Swal.fire('Delete success!', '', 'success').then((result) => {
                                if (result.isConfirmed) {
                                    {{--window.location.href = '{{url("listUser")}}';--}}
                                    location.reload();
                                }else {
                                    Swal.fire('Delete fail!', '', 'error');
                                }
                            })
                        }
                    });
                }
            })
        }
        let msg = '{{$_GET['msg']}}';
        if (msg == "update-success") {
            Swal.fire('Update success!', '', 'success').then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '{{url("listUser")}}';
                }
            })
        }
    </script>
@endsection
