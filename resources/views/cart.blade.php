{{-- here is cart of cart id {{$id}} --}}

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
				margin-left: 205px;
				padding: 5px;
				margin-top: 10px;
				margin-bottom: 10px;
      }
      .card-title#price-list{
        margin-left: 370px;
      }
      .card-title#heading-margin{
        margin-left: 20px;
      }
      .signup-form{
		width: 950px;
		margin-left: 18em;
		padding: 10px;
	}
	.signup-form h2{
		color: #7a7a7a;
        margin: 0 0 15px;
		position: relative;
		text-align: center;
    }
	.signup-form h2:before, .signup-form h2:after{
		content: "";
		height: 2px;
		width: 30%;
		position: absolute;
		top: 20%;
		z-index: 2;
	}	
	.signup-form h2:before{
		left: 0;
	}
	.signup-form h2:after{
		right: 0;
	}
	.signup-form .avatar {
		position: absolute;
		margin-left: 60em;
        margin-top: 5em;
		left: 0;
		right: 0;
		top: 0px;
		width: 95px;
		height: 95px;
		border-radius: 50%;
		z-index: 9;
		background: #70c5c0;
		padding: 15px;
		box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);
	}
	.signup-form .avatar img {
		width: 100%;
	}	
    .signup-form .hint-text{
		color: #999;
		margin-bottom: 30px;
		text-align: center;
	}
    .signup-form form{
		color: #7a7a7a;
		border-radius: 3px;
    	margin-bottom: 15px;
        background: #ececec;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 50px;
    }
	.signup-form .form-group{
		margin-bottom: 20px;
    padding: 15px;
	}
	.signup-form input[type="checkbox"]{
		margin-top: 3px;
	}
	.signup-form .btn{        
        font-size: 16px;
        font-weight: bold;		
		min-width: 140px;
        outline: none !important;
        background: #70c5c0;
        border:none;
    }
	.signup-form .row div:first-child{
		padding-right: 10px;
	}
	.signup-form .row div:last-child{
		padding-left: 10px;
	}    	
    .signup-form a{
		color: #fff;
		text-decoration: underline;
	}
    .signup-form a:hover{
		text-decoration: none;
	}
	.signup-form form a{
		color: #7a7a7a;
		text-decoration: none;
	}	
	.signup-form form a:hover{
		text-decoration: underline;
	}
  .breadcrumb-item{
    font-size: 3em;
  }
  .buybut{
    margin-left: 23em;
  }
    </style>

  <title>Cart</title>

  <!-- Custom fonts for this template-->
  <link href="{{url('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="{{url('vendor/datatables/dataTables.bootstrap4.css')}}" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{url('css/sb-admin.css')}}" rel="stylesheet">
</head>
<body id="page-top">
        <nav class="navbar navbar-expand navbar-dark bg-dark static-top">
                <a class="navbar-brand mr-1" href="/products">WMS - Cart</a>
                <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
                    <i class="fas fa-bars"></i>
                </button>
            
                <!-- Navbar -->
                <ul class="navbar-nav ml-auto mr-0 mr-md-3 my-2 my-md-0">
                    <li class="nav-item dropdown no-arrow">
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a class="nav-link" role="button" href="{{ route('login') }}">Login</a></li>
                            <li><a class="nav-link" role="button" href="{{ route('register') }}">Register</a></li>
                        @else
                        <li><a class="nav-link" role="button" href="/cart/{{Auth::user()->cart->id}}">Cart</a></li>
                            <li class="dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    <i class="fas fa-user-circle fa-fw"></i>
                                    {{ Auth::user()->first_name }} <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    {{-- <a class="dropdown-item" href="/user/settings">Settings</a> --}}
                                    {{-- <div class="dropdown-divider"></div> --}}
                                    <li>
                                        <a class="dropdown-item" href="{{ route('user.logout') }}"
                                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>
                                        <form id="logout-form" action="{{ route('user.logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                        </div>
                    </li>
                </ul>
            </nav>
            
              <div id="wrapper">

                    <!-- Sidebar -->
                    <ul class="sidebar navbar-nav">
                      <li class="nav-item active">
                            <a class="nav-link" href="/home">
                                <i class="fas fa-fw fa-warehouse"></i>
                                <span>Hey {{Auth::user()->first_name}}!</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/about">
                                <i class="fa fa-file"></i>
                                <span>About Us</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/contact">
                                <i class="fas fa-envelope"></i>
                                <span>Contact Us</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/products">
                                <i class='fas fa-shopping-cart'></i>
                                <span>Products</span>
                            </a>
                        </li>
                    </ul>

                    <div id="content-wrapper">
                      <div class="signup-form">
                        <form>
                          <div class="container-fluid">
                            <ol class="breadcrumb justify-content-center">
                              <li class="breadcrumb-item">
                                <i><b>Cart</b></i>
                              </li>
                            </ol>
                          </div>

                          <div class="form-group">
                              <div class="table-responsive">
                                  <table class="table table-bordered" width="100%" cellspacing="0">
                                      <thead>
                                          <tr>
                                              <th>Product Name</th>
                                              <th>Product Quantity</th>
                                              <th>Product Amount</th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                          @foreach ( $orders as $order)
                                          <tr>    
                                              <td> {{ $order->Product_name}}</td>
                                              <td> {{ $order->Quantity}}</td>
                                              <td> {{ $order->Price}}</td>
                                          </tr>
                                          @endforeach
                                          
                                         
                                          
                                            @if ($total_amount != 0)
                                              <tr>
                                                <td>Shipping Cost: </td>
                                              </tr>
                                              <tr>
                                                <td>Total Amount: {{$total_amount}}</td>
                                              </tr>       
                                            @endif
                                                
                                      </tbody>
                                  </table>
                              </div>
                            </div>
                            {{-- order now button here --}}
                            <button class="buybut"><a href="/products/cart/{{$id}}">Buy Now</a></button>
                          </form>
                        </div>
            </div>
              </div>
            </div>
          </div>



    <!-- Bootstrap core JavaScript-->
  <script src="{{url('vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{url('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{url('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

  <!-- Page level plugin JavaScript-->
  <script src="{{url('vendor/chart.js/Chart.min.js')}}"></script>
  <script src="{{url('vendor/datatables/jquery.dataTables.js')}}"></script>
  <script src="{{url('vendor/datatables/dataTables.bootstrap4.js')}}"></script>

  <!-- Custom scripts for all pages-->
  <script src={{url('js/sb-admin.min.js')}}></script>

  <!-- Demo scripts for this page-->
  <script src="{{url('js/demo/datatables-demo.js')}}"></script>
  <script src="{{url('js/demo/chart-area-demo.js')}}"></script>
</body>
</html>