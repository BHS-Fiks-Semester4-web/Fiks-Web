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
                        <img class="rounded-circle" src="data:image/jpeg;base64,{{ base64_encode(Auth::user()->foto) }}" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0">{{ Auth::user()->username }}</h6>
                        <span>{{ Auth::user()->role }}</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="/dashboard" class="nav-item nav-link {{ Request::is('dashboard') ? 'active' : '' }}"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <a href="/databarang" class="nav-item nav-link {{ Request::is('databarang*') ? 'active' : '' }}"><i class="fa fa-keyboard me-2"></i>Data Barang</a>
                    <a href="/datakaryawan" class="nav-item nav-link {{ Request::is('datakaryawan*') ? 'active' : '' }}"><i class="fa fa-laptop me-2"></i>Data Karyawan</a>
                    <a href="/datakategori" class="nav-item nav-link {{ Request::is('datakategori*') ? 'active' : '' }}"><i class="fa fa-laptop me-2"></i>Data Kategori</a>
                    <a href="/datapemasok" class="nav-item nav-link {{ Request::is('datapemasok*') ? 'active' : '' }}"><i class="fa fa-laptop me-2"></i>Data Pemasok</a>
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
            
        </div>
    </div>
@endsection