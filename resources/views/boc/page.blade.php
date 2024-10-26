@extends('layouts.app')

@section('content')
    <div class="m-4">
        <h1><span class="highlight">Breath</span> of Calm</h1>
        <p>Dr. Andrew Weil developed the 4-7-8 breathing technique to help ease anxiety and help with 
            stress-related health <br> issues. Perform this exercise while seated in a comfortable position.</p>
    </div>

    <div class="m-5 px-5">
        <div class="rounded-5 " style="background-color: #F5F7F8">
            <div class="row p-3 justify-content-center align-items-center">
                <div class="col-8 ">
                    <p>Touch the tip of your tongue to the roof of your mouth, just behind your upper teeth. Keep your tongue in this position throughout the exercise.</p>
                </div>
                <div class="col-1">

                </div>
                <div class="col">
                    <img src="{{ asset('/image/boc/boc1.png') }}" alt="" class="img-fluid h-75">
                </div>
            </div>
        </div>
        <div class="rounded-5 mt-5" style="background-color: #F5F7F8">
            <div class="row p-3 justify-content-center align-items-center">
                <div class="col">
                    <img src="{{ asset('/image/boc/boc2.png') }}" alt="" class="img-fluid h-75">
                </div>
                <div class="col-1">

                </div>
                <div class="col-8 pe-3">
                    <p>Breathe out through your mouth, emptying all the air from your lungs. Make a "whoosh" sound as you exhale.</p>
                </div>
            </div>
        </div>

        <div class="rounded-5 mt-5 " style="background-color: #F5F7F8">
            <div class="row p-3 justify-content-center align-items-center">
                <div class="col-8 ">
                    <p>Close your mouth and breathe in through your nose for a count of 4.</p>
                </div>
                <div class="col-1">

                </div>
                <div class="col">
                    <img src="{{ asset('/image/boc/boc3.png') }}" alt="" class="img-fluid h-75">
                </div>
            </div>
        </div>

        <div class="rounded-5 mt-5" style="background-color: #F5F7F8">
            <div class="row p-3 justify-content-center align-items-center">
                <div class="col">
                    <img src="{{ asset('/image/boc/boc1.png') }}" alt="" class="img-fluid h-75">
                </div>
                <div class="col-1">

                </div>
                <div class="col-8 pe-3">
                    <p>Hold your breath and count to 7.</p>
                </div>
            </div>
        </div>

        <div class="rounded-5 mt-5 " style="background-color: #F5F7F8">
            <div class="row p-3 justify-content-center align-items-center">
                <div class="col-8 ">
                    <p>Breathe out through your mouth for a count of 8, making a "whoosh" sound as you exhale.</p>
                </div>
                <div class="col-1">

                </div>
                <div class="col">
                    <img src="{{ asset('/image/boc/boc2.png') }}" alt="" class="img-fluid h-75">
                </div>
            </div>
        </div>

        <div class="rounded-5 mt-5" style="background-color: #F5F7F8">
            <div class="row p-3 justify-content-center align-items-center">
                <div class="col">
                    <img src="{{ asset('/image/boc/boc4.png') }}" alt="" class="img-fluid h-75">
                </div>
                <div class="col-1">

                </div>
                <div class="col-8 pe-3">
                    <p>Repeat this cycle for three to four breaths. Over time, work your way up to eight breaths</p>
                </div>
            </div>
        </div>
    </div>
@endsection