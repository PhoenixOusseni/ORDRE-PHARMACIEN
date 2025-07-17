@extends('layout.master')

@section('content')
    <!-- Hero Section -->
    <section id="hero" class="hero section light-background">
        <img src="assets/img/bd-gestionmenbre.jpg" alt="caroussel" data-aos="fade-in">
        <div class="container position-relative">
            <div class="welcome position-relative" data-aos="fade-down" data-aos-delay="100">
                <h2 class="text-center text-light">ORDRE NATIONAL DES PHARMACIENS DU BURKINA FASO (ONPBF)</h2>
                <p class="text-bg-secondary text-center">Plateforme de gestion des procédure administratives et des membres</p>
            </div>
            <div class="d-flex justify-content-between mt-5">
                <button type="button" class="btn btn-success p-3"
                    onclick="window.location.href='{{ route('inscription') }}'" style="width: 46%">S'inscrire à
                    l'ordre</button>
                <button type="button" class="btn btn-success p-3"
                    onclick="window.location.href='{{ route('authentification') }}'" style="width: 46%">Déjà membre
                    ?</button>
            </div>
        </div>
    </section><!-- /Hero Section -->

    <!-- About Section -->
    <section id="member" class="member section">
        <div class="container">
            <div class="row gy-4 gx-5">
                <div class="col-lg-6 position-relative align-self-start" data-aos="fade-up" data-aos-delay="200">
                    <img src="assets/img/about.jpg" class="img-fluid" alt="">
                </div>

                <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="100">
                    <h3>Comment devenir membre ?</h3>
                    <p>
                        Une demande manuscrite  adressée  à monsieur le Président du conseil régional
                        de l'Ordre de la région dans laquelle il se propose d'exercer.
                    </p>
                    <p>
                        <strong>1.</strong> Un extrait d'acte de naissance <br>
                        <strong>2.</strong> un extrait d'un casier judiciaire datant de moins de trois mois <br>
                        <strong>3.</strong> Une copie légalisée du diplôme de pharmacien ou l'attestation de diplôme de
                        docteur en pharmacie <br>
                        <strong>4.</strong> Un certificat de nationalité <br>
                        <strong>5.</strong> Un certificat d'aptitude médical
                    <p class="text-danger font-italic mt-3">
                        <em><strong class="text-danger">NB: </strong> Pour les pharmaciens de nationalités étrangères, il
                            faudra ajouter l'attestation de radiation et la lettre d'introduction de l'Ordre d'origine </em>
                    </p>
                </div>
            </div>
        </div>
    </section><!-- /About Section -->
@endsection
