@extends('admin.adminmenu')

@section('admincontent')
<div class="container-fluid pt-4 px-4">
    <div class="row">
        <div class="col-md-12">
            <div class="d-flex justify-content-between align-items-center">
                <h2 class="m-0">Data Admin</h2>
                <button type="button" class="btn-close" aria-label="Close" onclick="window.history.back()"></button>
            </div>
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('dashboard.indexDataAdmin') }}" method="GET" class="mb-4">
                <div class="input-group">
                    <input type="text" class="form-control" name="search" placeholder="Cari admin...">
                    <button class="btn btn-primary" type="submit">Cari</button>
                </div>
            </form>
        </div>
    </div>

    <div class="row">
        @foreach($data_admins as $admin)
        <div class="col-md-3 mb-4">
            <div class="card">
                @if ($admin->foto)
                    <img src="{{ 'data:image/jpeg;base64,' . base64_encode($admin->foto) }}" class="card-img-top">
                @else
                    <img class="card-img-top" src="/admins/img/profile.png">
                @endif
                <div class="card-body" style="line-height: 0.5;">
                    <h5 class="card-title">{{ $admin->username }}</h5>
                    <p class="card-text"><small>{{ $admin->name }}</small></p>
                    <p class="card-text"><small>{{ $admin->email }}</small></p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
