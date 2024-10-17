@extends('auth.auth')

@section('content')

<div class="d-flex justify-content-center align-items-center py-5">
    <div class="card shadow rounded-5 h-25 w-75">
        <div class="card-body p-4">
            <h2 class="mb-4 text-center">Create an Account</h2>
            <div class="row">
                <div class="col-md">
                    <form action="" method="POST">
                        @csrf
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
                        <div class="form-check mb-3">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">I agree to the term of service</label>
                          </div>
                        <button type="submit" class="btn btn-primary w-100 rounded-3" style="background-color: #A594F9; color:black" ><b>Register</b></button>
                    </form>
                    <p class="mt-3">Already have an account?<a href="" class="text-danger">Sign in now</a></p>
                </div>
                <div class="col-md">
                    <div class="text-center">
                        <img src="{{ asset('resource/logo.svg') }}" alt="MoodMate Logo" class="img-fluid h-75 w-75">
                        <h1><span class="highlight">Mood</span>Mate</h1>
                    </div> 
                </div>
            </div>
        </div>
       
    </div>
</div>

@endsection