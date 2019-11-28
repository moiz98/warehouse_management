{{-- this is manager products --}}
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <style>
      body{
        background: linear-gradient(rgba(255,255,255,.2), rgba(255,255,255,.2)),url(https://www.conceptstorage.com/media/zoo/images/increase-warehouse-storage-capacity_4a32e3cb56b8fbced289eb2b9420edc3.jpg);
          background-size: cover;
          background-position: center;
          /* margin-top:20px; */
          /* background:#eee; */
      }
      .card{
          margin-top: 3%;
      }
      </style>

  <title>Products</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark">

    <a class="navbar-brand mr-1" href="/suppliers">Manager - Products</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto mr-0 mr-md-3 my-2 my-md-0">
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-user-circle fa-fw"></i>
                {{ Auth::user()->name }} <span class="caret"></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                {{-- <a class="dropdown-item" href="#">Settings</a> --}}
                {{-- <a class="dropdown-item" href="#">Activity Log</a> --}}
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('employee.logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    Logout
                </a>
                <form id="logout-form" action="{{ route('employee.logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
              </div>
            </li>
          </ul>      
  </nav>

  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="/employee">
              <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/inventory">
            <i class="fas fa-fw fa-table"></i>
            <span>Inventory</span></a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="/employeeproducts">
            <i class="fas fa-fw fa-table"></i>
            <span>Products</span></a>
          </li>
    </ul>

    <div id="content-wrapper">
      @include('inc.messages')
      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            Dashboard
          </li>
          <li class="breadcrumb-item active">Products</li>
        </ol>
   
        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Products</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Product Name</th>
                    <th>Category</th>
                    <th>Supplier</th>
                    <th>Unit Weight</th>
                    <th>Unit Type</th>
                    <th>Unit Price</th>
                    <th>Cover Image</th>
                    {{-- <th>Actions</th> --}}
                  </tr>
                </thead>
                <tbody>
                  @foreach ($products as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td><a href="/Products/{{$item->id}}">{{$item->Product_name}}</a></td>
                        <td>{{$item->category->Category_name}}</td>
                        <td>{{$item->supplier->Supplier_first_name}} {{$item->supplier->Supplier_last_name}}</td>
                        <td>{{$item->Product_unit_weight}}</td>
                        <td>{{$item->Product_unit_type}}</td>
                        <td>{{$item->Product_unit_price}}</td>
                        <td>cover image here</td>
                        {{-- <td>
                            <div class="btn"><a href="/Products/{{$item->id}}/edit">Edit</a></div>
                            <form action="{{ url('/Products', ['id' => $item->id]) }}" method="post">
                                <input class="btn pull-right" type="submit" value="Delete" />
                                <input type="hidden" name="_method" value="delete" />
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            </form>
                        </td> --}}
                    </tr>  
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer small text-muted"></div>
        </div>

      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
      <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright © WMS</span>
          </div>
        </div>
      </footer>

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="vendor/datatables/jquery.dataTables.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="js/demo/datatables-demo.js"></script>

</body>

</html>