<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ Route('admin_home') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ Route('admin_home') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="{{Route('admin_category')}}">
            <i class="fas fa-fw fa-table"></i>
            <span>Category</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{Route('admin_product')}}">
            <i style='font-size:14px' class='fas'>&#xf02d;</i>
            <span>Products</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{Route('admin_message')}}">
            <i class="fas fa-envelope fa-fw"></i>
            <span>Contact Massages</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{Route('admin_review')}}">
            <i class="fas fa-list fa-sm fa-fw "></i>
            <span>Reviews</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{Route('admin_faq')}}">
            <i class="fas fa-fw fa-table"></i>
            <span>FAQ</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Orders</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Orders:</h6>
                <a class="collapse-item" href="{{route('admin_order')}}">All Orders</a>
                <a class="collapse-item" href="{{route('admin_order_list_new',['status','New'])}}">New Orders</a>
                <a class="collapse-item" href="{{route('admin_order_list_accepted',['status','Accepted'])}}">Accepted Orders</a>
                <a class="collapse-item" href="{{route('admin_order_list_cancelled',['status','Cancelled'])}}">Cancelled Orders</a>
                <a class="collapse-item" href="{{route('admin_order_list_shipping',['status','Shipping'])}}">Shipping Orders</a>
                <a class="collapse-item" href="{{route('admin_order_list_completed',['status','Completed'])}}">Completed Orders</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{Route('admin_setting')}}">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Settings</span>
        </a>
    </li>                
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">
    @yield('content')