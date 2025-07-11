@extends('layout.master2')

@section('content')
    <!-- Hero Section -->
    <section id="hero" class="hero section light-background">
        <img src="{{ asset('assets/img/pharmacien.png') }}" alt="" data-aos="fade-in">
        <div class="container position-relative">
            <div class="welcome position-relative" data-aos="fade-down" data-aos-delay="100">
                <h2 class="text-danger text-center">ERROR 404</h2>
                <p class="text-bg-secondary text-center">Votre compte est en cours de validation, Veuillez patienter le temps de l'examination de votre dossier</p>
            </div>
        </div>
    </section><!-- /Hero Section -->
@endsection
