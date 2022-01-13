<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Orders'List</title>

    <!-- Custom fonts for this template -->
    <link href="{{ asset('assets') }}/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('assets') }}/admin/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="{{ asset('assets') }}/admin/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        @include('admin._sidebar')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include('admin._topbar_navbar')
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Orders'List</h1>
                    
                    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            {{-- <h6 class="m-0 font-weight-bold text-primary">Categories'Table</h6> --}}
                            {{-- <a href="{{ route('admin_category_add') }}" class="btn btn-secondary btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fas fa-arrow-right"></i>
                                </span>
                                <span class="text">Add Category</span>
                            </a> --}}
                        </div>
                        <div class="card-body">
                            @include('home.flash-message')
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>User</th>
                                            <th>Name</th>
                                            <th>Phone</th>
                                            <th>Email</th>
                                            <th>Address</th>
                                            <th>Total</th>
                                            <th>Date</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($datalist as $rs)
                                        <tr>
                                            <td>{{$rs->id}}</td>
                                            <td>{{$rs->user->name}}</td>
                                            <td>{{$rs->name}}</td>
                                            <td>{{$rs->phone}}</td>
                                            <td>{{$rs->email}}</td>                                            
                                            <td>{{$rs->address}}</td>
                                            <td>{{$rs->total}}</td>
                                            <td>{{$rs->created_at}}</td>
                                            <td>{{$rs->status}}</td>
                                            <td style="text-align: center">
                                                <a href="{{ route('admin_order_edit', ['id' => $rs->id]) }}" title="Details" onclick="return !window.open(this.href, '','top=50 left=100 width=1100, height=700')">
                                                    <img src="{{ asset('assets')}}/report.png" height="28">
                                                </a>
                                            </td>
                                            <!--Report button -->
                                        </tr>
                                        
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            @include('admin._footer')
            
            
</body>

</html>
