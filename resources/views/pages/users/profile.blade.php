@extends('layout.master2')

@section('content')
    <div class="container-xl">
        <div class="container my-5">
            <div class="card shadow-sm p-4">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <h3 class="text-center text-success mb-2">Mon Profile</h3>
                <p class="text-center">Etat du compte : <span class="badge bg-danger">{{ $finds->statut }}</span></p>
                <!-- 👤 SECTION 1 : État Civil -->
                <div class="mb-4">
                    <h5 class="text-success border-bottom pb-2 mb-3">👤 État Civil</h5>
                    <div class="row">
                        <div class="col-md-4 text-center mb-4">
                            @if ($finds->photo)
                                <img src="{{ asset('storage') . '/' . $finds->photo }}"
                                    class="img-fluid rounded-circle shadow" width="150" alt="Photo de profil"><br>
                                <a href="#"data-bs-toggle="modal" data-bs-target="#photoBackdrop">Changer ma
                                    photo</a>
                            @else
                                <img src="{{ asset('assets/img/avatar.png') }}" class="img-fluid rounded-circle shadow"
                                    width="150" alt="Avatar"> <br>
                                <a href="#"data-bs-toggle="modal" data-bs-target="#photoBackdrop">Charger une
                                    photo</a>
                            @endif
                            <h5 class="mt-3">{{ $finds->prenom }} {{ $finds->nom }}</h5>
                            @if ($finds->statut == 'Actif')
                                <span class="badge bg-success">{{ $finds->Role->libelle }}</span>
                            @endif
                            <h5 class="mt-3">Code : {{ $finds->code }}</h5>
                        </div>
                        <div class="col-md-8">
                            <div class="row mb-2">
                                <div class="col-md-6"><strong>Nom de jeune fille :</strong>
                                    {{ $finds->nom_jeune_fille }}
                                </div>
                                <div class="col-md-6"><strong>Situation matrimoniale :</strong>
                                    {{ $finds->situation_matrimoniale }}</div>
                                <div class="col-md-6"><strong>Date de naissance :</strong>
                                    {{ $finds->date_naiss }}</div>
                                <div class="col-md-6"><strong>Lieu de naissance :</strong> {{ $finds->lieu_naiss }}
                                </div>
                                <div class="col-md-6"><strong>Nationalité :</strong> {{ $finds->nationalite }}</div>
                                <div class="col-md-6"><strong>Section :</strong> {{ $finds->Section->libelle }}</div>
                            </div>
                            <hr>
                            <h5 class="text-success border-bottom pb-2 mb-3 mt-5">📞 Coordonnées géographique</h5>
                            <div class="row mb-2">
                                <div class="col-md-6"><strong>Région ordinale :</strong>
                                    {{ $finds->RegionOrdinal->libelle ?? 'Non spécifié' }}
                                </div>
                                <div class="col-md-6"><strong>Régions :</strong>
                                    {{ $finds->Region->libelle ?? 'Non spécifié' }}
                                </div>
                                <div class="col-md-6"><strong>Privince :</strong>
                                    {{ $finds->Province->libelle ?? 'Non spécifié' }}
                                </div>
                                <div class="col-md-6"><strong>Commune/Ville :</strong>
                                    {{ $finds->Commune->libelle ?? 'Non spécifié' }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 📞 SECTION 2 : Coordonnées -->
                <div class="mb-4">
                    <h5 class="text-success border-bottom pb-2 mb-3">📞 Coordonnées</h5>
                    <div class="row mb-2">
                        <div class="col-md-6"><strong>Email :</strong> {{ $finds->email }}</div>
                        <div class="col-md-6"><strong>Téléphone :</strong> {{ $finds->telephone }}</div>
                        <div class="col-md-6"><strong>Adresse permanente :</strong> {{ $finds->adresse }}</div>
                        <div class="col-md-6"><strong>Domicile :</strong> {{ $finds->domicile }}</div>
                        <div class="col-md-6"><strong>N° Matricule :</strong> {{ $finds->matricule }}</div>
                        <div class="col-md-6"><strong>Lieu d'exercice :</strong> {{ $finds->lieu_exercice }}</div>
                    </div>
                </div>

                <!-- 🎓 SECTION 3 : Diplômes -->
                <div class="mb-4">
                    <h5 class="text-success border-bottom pb-2 mb-3">🎓 Diplômes</h5>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <a href="{{ asset('storage') . '/' . $finds->diplome }}" target="_blank"
                                class="btn btn-outline-success">
                                <img src="{{ asset('assets/img/téléchargement.png') }}" style="width: 10%" alt="file">
                            </a>
                            <p class="text-danger">Diplome du doctotat</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <a href="{{ asset('storage') . '/' . $finds->file }}" target="_blank"
                                class="btn btn-outline-success">
                                <img src="{{ asset('assets/img/téléchargement.png') }}" style="width: 10%" alt="file">
                            </a>
                            <p class="text-danger">Fichiers joints</p>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-6"><strong>Date d'obtention :</strong>
                            {{ $finds->date_diplome }}
                        </div>
                        <div class="col-md-6"><strong>Institution :</strong> {{ $finds->inst_delivre }}</div>
                        <div class="col-md-6"><strong>Lieu de délivrance :</strong> {{ $finds->lieu_delivrance }}
                        </div>
                    </div>
                </div>

                <!-- 🎓 SECTION 3 : Autre Diplômes et fonction -->
                <div class="mb-4">
                    <h5 class="text-success border-bottom pb-2 mb-3">🎓 Autres diplome et Fonction</h5>
                    <div class="row mb-2">
                        <div class="col-md-6">
                            <h4 class="text-center">Autres diplomes <span><a class="badge bg-success"
                                        style="font-size: 10px;" href="#" data-bs-toggle="modal"
                                        data-bs-target="#addDipBackdrop">Ajouter un diplome</a></span></h4>
                            <table class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Nature diplôme</th>
                                        <th>Date d'obtention</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($autres_diplomes as $item)
                                        <tr>
                                            <td>{{ $item->nature }}</td>
                                            <td>{{ $item->date_diplome }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="2" class="text-center text-danger"><em>Aucun autre diplôme
                                                    enregistré</em></td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <h4 class="text-center">Fonctions <span><a class="badge bg-success" style="font-size: 10px;"
                                        href="#" data-bs-toggle="modal" data-bs-target="#addFoctBackdrop">Ajouter une
                                        fonction</a></span></h4>
                            <table class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Libelle fonction</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($fonctions as $item)
                                        <tr>
                                            <td>{{ $item->libelle }}</td>
                                            <td>{{ $item->date }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="2" class="text-center text-danger"><em>Aucun fonction
                                                    enregistré</em></td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-start gap-2 mt-4">
                    <button class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#editBackdrop">Modifier
                        mon compte</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal profile -->
    @include('pages.users.modal')
@endsection

@section('scripts')
    <style>
        .step {
            display: none;
        }

        .step.active {
            display: block;
        }

        .step-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            min-width: 80px;
            /* pour un bon espacement */
        }

        .step-circle {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: #dee2e6;
            color: #6c757d;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .step-label {
            color: #6c757d;
            font-size: 0.875rem;
            line-height: 1.2;
            white-space: nowrap;
        }

        .step-item.active .step-circle {
            background-color: #198754;
            color: white;
        }

        .step-item.active .step-label {
            color: #198754;
        }
    </style>

    <script>
        function updateStepNav(step) {
            for (let i = 1; i <= 5; i++) {
                const el = document.getElementById('step-nav-' + i);
                if (el) {
                    el.classList.toggle('active', i === step);
                }
            }
        }

        function updateProgressBar(step) {
            const bar = document.getElementById('progress-bar');
            const labels = ['Étape 1 / 5', 'Étape 2 / 5', 'Étape 3 / 5', 'Étape 4 / 5', 'Étape 5 / 5'];
            const widths = ['25%', '25%', '50%', '100%'];
            bar.style.width = widths[step - 1];
            bar.innerText = labels[step - 1];
        }

        function showStep(step) {
            document.querySelectorAll('.step').forEach(el => el.classList.remove('active'));
            const stepDiv = document.getElementById('step-' + step);
            if (stepDiv) stepDiv.classList.add('active');
            updateStepNav(step);
            updateProgressBar(step);
        }

        function nextStep(step) {
            const prevStep = step - 1;
            const inputs = document.querySelectorAll(`#step-${prevStep} input[required]`);
            let valid = true;
            inputs.forEach(input => {
                if (!input.value.trim()) {
                    input.classList.add('is-invalid');
                    valid = false;
                } else {
                    input.classList.remove('is-invalid');
                }
            });
            if (!valid) return;

            if (step === 5) {
                document.getElementById('recap-nom').innerText = document.querySelector('[name="nom"]').value;
                document.getElementById('recap-prenom').innerText = document.querySelector('[name="prenom"]').value;
                document.getElementById('recap-telephone').innerText = document.querySelector('[name="telephone"]').value;
                document.getElementById('recap-date_naiss').innerText = document.querySelector('[name="date_naiss"]').value;
                document.getElementById('recap-lieu_naiss').innerText = document.querySelector('[name="lieu_naiss"]').value;
                document.getElementById('recap-nationalite').innerText = document.querySelector('[name="nationalite"]')
                    .value;
            }
            showStep(step);
        }

        function prevStep(step) {
            showStep(step);
        }
        document.addEventListener('DOMContentLoaded', () => showStep(1));
    </script>
@endsection
