@extends('layouts.master')

@section('title')
    User - Edit
@endsection
@section('style-libraries')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.6.15/dist/sweetalert2.all.min.js"></script>
@endsection
@section('styles')
@endsection
@section('content')

<div class="row">
    <div class="col-md-6">
        <div class="card">
            <form class="form-horizontal" action="{{url("updateUser",$user->id)}}" method="post" enctype="multipart/form-data">
                <div class="card-body">
                    <h4 class="card-title">Edit Product</h4>
                    <input type="hidden" id="id_product" name="id" value="{{$user->id}}">
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
                    <div class="form-group row">
                        <label for="name" class="col-sm-3 text-right control-label col-form-label">Username</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="username" name="username"
                                   placeholder=" Product Name" value="{{$user->username}}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="description" class="col-sm-3 text-right control-label col-form-label">Password</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" id="password" name="password"
                                   placeholder=" Password" value="{{$user->password}}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="price" class="col-sm-3 text-right control-label col-form-label">Full Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="fullname" name="fullname"
                                   placeholder=" Full name" value="{{$user->fullname}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 text-right control-label col-form-label ">Vai trò</label>
                        <div class="col-md-9">
                            <select class="select2 form-control custom-select required"
                                    style="width: 100%; height:36px;" name="role">
                                <option>Select</option>
                                <option value="0" {{$user->role==0?'selected':''}}>Admin</option>
                                <option value="1" {{$user->role==1?'selected':''}}>User</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="border-top">
                    <div class="card-body">
                        <button type="submit" class="btn btn-primary" name="btnUpdateUser">Update User</button>
                        <button type="button" class="btn btn-primary"
                                onclick="location.href='{{url("listUser")}}'">List User
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
        Swal.fire('Update success!', '', 'success');
    }
    $('.swal2-confirm').on('click',function () {
        window.open ('?atc=listProduct','_self');
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