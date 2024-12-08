@extends('auth.auth')

@section('content')

<div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="card shadow rounded-5 h-25 w-75" >
        <div class="card-body p-5">
            <div class="row">
                <div class="col-md">
                    <h2 class="mb-4">Welcome Back</h2>
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label"><b>EMAIL*</b></label>
                            <input 
                                type="email" 
                                class="form-control @error('email') is-invalid @enderror" 
                                id="email" 
                                name="email" 
                                placeholder="Type your email here" 
                                value="{{ old('email') }}" 
                                required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label"><b>PASSWORD*</b></label>
                            <input 
                                type="password" 
                                class="form-control @error('password') is-invalid @enderror" 
                                id="password" 
                                name="password" 
                                placeholder="Type your password here" 
                                required>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary w-100 rounded-3" style="background-color: #A594F9; color:black">Login</button>
                    </form>
                    
                    <p class="mt-3">Don't have an account yet? <a href="{{ route('register.form') }}" class="text-danger">Sign Up now</a></p>
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