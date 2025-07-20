@extends('layout.master2')

@section('content')
    <style>
        .hero {
            position: relative;
            background-image: url('assets/img/bd-gestionmenbre.jpg');
            background-size: cover;
            background-position: center;
            height: 100vh;
            color: white;
        }

        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.5);
            /* Filtres : 0.3 à 0.6 souvent bien */
            z-index: 1;
        }

        .content {
            position: relative;
            z-index: 2;
            /* text-align: center; */
            padding: 2rem;
        }
    </style>

    <div class="hero">
        <div class="overlay"></div>
        <div class="content">
            <div class="welcome position-relative" data-aos="fade-down" data-aos-delay="100">
                <h2 class="text-center text-danger">Error 404</h2>
                <p class="text-center">Veuillez patienter a ce que votre compte soit examiné et validé !</p>
            </div>
        </div>
    </div>
@endsection
