<!-- resources/views/admin/profile.blade.php -->
<style>
    /* public/css/style.css */

    /* General container styles */
    .container-fluid {
        width: 100%;
        padding: 15px;
        margin: 0 auto;
    }

    /* Profile heading styles */
    .profile-heading {
        text-align: left;
        margin-top: 20px;
        padding-left: 20px; /* Adjust padding as needed */
    }

    h3.m-0 {
        font-size: 24px;
        margin-bottom: 20px;
    }

    /* Profile container styles */
    .profile-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        margin-top: 20px;
        background-color: #f9f9f9;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        width: 100%;
        .profile-container {
        max-width: 400px; /* Adjust as needed */
        margin: 0 auto; /* Center the container */
    }
    }

    .profile-details {
        text-align: left;
        margin-top: 20px;
        padding: 20px;
    }

    .profile-details img {
        display: block;
        width: 100%; /* Ensure image takes full width of its container */
        height: auto; /* Maintain aspect ratio */
        max-width: 100%;
    }

    .profile-details p {
        font-size: 18px;
        margin: 10px 0;
    }

    .profile-details .btn {
        display: inline-block;
        padding: 10px 20px;
        background-color: #007bff;
        color: #fff;
        text-decoration: none;
        border-radius: 5px;
        margin-top: 10px;
    }

    .profile-details .btn:hover {
        background-color: #0056b3;
    }
    .profile-picture {
        display: block;
        max-width: 100%;
        height: auto;
        max-height: 300px; /* Adjust as needed */
    }
</style>
@extends('admin.adminmenu')

@section('admincontent')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="container-fluid pt-1 px-3">
            <div class="profile-heading bg-light rounded-top p-4">
                <h3 class="m-0">Profile</h3>
            </div>
            <div class="profile-container">
                <div class="profile-details bg-light rounded-top p-4">
                @if($user->foto)
                        <img src="{{ asset($user->foto) }}" alt="Profile Picture" class="profile-picture">
                    @else
                        <img src="{{ asset('images/default-profile.png') }}" alt="Default Profile Picture" class="profile-picture">
                    @endif
                    <p><strong>Name     :</strong> {{ $user->name }}</p>
                    <p><strong>Email    :</strong> {{ $user->email }}</p>
                    <p><strong>No HP    :</strong> {{ $user->no_hp }}</p>
                    <p><strong>Alamat   :</strong> {{ $user->alamat }}</p>
                    <p><strong>Agama    :</strong> {{ $user->agama }}</p>
                    <p><strong>Role     :</strong> {{ $user->role }}</p>
                    <a href="{{ route('profile.edit') }}" class="btn">Edit Profile</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
