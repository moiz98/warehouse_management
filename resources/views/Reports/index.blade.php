<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <!-- Custom fonts for this template-->
     <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

     <!-- Page level plugin CSS-->
     <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

     <!-- Custom styles for this template-->
     <link href="css/sb-admin.css" rel="stylesheet">
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
    <title>Report</title>
</head>
<body id="page-top">
        <nav class="navbar navbar-expand navbar-dark bg-dark static-top">
                <a class="navbar-brand mr-1" href="/Reports">Admin - Reports</a>
            
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
                    <a class="dropdown-item" href="{{ route('logout') }}"
                      onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
                      Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
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
                  <a class="nav-link" href="/admin">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                      <span>Dashboard</span>
                  </a>
                </li>
                <li class="nav-item active">
                  <a class="nav-link" href="/Reports">
                  <i class="fas fa-fw fa-chart-area"></i>
                  <span>Reports</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/suppliers">
                  <i class="fas fa-fw fa-table"></i>
                  <span>Suppliers</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/employees">
                  <i class="fas fa-fw fa-table"></i>
                  <span>Employees</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/adminproducts">
                  <i class="fas fa-fw fa-table"></i>
                  <span>Products</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/category">
                  <i class="fas fa-fw fa-table"></i>
                  <span>Categories</span></a>
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
                      <li class="breadcrumb-item active">Charts</li>
                    </ol>

                    <!-- Area Chart Example-->
                    <div class="card mb-3">
                      <div class="card-header">
                        <i class="fas fa-chart-area"></i>
                        Sales Report Chart</div>
                      <div class="card-body">
                        <canvas id="myAreaChart" width="100%" height="30"></canvas>
                      </div>
                      <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                    </div>

                    <div class="row">
                      <div class="col-lg-8">
                        <div class="card mb-3">
                          <div class="card-header">
                            <i class="fas fa-chart-bar"></i>
                            Bar Chart Example</div>
                          <div class="card-body">
                            <canvas id="myBarChart" width="100%" height="50"></canvas>
                          </div>
                          <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="card mb-3">
                          <div class="card-header">
                            <i class="fas fa-chart-pie"></i>
                            Pie Chart Example</div>
                          <div class="card-body">
                            <canvas id="myPieChart" width="100%" height="100"></canvas>
                          </div>
                          <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                        </div>
                      </div>
                    </div>

                  </div>
                  <!-- /.container-fluid -->

                  <!-- Sticky Footer -->
                  <footer class="sticky-footer">
                    <div class="container my-auto">
                      <div class="copyright text-center my-auto">
                        <span>Copyright © Your Website 2019</span>
                      </div>
                    </div>
                  </footer>

                </div>
                <!-- /.content-wrapper -->

              </div>
              <!-- /#wrapper -->

          <!-- Bootstrap core JavaScript-->
            <script src="vendor/jquery/jquery.min.js"></script>
            <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

            <!-- Core plugin JavaScript-->
            <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

            <!-- Page level plugin JavaScript-->
            <script src="vendor/chart.js/Chart.min.js"></script>

            <!-- Custom scripts for all pages-->
            <script src="js/sb-admin.min.js"></script>

            <!-- Demo scripts for this page-->
            <script src="js/demo/chart-area-demo.js"></script>
            <script src="js/demo/chart-bar-demo.js"></script>
            <script src="js/demo/chart-pie-demo.js"></script>
</body>
</html>