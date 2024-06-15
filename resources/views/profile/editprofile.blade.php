<!-- resources/views/admin/profile_edit.blade.php -->
@extends('admin.adminmenu')

@section('admincontent')
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
    max-width: 400px; /* Adjust as needed */
    margin: 0 auto; /* Center the container */
}

.profile-details {
    text-align: left;
    margin-top: 20px;
    padding: 20px;
    width: 100%;
}

.profile-details img {
    display: block;
    width: 100%; /* Ensure image takes full width of its container */
    height: auto; /* Maintain aspect ratio */
    max-width: 100%;
    margin-bottom: 10px; /* Add margin below the image */
}

.profile-details p,
.profile-details label {
    font-size: 18px;
    margin: 10px 0;
}

.profile-details .form-group {
    margin-bottom: 15px;
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
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="container-fluid pt-1 px-3">
            <div class="profile-heading bg-light rounded-top p-4">
                <h3 class="m-0">Edit Profile</h3>
            </div>
            <div class="profile-container">
                <div class="profile-details bg-light rounded-top p-4">
                    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="profile_picture">Profile Picture</label>
                            <input type="file" id="profile_picture" name="profile_picture" class="form-control">
                            <img src="data:image/jpeg;base64,{{ base64_encode($user->foto) }}" alt="Profile Picture" class="profile-picture mt-2">
                        </div>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" id="name" name="name" class="form-control" value="{{ $user->name }}">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" class="form-control" value="{{ $user->email }}">
                        </div>
                        <div class="form-group">
                            <label for="no_hp">No HP</label>
                            <input type="text" id="no_hp" name="no_hp" class="form-control" value="{{ $user->no_hp }}">
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea id="alamat" name="alamat" class="form-control">{{ $user->alamat }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="agama">Agama</label>
                            <input type="text" id="agama" name="agama" class="form-control" value="{{ $user->agama }}">
                        </div>
                        
                        <button type="submit" class="btn btn-primary mt-3">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
