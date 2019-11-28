<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<style>
			body{
			    background: linear-gradient(rgba(255,255,255,.2), rgba(255,255,255,.2)),url(https://www.conceptstorage.com/media/zoo/images/increase-warehouse-storage-capacity_4a32e3cb56b8fbced289eb2b9420edc3.jpg);
				background-size: cover;
				background-position: center;
				/* margin-top:20px; */
				/* background:#eee; */
			}
			.card{
				margin-left: 105px;
				padding: 5px;
				margin-top: 10px;
				margin-bottom: 10px;
			}
			.arrivaltag{
				text-align: center;
			}
            .card-img-top{
                height: 300px;
            }
			</style>
	<title>Products</title>

	<!-- Custom fonts for this template-->
    <link href="{{url('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="{{url('vendor/datatables/dataTables.bootstrap4.css')}}" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{url('css/sb-admin.css')}}" rel="stylesheet">

</head>
<body id="page-top">
        
<nav class="navbar navbar-expand navbar-dark bg-dark static-top">
    <a class="navbar-brand mr-1" href="/products">Products</a>
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
                        {{-- <a class="dropdown-item" href="/user/settings">Settings</a>
                        <div class="dropdown-divider"></div> --}}
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
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
        @if (Auth::guest())
        <li class="nav-item">
                <a class="nav-link" href="/">
                    <i class="fas fa-fw fa-warehouse"></i>
                    <span>Home</span>
                </a>
            </li>    
        @else
        <li class="nav-item">
                <a class="nav-link" href="/home">
                    <i class="fas fa-fw fa-warehouse"></i>
                    <span>Hey {{Auth::user()->first_name}}!</span>
                </a>
            </li>    
        @endif
        
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
        <li class="nav-item active">
            <a class="nav-link" href="/products">
                <i class="fas fa-shopping-cart"></i>
                <span>Products</span>
            </a>
        </li>

		<li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				<i class="fas fa-shopping-cart"></i>
				<span>Categories</span>
			</a>
			<div class="dropdown-menu" aria-labelledby="pagesDropdown">
                @foreach ($category as $item)
                    <a class="dropdown-item" href="/products/{{$item->id}}">{{$item->Category_name}}</a>  
                @endforeach
			</div>
		</li>
	</ul>

	<div id="content-wrapper">
        @include('inc.messages')
        @if(count($products)>0)
            <div class="container-fluid">
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item active">
                        <i><b>New Arrivals!</b></i>
                    </li>
                </ol>
            </div>    
        @else
            <div class="container-fluid">
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item active">
                        <i><b>No Products Available</b></i>
                    </li>
                </ol>
            </div>
        @endif
        
        @if(count($products)>0)
            @foreach($products->chunk(3) as $chunk)
                <div class="row">
                    @foreach($chunk as $product)
                        <div class="card bg-light" style="width:400px">
                            <img class="card-img-top" src="/storage/cover_images/{{$product->cover_img}}" alt="Card image" class="rounded mx-auto d-block">
                            <div class="card-body">
                                <h4 class="card-title"><a href="http:/Products/{{$product->id}}">{{$product->Product_name}}</a></h4>
                                <p class="card-text">{{$product->category->Category_name}}</p>
                                <div class="col-md-12">
                                    <div class="rating">Rating:
                                        <label for="stars-rating-5"><i class="fa fa-star text-warning"></i></label>
                                        <label for="stars-rating-4"><i class="fa fa-star text-warning"></i></label>
                                        <label for="stars-rating-3"><i class="fa fa-star text-warning"></i></label>
                                        <label for="stars-rating-2"><i class="fa fa-star text-warning"></i></label>
                                        <label for="stars-rating-1"><i class="fa fa-star text-warning"></i></label>
                                    </div>
                                </div>
                                @if (!Auth::guest())
                                    {{-- stocks check here --}}
                                    @foreach ($inventory as $inv)
                                        @if ($inv->product_id == $product->id)
                                            @if ($inv->units_in_stock > 0)
                                                <a href="/products/cart/{{Auth::user()->id}}/{{$product->id}}" class="btn btn-primary">Add to Cart <i class="fas fa-shopping-cart"></i></a>    
                                            @endif
                                        @endif    
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach
            {{ $products->links() }}     
        @endif

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
	 <script src="{{url('js/sb-admin.min.js')}}"></script>

	 <!-- Demo scripts for this page-->
	 <script src="{{url('js/demo/datatables-demo.js')}}"></script>
	 <script src="{{url('js/demo/chart-area-demo.js')}}"></script>
</body>
</html>