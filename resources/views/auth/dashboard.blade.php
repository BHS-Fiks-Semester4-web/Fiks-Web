@extends('auth.layouts')
@extends('auth.copyright')


@section('content')
<div class="container">
    <div class="p1">Pusat Jual Beli Laptop Baru dan Second</div>
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="card-body">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            {{ $message }}
                        </div>
                    @else
                        <div class="alert alert-success">
                            Anda Berhasil Login !!!
                        </div>       
                    @endif                
                </div>
            </div>
        </div>    
    </div>
</div>

    
@endsection