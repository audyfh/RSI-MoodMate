@extends('layouts.app')

@section('content')

<div class="m-3">
    <div class="row ms-2">
        <div class="col-sm-6">
            <h1>List of <span class="highlight">Psychologists</span></h1>
        </div>
        <div class="col">

        </div>
        <div class="col-sm-2 mt-3 me-6">
            <button type="submit" class="btn btn-primary  rounded-pill" style="padding: 1px 10px; background-color: #A594F9; color:black" >Open Chat</button>
        </div>
        <div class="mt-3">
            <div class="row">
                @foreach ($psikologs as $psikolog)
                <div class="col-md-3 mb-4">
                    <div class="card" style="border: none">
                        <img  src="{{ asset('image/psikolog/' . $psikolog->foto) }}" alt="">
                        <div class="card-img-overlay d-flex flex-column justify-content-end">
                            <div class="row">
                                <div class="col">
                                    <h2 class="card-title " style="color: white">{{ $psikolog->nama }}</h2>
                                </div>
                                <div class="col mt-1">
                                    <button type="submit" class="btn btn-primary rounded-pill w-75" style="padding: 1px 15px; background-color: #A594F9; color:black" >Chat</button>
                                </div>
                            </div>
                            <p class="card-text" style="color: white"> {{ $psikolog->tempat_kerja }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection