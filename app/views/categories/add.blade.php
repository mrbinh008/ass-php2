@extends('layouts.master')

@section('title')
    Categories - Add
@endsection
@section('style-libraries')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.6.15/dist/sweetalert2.all.min.js"></script>
@endsection
@section('styles')
@endsection
@section('content')

    <?php
    if (isset($_SESSION['errors'])&&isset($_GET['msg'])&&isset($_SESSION['data'])) {
        $data = $_SESSION['data'];
        extract($data);
    }
    ?>
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <form class="form-horizontal" action="{{url("saveAddCategory")}}" method="post" enctype="multipart/form-data">

                <div class="card-body">
                    <h4 class="card-title">Thêm thể loại</h4>
                    @if(isset($_SESSION['errors']) && isset($_GET['msg']) )
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Lỗi! </strong>Vui lòng kiểm tra lại
                            @foreach($_SESSION['errors'] as $error)
                                {{$error}}{!! "," !!}
                            @endforeach
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
{{--                    @if(isset($_SESSION['success']) && isset($_GET['msg']) )--}}
{{--                        <span style="color: green">{{ $_SESSION['success'] }}</span>--}}
{{--                    @endif--}}
                    <div class="form-group row">
                        <label for="name" class="col-sm-3 text-right control-label col-form-label">Category Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="name" name="name"
                                   placeholder=" Category Name" value='{{isset($data)?$name:''}}'>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="description" class="col-sm-3 text-right control-label col-form-label">Category Description</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="description" name="description"
                                   placeholder=" Category Description"value='{{isset($data)?$description:''}}'>
                        </div>
                    </div>

                </div>
                <div class="border-top">
                    <div class="card-body">
                        <button type="submit" class="btn btn-primary" name="btnAddCategory">Add Category</button>
                        <button type="button" class="btn btn-primary"
                                onclick="location.href='{{url("listCategory")}}'">List Category
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('scripts')
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

    var msg = getParameterByName('msg');
    if (msg == 'success') {
        Swal.fire('Thêm thành công!', '', 'success');
    }
    $('.swal2-confirm').on('click', function () {
        window.open('{{url("addCategory")}}', '_self');
    });

    let fileInput = document.querySelector('#validatedCustomFile');
    let filelabel = document.querySelector('#file-label');
    fileInput.addEventListener("change", () => {
        filelabel.innerHTML = "";
        for (i of fileInput.files) {
            let fileName = i.name;
            filelabel.innerHTML = `<p>${fileName}</p>`;
        }
    })
</script>
@endsection