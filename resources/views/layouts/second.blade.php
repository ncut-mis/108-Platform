<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>平台人員頁面</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="{{asset('img/favicon.ico')}}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{asset('lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{asset('lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css')}}" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <style>
        header
        {
            font-family:Comic Sans MS, Comic Sans, cursive;
        }
        body
        {
            font-family:Comic Sans MS, Comic Sans, cursive;
        }
        main
        {
            font-family:Comic Sans MS, Comic Sans, cursive;

        }
        .a1{}
        th
        {
            border: none;
        }
    </style>
</head>

<header>

    <!-- Spinner Start -->
{{--    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">--}}
{{--        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">--}}
{{--            <span class="sr-only">Loading...</span>--}}
{{--        </div>--}}
{{--    </div>--}}
    <!-- Spinner End -->


    <!-- Sidebar Start -->
    <div class="sidebar pe-4 pb-3">
        <nav class="navbar bg-light navbar-light ">

            <div class="navbar-nav w-100">
                <div class="nav-item dropdown">
                <?php //人員編號目前固定最多三碼
                   if(strlen(auth()->user()->id)==1)
                       {
                           echo "<a href='#' class='nav-link dropdown-toggle' data-bs-toggle='dropdown'><i class='bi bi-person-bounding-box'>
                         </i>  00".auth()->user()->id."&nbsp;".auth()->user()->name."</a>";
                       }
                   else if (strlen(auth()->user()->id)==2)
                       {
                           echo "<a href='#' class='nav-link dropdown-toggle' data-bs-toggle='dropdown'><i class='bi bi-person-bounding-box'>
                         </i>  0".auth()->user()->id."&nbsp;".auth()->user()->name."</a>";
                       }
                   else
                       {
                           echo "<a href='#' class='nav-link dropdown-toggle' data-bs-toggle='dropdown'><i class='bi bi-person-bounding-box'>
                         </i>  ".auth()->user()->id."&nbsp;".auth()->user()->name."</a>";
                       }

                ?>
                   <div class="dropdown-menu bg-transparent border-1">
                        {{--<a  href="" class="dropdown-item" style="color: #6b7280">個人資訊</a>--}}
                        <a class="dropdown-item" href="{{ route('logout') }}" style="font-size:15px;color: #6b7280"
                           onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
                            {{ __('登出') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>

                </div><br>
                <a href="{{route('staffhome.index')}}" class="nav-item nav-link"><i class="bi bi-house-door-fill"></i>  首頁</a><br>
                <a href="{{route('staffschedule.index')}}" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>查看班表</a><br>
                <a href="{{route('staff.post')}}" class="nav-item nav-link"><i class="fa fa-laptop me-2"></i>查看公告</a>


            </div>
        </nav>
    </div>


</header>

<!-- Widgets End -->

<footer>
    <!-- Footer Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="bg-light rounded-top p-4">
            <div class="row">
                <div class="col-12 col-sm-12 text-center text-sm-end">
                    &copy; <a href="#">Your Site Name</a>, All Right Reserved.
                </div>

            </div>
        </div>
    </div>
    <!-- Footer End -->

    <!-- Content End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('lib/chart/chart.min.js')}}"></script>
    <script src="{{asset('lib/easing/easing.min.js')}}"></script>
    <script src="{{asset('lib/waypoints/waypoints.min.js')}}"></script>
    <script src="{{asset('lib/owlcarousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('ib/tempusdominus/js/moment.min.js')}}l"></script>
    <script src="{{asset('lib/tempusdominus/js/moment-timezone.min.js')}}"></script>
    <script src="{{asset('lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js')}}"></script>

    <!-- Template Javascript -->
    <script src="{{asset('js/main.js')}}"></script>
</footer>

</html>
