@extends('admin.adminmain')

@section('adminmain')
    <div class="container-xxl position-relative bg-white d-flex p-0">
            
        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <a href="/dashboard" class="navbar-brand mx-4 mb-3">
                    <img src="{{asset('image/logo1x2.png')}}" alt="Akhwat Computer Logo" style="height: 33px;">
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        @if (Auth::user()->foto)
                            <img class="rounded-circle" src="data:image/jpeg;base64,{{ base64_encode(Auth::user()->foto) }}" alt="" style="width: 40px; height: 40px;">
                        @else
                            <img class="rounded-circle" src="/admins/img/profile.png" style="width: 40px; height: 40px;">
                        @endif
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <a href="profile"><h6 class="mb-0">{{ Auth::user()->username }}</h6>
                        <span>{{ Auth::user()->role }}</span></a>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="/dashboard" class="nav-item nav-link {{ Request::is('dashboard') ? 'active' : '' }}"><i class="fa fa-dashboard me-2"></i>Dashboard</a>
                    <a href="/data_barang" class="nav-item nav-link {{ Request::is('data_barang*') ? 'active' : '' }}"><i class="fa fa-box-archive me-2"></i>Data Barang</a>
                    <a href="/data_pengguna" class="nav-item nav-link {{ Request::is('data_pengguna*') ? 'active' : '' }}"><i class="fa fa-users me-2"></i>Data Pengguna</a>
                    <a href="/data_pemasok" class="nav-item nav-link {{ Request::is('data_pemasok*') ? 'active' : '' }}"><i class="fa fa-truck-field me-2"></i>Data Pemasok</a>
                    <a href="/data_jenis_barang" class="nav-item nav-link {{ Request::is('data_jenis_barang*') ? 'active' : '' }}"><i class="fa fa-clipboard-list me-2"></i>Jenis Barang</a>
                    <a href="/data_service" class="nav-item nav-link {{ Request::is('data_service*') ? 'active' : '' }}"><i class="fa fa-wrench me-2"></i>Layanan</a>
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 pt-2">
                <a href="/dashboard" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i><img src="{{asset('image/logo.png')}}" alt="Akhwat Computer" width="40" height="40"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                        <form action="/signout" method="post" class="d-inline">
                            @csrf
                            <button class="btn btn-danger" type="submit">Sign-out</button>
                        </form>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->

            @yield('admincontent')
            @include('admin.adminfooter')
        </div>
    </div>
@endsection