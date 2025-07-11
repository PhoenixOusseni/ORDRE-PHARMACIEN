@extends('layout.master')

@section('content')
    <style>
        .radio-group {
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .radio-option {
            position: relative;
            padding-left: 30px;
            cursor: pointer;
            font-size: 16px;
            user-select: none;
        }

        .radio-option input {
            position: absolute;
            opacity: 0;
            cursor: pointer;
        }

        .radio-option .checkmark {
            position: absolute;
            top: 2px;
            left: 0;
            height: 20px;
            width: 20px;
            background-color: #e9ecef;
            border-radius: 50%;
            border: 2px solid #99CC00;
            transition: all 0.3s ease;
        }

        .radio-option input:checked~.checkmark {
            background-color: #99CC00;
        }

        .radio-option .checkmark::after {
            content: "";
            position: absolute;
            display: none;
        }

        .radio-option input:checked~.checkmark::after {
            display: block;
        }

        .radio-option .checkmark::after {
            top: 5px;
            left: 5px;
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: white;
        }
    </style>
    <div class="container my-5">
        <div class="card shadow-sm border border-success p-4">

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <h2 class="mb-4 text-center text-success">Créer un compte</h2>

            <!-- Étapes visuelles -->
            <div class="steps mb-4 d-flex justify-content-between">
                <div class="step-item flex-fill" id="step-nav-1">
                    <div class="step-circle">1</div>
                    <small class="step-label">Etat Civil</small>
                </div>
                <div class="step-item flex-fill" id="step-nav-2">
                    <div class="step-circle">2</div>
                    <small class="step-label">Adresse</small>
                </div>
                <div class="step-item flex-fill" id="step-nav-3">
                    <div class="step-circle">3</div>
                    <small class="step-label">Diplôme</small>
                </div>
                <div class="step-item flex-fill" id="step-nav-4">
                    <div class="step-circle">4</div>
                    <small class="step-label">Régional</small>
                </div>
                <div class="step-item flex-fill" id="step-nav-5">
                    <div class="step-circle">5</div>
                    <small class="step-label">Résumé</small>
                </div>
            </div>

            <!-- Barre de progression -->
            <div class="mb-4">
                <div class="progress" style="height: 20px;">
                    <div id="progress-bar" class="progress-bar bg-success" role="progressbar" style="width: 25%;"
                        aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                        Étape 1 / 5
                    </div>
                </div>
            </div>

            <!-- Formulaire -->
            <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                @csrf
                <!-- Étape 1 -->
                <div id="step-1" class="step active">
                    <input type="text" class="form-control" name="role_id" value="1" hidden>
                    <input type="text" class="form-control" name="statut" value="En cours" hidden>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label>Nom</label>
                            <input type="text" name="nom" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label>Prénom(s)</label>
                            <input type="text" name="prenom" class="form-control" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label>Nom de jeune fille</label>
                            <input type="text" name="nom_jeune_fille" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label>Date de naissance</label>
                            <input type="date" name="date_naiss" class="form-control" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label>Lieu de naissance</label>
                            <input type="text" name="lieu_naiss" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label>Nationalité</label>
                            <input type="text" name="nationalite" class="form-control" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label>Situation Matrimoniale</label><br>
                        <div class="radio-group">
                            <label class="radio-option">
                                Marié
                                <input type="radio" name="situation_matrimoniale" value="Marié">
                                <span class="checkmark"></span>
                            </label>

                            <label class="radio-option">
                                Veuf(ve)
                                <input type="radio" name="situation_matrimoniale" value="Veuf(ve)">
                                <span class="checkmark"></span>
                            </label>

                            <label class="radio-option">
                                Célibataire
                                <input type="radio" name="situation_matrimoniale" value="Célibataire">
                                <span class="checkmark"></span>
                            </label>

                            <label class="radio-option">
                                Divorcé(e)
                                <input type="radio" name="situation_matrimoniale" value="Divorcé(e)">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                    <div class="text-end">
                        <button type="button" class="btn btn-success" onclick="nextStep(2)">Suivant</button>
                    </div>
                </div>

                <!-- Étape 2 -->
                <div id="step-2" class="step">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label>Adresse Permanente</label>
                            <input type="text" name="adresse" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label>Domicile</label>
                            <input type="text" name="domicile" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label>Télephone</label>
                            <input type="text" name="telephone" class="form-control" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label>N° Matricule</label>
                            <input type="text" name="matricule" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label>Lieu d'exercice</label>
                            <input type="text" name="lieu_exercice" class="form-control" required>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between">
                        <button type="button" class="btn btn-secondary" onclick="prevStep(1)">Précédent</button>
                        <button type="button" class="btn btn-success" onclick="nextStep(3)">Suivant</button>
                    </div>
                </div>

                <!-- Étape 3 -->
                <div id="step-3" class="step">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label>Diplome</label>
                            <input type="file" name="diplome" class="form-control" accept=".pdf" required>
                        </div>
                        <div class="col-md-6">
                            <label>Date d'obtention</label>
                            <input type="date" name="date_diplome" class="form-control" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label>Institution ayant délivré</label>
                            <input type="text" name="inst_delivre" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label>Lieu de délivrance</label>
                            <input type="text" name="lieu_delivrance" class="form-control" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label>Section</label>
                            <select name="section_id" class="form-control">
                                @foreach (App\Models\Section::all() as $item)
                                    <option value="{{ $item->id }}">{{ $item->libelle }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label>Pièces jointes</label>
                            <input type="file" name="file" class="form-control" accept=".pdf">
                            <p>
                                <span>1. Un extrait d'acte de naissance</span>
                                <br>
                                <span>2. un extrait d'un casier judiciaire datant de moins de trois mois</span>
                                <br>
                                <span>3. Une copie légalisée du diplôme de pharmacien ou l'attestation de diplôme de docteur
                                    en pharmacie</span>
                                <br>
                                <span>4. Un certificat de nationalité</span>
                                <br>
                                <span>5.Un certificat d'aptitude médical</span>
                            </p>
                            <p class="text-danger text-italic">
                                <strong>Note :</strong> Les pièces jointes doivent être au format PDF et ne pas dépasser 2
                                Mo.
                            </p>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between">
                        <button type="button" class="btn btn-secondary" onclick="prevStep(2)">Précédent</button>
                        <button type="button" class="btn btn-success" onclick="nextStep(4)">Suivant</button>
                    </div>
                </div>

                <!-- Étape 3 -->
                <div id="step-4" class="step">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label>Région ordinale</label>
                            <select name="region_ordinal_id" class="form-control">
                                @foreach (App\Models\RegionOrdinal::all() as $item)
                                    <option value="{{ $item->id }}">{{ $item->libelle }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label>Région</label>
                            <select name="region_id" class="form-control">
                                @foreach (App\Models\Region::all() as $item)
                                    <option value="{{ $item->id }}">{{ $item->libelle }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label>Province</label>
                            <select name="province_id" class="form-control">
                                @foreach (App\Models\Province::all() as $item)
                                    <option value="{{ $item->id }}">{{ $item->libelle }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label>Commune</label>
                            <select name="commune_id" class="form-control">
                                @foreach (App\Models\Commune::all() as $item)
                                    <option value="{{ $item->id }}">{{ $item->libelle }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between">
                        <button type="button" class="btn btn-secondary" onclick="prevStep(3)">Précédent</button>
                        <button type="button" class="btn btn-success" onclick="nextStep(5)">Suivant</button>
                    </div>
                </div>

                <!-- Étape 4 -->
                <div id="step-5" class="step">
                    <h5 class="mb-4 text-success">Récapitulatif</h5>
                    <ul class="list-group mb-4">
                        <li class="list-group-item"><strong>Nom :</strong> <span id="recap-nom"></span></li>
                        <li class="list-group-item"><strong>Email :</strong> <span id="recap-prenom"></span></li>
                        <li class="list-group-item"><strong>Téléphone :</strong> <span id="recap-telephone"></span></li>
                        <li class="list-group-item"><strong>Pays :</strong> <span id="recap-date_naiss"></span></li>
                        <li class="list-group-item"><strong>Société :</strong> <span id="recap-lieu_naiss"></span></li>
                        <li class="list-group-item"><strong>Rôle :</strong> <span id="recap-nationalite"></span></li>
                    </ul>
                    <div class="d-flex justify-content-between">
                        <button type="button" class="btn btn-secondary" onclick="prevStep(4)">Precedant</button>
                        <button type="submit" class="btn btn-success">Valider l'inscription</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
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
