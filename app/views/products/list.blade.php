@extends('layouts.master')

@section('title')
    Product - List
@endsection
@section('style-libraries')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.6.15/dist/sweetalert2.all.min.js"></script>
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
                        <th>Product Name</th>
                        <th>Product Description</th>
                        <th>Product Price</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($product as $item => $value)
                        <tr>
                            <td>{{$value->name}}</td>
                            <td>{{$value->description}}</td>
                            <td>{{$value->price}}</td>
                            <td>
                                <button type="button" class="btn btn-primary"
                                        onclick=" location.href='{{url("editProduct",$value->id)}}'">Edit
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
                        <th>Product Name</th>
                        <th>Product Description</th>
                        <th>Product Price</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                </table>
            </div>

        </div>
    </div>
@endsection
@section('scripts')
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
                    fetch('{{url("deleteProduct")}}' + id, {
                        method: 'DELETE',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                    }).then((res)=>{
                        if (res.ok){
                            Swal.fire('Delete success!', '', 'success').then((result) => {
                                if (result.isConfirmed) {
                                    {{--window.location.href = '{{url("listProduct")}}';--}}
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
</script>
    <script>
        function getParameterByName(name, url) {
            if (!url) url = window.location.href;
            name = name.replace(/[\[\]]/g, '\\$&');
            var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
                results = regex.exec(url);
            if (!results) return null;
            if (!results[2]) return '';
            return decodeURIComponent(results[2].replace(/\+/g, ' '));
        }

        let msg = getParameterByName('msg');
        let dl = getParameterByName('dl');
        {{--let msg = '{{$_GET['msg']}}';--}}
        {{--let dl = '{{$_GET['dl']}}';--}}
        if (msg == "update-success") {
            Swal.fire('Update success!', '', 'success').then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '{{url("listProduct")}}';
                }
            })
        }

    </script>
@endsection
