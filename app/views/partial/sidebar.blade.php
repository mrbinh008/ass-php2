<aside class="left-sidebar" data-sidebarbg="skin5">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav" class="p-t-30">

                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{url("home")}}" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Trang chủ</span></a></li>

                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-receipt"></i><span class="hide-menu">User </span></a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item"><a href="{{url("addUser")}}" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu"> Thêm user </span></a></li>
                        <li class="sidebar-item"><a href="{{url("listUser")}}" class="sidebar-link"><i class="mdi mdi-note-plus"></i><span class="hide-menu"> Danh sách user </span></a></li>
                    </ul>
                </li>

                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-receipt"></i><span class="hide-menu">Sản phẩm </span></a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item"><a href="{{url("addProduct")}}" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu"> Thêm sản phẩm </span></a></li>
                        <li class="sidebar-item"><a href="{{url("listProduct")}}" class="sidebar-link"><i class="mdi mdi-note-plus"></i><span class="hide-menu"> Danh sách sản phẩm </span></a></li>
                    </ul>
                </li>

                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-face"></i><span class="hide-menu">Thể loại </span></a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item"><a href="{{url("addCategory")}}" class="sidebar-link"><i class="mdi mdi-emoticon"></i><span class="hide-menu"> Thêm thể loại </span></a></li>
                        <li class="sidebar-item"><a href="{{url("listCategory")}}" class="sidebar-link"><i class="mdi mdi-emoticon-cool"></i><span class="hide-menu"> Danh sách thể loại </span></a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>