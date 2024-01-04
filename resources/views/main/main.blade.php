<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <title>{{ $title }}
        @if (Request::is('/'))
            | Home
        @elseif (Request::is('buku*'))
            | Buku
        @elseif (Request::is('anggota*'))
            | Anggota
        @elseif (Request::is('petugas*'))
            | Petugas
        @elseif (Request::is('peminjaman*'))
            | Petugas
        @endif
    </title>

    <!-- vendor css -->
    <link href="/lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="/lib/Ionicons/css/ionicons.css" rel="stylesheet">
    <link href="/lib/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">
    <link href="/lib/jquery-toggles/toggles-full.css" rel="stylesheet">
    <link href="/lib/rickshaw/rickshaw.min.css" rel="stylesheet">
    <link href="/lib/select2/css/select2.min.css" rel="stylesheet">
    <link href="/lib/highlightjs/github.css" rel="stylesheet">
    <link href="/lib/datatables/jquery.dataTables.css" rel="stylesheet">

    <!-- Amanda CSS -->
    <link rel="stylesheet" href="/css/newamanda.css">
    {{-- Costum CSS DataTable --}}
    <style>
        .dataTables_length {
            /* float: left; */
            margin-top: 35px
        }

        .dataTables_filter {
            /* float:right; */
        }
    </style>
    {{-- SweetAlert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>

    @include('notify.notif')

    <div class="am-header">
        <div class="am-header-left">
            <a id="naviconLeft" href="" class="am-navicon d-none d-lg-flex"><i
                    class="icon ion-navicon-round"></i></a>
            <a id="naviconLeftMobile" href="" class="am-navicon d-lg-none"><i
                    class="icon ion-navicon-round"></i></a>
            <a href="index.html" class="am-logo">stmik</a>
        </div><!-- am-header-left -->

        <div class="am-header-right">
            <div class="dropdown dropdown-notification">
                <a href="" class="nav-link pd-x-7 pos-relative" data-toggle="dropdown">
                    <i class="icon ion-ios-bell-outline tx-24"></i>
                    <!-- start: if statement -->
                    <span class="square-8 bg-danger pos-absolute t-15 r-0 rounded-circle"></span>
                    <!-- end: if statement -->
                </a>
                <div class="dropdown-menu wd-300 pd-0-force">
                    <div class="dropdown-menu-header">
                        <label>Notifications</label>
                        <a href="">Mark All as Read</a>
                    </div><!-- d-flex -->

                    <div class="media-list">
                        <!-- loop starts here -->
                        <a href="" class="media-list-link read">
                            <div class="media pd-x-20 pd-y-15">
                                <img src="/img/img8.jpg" class="wd-40 rounded-circle" alt="">
                                <div class="media-body">
                                    <p class="tx-13 mg-b-0"><strong class="tx-medium">Suzzeth Bungaos</strong> tagged
                                        you and 18 others in
                                        a post.</p>
                                    <span class="tx-12">October 03, 2017 8:45am</span>
                                </div>
                            </div><!-- media -->
                        </a>
                        <!-- loop ends here -->
                        <a href="" class="media-list-link read">
                            <div class="media pd-x-20 pd-y-15">
                                <img src="/img/img9.jpg" class="wd-40 rounded-circle" alt="">
                                <div class="media-body">
                                    <p class="tx-13 mg-b-0"><strong class="tx-medium">Mellisa Brown</strong> appreciated
                                        your work <strong class="tx-medium">The Social Network</strong></p>
                                    <span class="tx-12">October 02, 2017 12:44am</span>
                                </div>
                            </div><!-- media -->
                        </a>
                        <a href="" class="media-list-link read">
                            <div class="media pd-x-20 pd-y-15">
                                <img src="/img/img10.jpg" class="wd-40 rounded-circle" alt="">
                                <div class="media-body">
                                    <p class="tx-13 mg-b-0">20+ new items added are for sale in your <strong
                                            class="tx-medium">Sale
                                            Group</strong></p>
                                    <span class="tx-12">October 01, 2017 10:20pm</span>
                                </div>
                            </div><!-- media -->
                        </a>
                        <a href="" class="media-list-link read">
                            <div class="media pd-x-20 pd-y-15">
                                <img src="/img/img5.jpg" class="wd-40 rounded-circle" alt="">
                                <div class="media-body">
                                    <p class="tx-13 mg-b-0"><strong class="tx-medium">Julius Erving</strong> wants to
                                        connect with you on
                                        your conversation with <strong class="tx-medium">Ronnie Mara</strong></p>
                                    <span class="tx-12">October 01, 2017 6:08pm</span>
                                </div>
                            </div><!-- media -->
                        </a>
                        <div class="media-list-footer">
                            <a href="" class="tx-12"><i class="fa fa-angle-down mg-r-5"></i> Show All
                                Notifications</a>
                        </div>
                    </div><!-- media-list -->
                </div><!-- dropdown-menu -->
            </div><!-- dropdown -->
            <div class="dropdown dropdown-profile">
                <a href="" class="nav-link nav-link-profile" data-toggle="dropdown">
                    <img src="/img/img3.jpg" class="wd-32 rounded-circle" alt="">
                    <span class="logged-name"><span class="hidden-xs-down">Jane Doe</span> <i
                            class="fa fa-angle-down mg-l-3"></i></span>
                </a>
                <div class="dropdown-menu wd-200">
                    <ul class="list-unstyled user-profile-nav">
                        <li><a href=""><i class="icon ion-ios-person-outline"></i> Edit Profile</a></li>
                        <li><a href=""><i class="icon ion-ios-gear-outline"></i> Settings</a></li>
                        <li><a href=""><i class="icon ion-ios-download-outline"></i> Downloads</a></li>
                        <li><a href=""><i class="icon ion-ios-star-outline"></i> Favorites</a></li>
                        <li><a href=""><i class="icon ion-ios-folder-outline"></i> Collections</a></li>
                        <li><a href=""><i class="icon ion-power"></i> Sign Out</a></li>
                    </ul>
                </div><!-- dropdown-menu -->
            </div><!-- dropdown -->
        </div><!-- am-header-right -->
    </div><!-- am-header -->

    <div class="am-sideleft">
        <div id="mainMenu" class="tab-pane active"> <!-- tab pane ku edit dari 60px ke 0px top nya di amanda.css -->
            <ul class="nav am-sideleft-menu">
                {{-- Kode HTML ini menggunakan * sebagai wildcard. * berarti bahwa URL yang cocok adalah semua URL yang dimulai dengan buku. Jadi, jika request adalah /buku/create, maka kelas active akan ditambahkan. --}}
                <li class="nav-item">
                    <a href="/" class="nav-link {{ Request::is('/') ? 'active' : '' }}">
                        <i class="icon ion-ios-home-outline"></i>
                        <span>Dashboard</span>
                    </a>
                </li><!-- nav-item -->
                <li class="nav-item">
                    <a href="/buku" class="nav-link {{ Request::is('buku*') ? 'active' : '' }}">
                        <i class="icon ion-ios-book-outline"></i>
                        <span>Buku</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/anggota" class="nav-link {{ Request::is('anggota*') ? 'active' : '' }}">
                        <i class="icon ion-ios-person-outline"></i>
                        <span>Anggota</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/petugas" class="nav-link {{ Request::is('petugas*') ? 'active' : '' }}">
                        <i class="icon ion-ios-eye-outline"></i>
                        <span>Petugas</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/peminjaman" class="nav-link {{ Request::is('peminjaman*') ? 'active' : '' }}">
                        <i class="icon ion-ios-book-outline"></i>
                        <span>Peminjaman</span>
                    </a>
                </li>
            </ul>
        </div><!-- #mainMenu -->


    </div><!-- am-sideleft -->

    <div class="am-mainpanel">
        <div class="am-pagetitle">
            <h5 class="am-title">

                @yield('am-title')

            </h5>

            {{-- @yield('search') --}}

        </div><!-- am-pagetitle -->

        <div class="am-pagebody">

            @yield('page-body')

        </div><!-- am-pagebody -->
        <div class="am-footer">
            <span>Copyright &copy;. All Rights Reserved. Amanda Responsive Bootstrap 4 Admin Dashboard.</span>
            <span>Created by: ThemePixels, Inc.</span>
        </div><!-- am-footer -->
    </div><!-- am-mainpanel -->

    <script src="/lib/jquery/jquery.js"></script>
    <script src="/lib/popper.js/popper.js"></script>
    <script src="/lib/bootstrap/bootstrap.js"></script>
    <script src="/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
    <script src="/lib/jquery-toggles/toggles.min.js"></script>
    <script src="/lib/d3/d3.js"></script>
    <script src="/lib/rickshaw/rickshaw.min.js"></script>
    <script src="http://maps.google.com/maps/api/js?key=AIzaSyAEt_DBLTknLexNbTVwbXyq2HSf2UbRBU8"></script>
    <script src="/lib/gmaps/gmaps.js"></script>
    <script src="/lib/Flot/jquery.flot.js"></script>
    {{-- <script src="/lib/Flot/jquery.  flot.pie.js"></script> --}}
    <script src="/lib/Flot/jquery.flot.resize.js"></script>
    <script src="/lib/flot-spline/jquery.flot.spline.js"></script>
    <script src="/lib/select2/js/select2.min.js"></script>
    <script src="/js/amanda.js"></script>
    <script src="/js/ResizeSensor.js"></script>
    <script src="/js/dashboard.js"></script>
    <script src="/lib/highlightjs/highlight.pack.js"></script>
    {{-- <script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script> --}}


    {{-- data table --}}
    <script src="/lib/datatables-responsive/dataTables.responsive.js"></script>
    <script src="/lib/datatables/jquery.dataTables.js"></script>
    {{-- kode ku --}}
    <script src="/js/myjs/my_datatable.js"></script>


</body>

</html>
