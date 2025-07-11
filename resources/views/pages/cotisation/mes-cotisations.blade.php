@extends('layout.master2')

@section('content')
    <!-- Doctors Section -->
    <section id="doctors" class="doctors section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Mes cotisations</h2>
        </div><!-- End Section Title -->

        <div class="container">
            <div class="row gy-4">
                @forelse ($cotisations as $item)
                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="team-member d-flex align-items-start">
                            <div class="pic">
                                @if ($item->User->photo)
                                    <img src="{{ asset('storage/' . $item->User->photo) }}" class="img-fluid" alt="">
                                @else
                                    <img src="{{ asset('assets/img/avatar.png') }}" class="img-fluid" alt="">
                                @endif
                            </div>
                            <div class="member-info">
                                <h4>{{ number_format($item->montant, 0, ',', ' ') }} FCFA</h4>
                                <p>Période : <strong class="badge bg-danger">{{ $item->annee }}</strong></p>
                                <p>Mode paiement : <strong>{{ $item->mode }}</strong></p>
                                <p>Date paiement : <strong>{{ $item->date }}</strong></p>
                            </div>
                        </div>
                    </div><!-- End Team Member -->
                @empty
                <p class="text-danger">Vous n'avez pas encore de cotisation !</p>
                @endforelse
            </div>
        </div>
    </section><!-- /Doctors Section -->
@endsection
