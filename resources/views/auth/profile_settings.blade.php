@extends('auth.auth')

@section('content')

<div class="d-flex justify-content-center align-items-center py-5">
    <div class="card shadow rounded-5 h-25 w-75">
        <div class="card-body p-5">
            <div class="row">
                <div class="col-md me-5">
                    <h1><span class="highlight">Profile</span>Settings</h1>
                    <p>Personalize Your Information Account</p>
                </div>
                <div class="col-md d-flex justify-content-end">
                    <img src="{{ asset('resource/ic_profileupload.svg') }}" alt="" class="img-fluid">
                </div>
            </div>
            <div class="mb-3">
                <label for="username" class="form-label"><b>USERNAME*</b></label>
                <input type="text" class="form-control" name="username" id="username" placeholder="Type your username here" required>
            </div>
            <div class="mb-3">
                <label for="fullname" class="form-label"><b>FULL NAME*</b></label>
                <input type="text" class="form-control" name="fullname" id="fullname" placeholder="Type your full name here" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label"><b>EMAIL*</b></label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Type your email here" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label"><b>PASSWORD*</b></label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Type your password here" required>
            </div>
            <div class="d-flex justify-content-end mt-5">
                <form action="{{ route('profile.logout') }}" method="POST" class="w-100 justify-content-end d-flex">
                        @csrf
                        {{-- <a href="#" type="submit" class="btn btn-light rounded-pill me-3 w-25" style="padding: 1px 15px; border:1px solid black">Log out</a> --}}
                        <button type="submit" class="btn btn-light rounded-pill me-3 w-25" style="border:1px solid black">Logout</button>
                </form>
                <button class="btn btn-primary rounded-pill me-3 w-25" style="padding: 1px 8px;background-color: #A594F9; color: black;">Edit Profile</button>
                        {{-- <a href="#" class="btn btn-primary rounded-pill me-3 w-25" style="padding: 1px 8px;background-color: #A594F9; color: black;">Edit Profile</a> --}}
            </div>
        </div>
    </div>
</div>

@endsection