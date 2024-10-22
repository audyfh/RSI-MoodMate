<!-- resources/views/landing.blade.php -->
@extends('layouts.app')

@section('content')
    <!-- Hero -->
    <div class="masthead" style="background-image: url('{{ asset('resource/gambar_home.svg')}}')">
        <div class="d-flex color-overlay ">

            <div class="col-md-6 d-flex flex-column justify-content-center align-items-center">
                <h2>Transform <span class="highlight">Stress</span> into</h2>
                <h2><span class="highlight">Strength</span> with MoodMate</h2>
                <a href="#about" class="btn btn-outline-secondary rounded-pill custom-btn">Get Started</a>
            </div>
           
            <div class="col-md-6 d-flex flex-column justify-content-center align-items-center">
                <h1><span class="highlight">Mood</span>Mate</h1>
                <img src="{{ asset('resource/logo.svg') }}" alt="MoodMate Logo" style="height:200px">
            </div>
        </div>
       
    </div>
    <!-- Hero -->

    <div class="container-fluid px-5">
            <!-- About MoodMate -->
        <section id="about" class="mt-5">
            <div class="row">
                <div class="col-md me-5">
                    <h1>About <span class="highlight">Mood</span>Mate</h1>
                    <p class="text-justify">MoodMate is a comprehensive solution designed to support mental health and help individuals cope with everyday emotional stress. Created to provide comfort, 
                    motivation, and practical tools, this app assists users in building positive habits to maintain their mental well-being. With an accessible and user-friendly approach, 
                    MoodMate offers a holistic experience in mental health care, helping to prevent undesirable outcomes.
                    </p>
                </div>
                <div class="col-md">
                    <img src="{{ asset('resource/about_moodmate.svg') }}" alt="about" class="img-fluid h-75 w-100">
                </div>
            </div>
           
            
        </section>

        <!-- Our Services -->
        <section id="services" class="">
            <div class="d-flex justify-content-center">
                <h1>Our <span class="highlight">Services</span></h1>
            </div>
            <div class="row">
                <div class="col-md">
                    <img src="{{ asset('resource/service1.svg') }}" alt="" class="img-fluid">
                    <h4 class="text-center" style="font-weight: bold;">Breath of Calm</h4>
                    <p class="text-center">A guided breathing tool to help users reduce stress and achieve relaxation through effective techniques.</p>
                </div>
                <div class="col-md">
                    <img src="{{ asset('resource/service2.svg') }}" alt="" class="img-fluid">
                    <h4 class="text-center" style="font-weight: bold;">Mind Chat</h4>
                    <p class="text-center">Consult with licensed psychologists and share your emotional records for personalized guidance and support.</p>
                </div>
                <div class="col-md">
                    <img src="{{ asset('resource/service3.svg') }}" alt="" class="img-fluid">
                    <h4 class="text-center" style="font-weight: bold;">Happy Quest</h4>
                    <p class="text-center">Boost your day with meaningful tasks and missions that inspire positivity and give you new reasons to embrace life.</p>
                </div>
            </div>
        </section>

        <!-- FAQ Section -->
        <section id="faq" class="my-2">
            <h1>FAQ</h1>
            <p>Everything you need to know about the product</p>
            <div class="container pt-1 pb-5">
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item mt-3 rounded-3">
                      <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button rounded-3" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                         <strong>
                            What is MoodMate?
                         </strong>
                        </button>
                      </h2>
                      <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                          <p>
                            MoodMate is a mental health app designed to help users manage stress, build positive habits, and improve emotional well-being. With features like MindChat, Happy Quest, and Breath of Calm, MoodMate provides comprehensive support for everyday mental health.
                          </p>
                        </div>
                      </div>
                    </div>
                    <div class="accordion-item mt-3 rounded-3">
                      <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button rounded-3 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                          <strong>How does the MindChat feature work?</strong>
                        </button>
                      </h2>
                      <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                          <p>
                            MindChat allows you to communicate directly with psychologists through the app. You can ask questions, receive advice, and discuss emotional issues privately with a professional.
                          </p>
                        </div>
                      </div>
                    </div>
                    <div class="accordion-item mt-3 rounded-3">
                      <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button rounded-3 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                          <strong>
                            What is Happy Quest and how does it work?
                          </strong>
                        </button>
                      </h2>
                      <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                          <p>
                            Happy Quest provides tasks and missions designed to boost positive habits and motivation. Each mission is crafted to help you find happiness and reasons to move forward, featuring enjoyable and beneficial activities.
                          </p>
                        </div>
                      </div>
                    </div>
                    <div class="accordion-item mt-3 rounded-3">
                        <h2 class="accordion-header" id="headingFour">
                          <button class="accordion-button rounded-3 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                            <strong>
                                How does Breath of Calm help me?
                            </strong>
                          </button>
                        </h2>
                        <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                          <div class="accordion-body">
                           <p>
                            Breath of Calm offers effective breathing techniques to help you manage stress and achieve relaxation. This feature provides easy-to-follow breathing exercises to calm both your mind and body.
                           </p>
                          </div>
                        </div>
                      </div>
                      <div class="accordion-item mt-3 rounded-3">
                        <h2 class="accordion-header" id="headingFive">
                          <button class="accordion-button rounded-3 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                            <strong>
                                Is MoodMate free to use?
                            </strong>
                          </button>
                        </h2>
                        <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                          <div class="accordion-body">
                            <p>
                                MoodMate offers a basic version that can be downloaded and used for free. However, some premium features may require a subscription or in-app purchases for full access.
                            </p>
                          </div>
                        </div>
                      </div>
                      <div class="accordion-item mt-3 rounded-3">
                        <h2 class="accordion-header" id="headingSix">
                          <button class="accordion-button rounded-3 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                            <strong>
                                Is my personal data safe on MoodMate?
                            </strong>
                          </button>
                        </h2>
                        <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#accordionExample">
                          <div class="accordion-body">
                            <p>
                                MoodMate uses high-level encryption and security protocols to protect user data, including personal information and feature usage history on the platform.
                            </p>
                        </div>
                      </div>
                  </div>
            </div>
        </section>
    </div>

    
@endsection
