@extends('layout.master2')

@section('content')
    <!-- Hero Section -->
    <section id="hero" class="hero section light-background">
        <img src="{{ asset('assets/img/pharmacien.png') }}" alt="" data-aos="fade-in">
        <div class="container position-relative">
            <div class="welcome position-relative" data-aos="fade-down" data-aos-delay="100">
                <h2 class="text-center text-danger">Error 404</h2>
                <p class="text-bg-secondary text-center">Veuillez patienter a ce que votre compte soit examiné et validé !</p>
            </div>
        </div>
    </section><!-- /Hero Section -->
@endsection
