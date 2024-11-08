@extends('layouts.app')

@section('content')
    <div class="m-4">
        <h1><span class="highlight">Community</span> Support</h1>
        <p class="text-justify me-5">Community Support is a feature in the MoodMate platform designed to provide a space for users to share their stories, offer emotional support, 
            and engage in discussions related to mental health. Through this feature, users can join online communities, exchange experiences, and receive encouragement from 
            others facing similar challenges. This feature aims to create a safe and inclusive environment where users can feel heard, accepted, and inspired to live more positively.
        </p>
    </div>

    <div class="m-5 px-5">
        <div class="rounded-5 " style="background-color: #F5F7F8">
            <div class="row p-3 justify-content-center align-items-center">
                <div class="col-8 ">
                    <div class="d-flex flex-column align-items-stretch">
                        <div class="text-end">
                            <h3 class="fw-bold"><span class="highlight">Malang Mental</span> Sehat</h3>
                        </div>
                        <div class="text-center my-2">
                            <p>This feature aims to create a safe and inclusive environment where users can feel heard, 
                                accepted, and inspired to live more positively in Malang City.
                            </p>
                        </div>
                        <div class="text-start">
                            <button class="btn btn-primary">Join</button>
                        </div>
                    </div>
                    
                </div>
                <div class="col-1">

                </div>
                <div class="col">
                    <img src="{{ asset('/image/cs/img_cs.png') }}" alt="" class="img-fluid h-75">
                </div>
            </div>
        </div>
        <div class="rounded-5 mt-5" style="background-color: #F5F7F8">
            <div class="row p-3 justify-content-center align-items-center">
                <div class="col">
                    <img src="{{ asset('/image/cs/img_cs.png') }}" alt="" class="img-fluid h-75">
                </div>
                <div class="col-1">

                </div>
                <div class="col-8 ">
                    <div class="d-flex flex-column align-items-stretch">
                        <div class="text-start">
                            <h3 class="fw-bold"><span class="highlight">Support</span> System</h3>
                        </div>
                        <div class="text-center my-2">
                            <p>This feature aims to create a safe and inclusive environment where users can feel heard, 
                                accepted, and inspired to live more positively in Malang City.
                            </p>
                        </div>
                        <div class="text-end">
                            <button class="btn btn-primary">Join</button>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>

        <div class="rounded-5 mt-5" style="background-color: #F5F7F8">
            <div class="row p-3 justify-content-center align-items-center">
                <div class="col-8 ">
                    <div class="d-flex flex-column align-items-stretch">
                        <div class="text-end">
                            <h3 class="fw-bold"><span class="highlight">Malang Mental</span> Sehat</h3>
                        </div>
                        <div class="text-center my-2">
                            <p>This feature aims to create a safe and inclusive environment where users can feel heard, 
                                accepted, and inspired to live more positively in Malang City.
                            </p>
                        </div>
                        <div class="text-start">
                            <button class="btn btn-primary">Join</button>
                        </div>
                    </div>
                    
                </div>
                <div class="col-1">

                </div>
                <div class="col">
                    <img src="{{ asset('/image/cs/img_cs.png') }}" alt="" class="img-fluid h-75">
                </div>
            </div>
        </div>
    </div>
@endsection